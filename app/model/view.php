<?php 
namespace model;

use koneksi;

class view {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

}

?>