<?php

namespace App\Models;

use CodeIgniter\Model;

class Custom extends Model
{
    protected $db;
    

    public function __construct()
    {
        $this->db = db_connect();
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
}
