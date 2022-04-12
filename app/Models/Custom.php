<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class Custom extends Model
{
    protected $db;
    protected $returnType       = EntitiesFleetType::class;

    public function __construct()
    {
        parent::__construct();
        $this->db = Database::connect();
        // $this->db = db_connect();
    }

    public function trans()
    {
        $this->db->transBegin(); // untuk memulai transaksi.
        $this->db->transRollback(); // untuk membatalkan semua transaksi setelah perintah transBegin().
        $this->db->transCommit(); // untuk menyimpan semua transaksi setelah metode transBegin()
        $this->db->transStatus(); // untuk mengcheck status dari transaction mengembalikan dua nilai true atau false.Untuk kasus ini kita tidak menggunakan transStatus.

        // example manual
        $this->db->transBegin();
        $this->db->query('AN SQL QUERY...');
        $this->db->query('ANOTHER QUERY...');
        $this->db->query('AND YET ANOTHER QUERY...');
        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();

            return false;
        } else {
            $this->db->transCommit();

            return true;
        }

        // 
        $this->db->transStart();
        $this->db->query('AN SQL QUERY...');
        $this->db->query('ANOTHER QUERY...');
        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            // generate an error... or use the log_message() function to log your error
        }
    }

    public function search($startpoint, $endpoint, $date)
    {
        $builder = $this->db->table('trip as ta');
        $builder->select(
            "ta.`tripId`,
            ta.`route`,
            ta.`scheduleId`,
            tr.`name` AS tripRouteName, 
            tl1.`name` AS pickupTripLocation,
            tl2.`name` AS dropTripLocation,
            ta.`type`, 
            tp.`totalSeat`  , 
            pp.`price` AS price,
            pp.`childrenPrice`,
            pp.`specialPrice`,
            tr.`approximateTime`,
            tr.`stoppagePoints`,
            tr.`distance`,
            sc.`start`,
            sc.`end`,
            tras.`closedById`
            "
        );
        $builder->join("shedule as sc", "sc.scheduleId=ta.scheduleId", "left");
        $builder->join("tripRoute as tr", "tr.id = ta.route", "left");
        $builder->join("tripAssign as tras", "tras.trip = ta.tripId", "left");
        $builder->join("fleetType AS tp", "tp.id = ta.type", "left");
        $builder->join("tripLocation AS tl1", "tl1.id = tr.startPoint");
        $builder->join("tripLocation AS tl2", "tl2.id = tr.endPoint");
        $builder->join("priPrice AS pp", "pp.routeid = ta.route AND pp.vehicletypeid= ta.type");
        $builder->where("(FIND_IN_SET('$startpoint',tr.stoppagePoints)) AND (FIND_IN_SET('$endpoint',tr.stoppagePoints))");
        $builder->where("(!FIND_IN_SET(DAYOFWEEK('$date'),ta.`weekend`))");
        $builder->groupBy("ta.tripId");

        $query = $builder->get();
        $rests = $query->getResult();
        $result = [];
        foreach ($rests as $rest) {
            $available = $this->bookedSeats($rest->tripId, $date);
            if ($available) {
                $rest->used = $available->used;
                $rest->seatNumbers = trim($available->seatNumbers, ",");
            }
            $result[] = $rest;
        }
        return $result;
    }

    public function bookedSeats($tripIdNo, $getDate)
    {
        $builder = $this->db->table('tktBooking AS tb');
        return $builder->select("COALESCE(SUM(tb.totalSeat),0 ) AS used, TRIM(seatNumbers) as seatNumbers,tb.tripIdNo ")
            ->join('trip AS ta', "ta.tripId = tb.tripIdNo")
            ->where('tb.tripIdNo', $tripIdNo)
            ->like('tb.bookingDate', $getDate, 'after')
            ->groupStart()
            ->where("tb.tktRefundId IS NULL", null, false)
            ->orWhere("tb.tktRefundId", 0)
            ->orWhere("tb.tktRefundId", null)
            ->groupEnd()
            ->get()
            ->getRow();
    }
}
