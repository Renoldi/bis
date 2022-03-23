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

    public function search($startpoint,$endpoint,$date)
    {
        $builder = $this->db->table('trip as ta');
        $builder->select(
            "ta.`tripId` AS trip_id_no,
            ta.`route`,
            ta.`scheduleId`,
            tr.`name` AS trip_routeName, 
            tl1.`name` AS pickupTripLocation,
            tl2.`name` AS drop_tripLocation,
            ta.`type`, 
            tp.`totalSeat` AS fleetSeats, 
            pp.`price` AS price,
            pp.`childrenPrice`,
            pp.`specialPrice`,
            tr.`approximateTime` AS duration,
            tr.`stoppagePoints`,
            tr.`distance`,
            sc.`start`,
            sc.`end`,
            tras.`closedById`"
        );
        $builder->join("shedule as sc", "sc.scheduleId=ta.scheduleId", "left");
        $builder->join("trip_route as tr", "tr.id = ta.route", "left");
        $builder->join("trip_assign as tras", "tras.trip = ta.tripId", "left");
        $builder->join("fleet_type AS tp", "tp.id = ta.type", "left");
        $builder->join("trip_location AS tl1", "tl1.id = tr.startPoint");
        $builder->join("trip_location AS tl2", "tl1.id = tr.startPoint");
        $builder->join("pri_price AS pp", "pp.routeid = ta.route AND pp.vehicletypeid= ta.type");
        $builder->where("(FIND_IN_SET('$startpoint',tr.stoppagePoints)) AND (FIND_IN_SET('$endpoint',tr.stoppagePoints))");
        $builder->where("(!FIND_IN_SET(DAYOFWEEK('$date'),ta.`weekend`))");
        $builder->groupBy("ta.tripId");
        $query = $builder->get();
        $rest = $query->getResult();
        // $data = [$this->db->getLastQuery()->getQuery()];
        return $rest;
        // return $query->getResult();
    }

    
}
