<?php

class Date {

    private $db;

    public function __construct() {
        $this->db = DB::getConnection();
    }

    public function getDates() {
        $query = "SELECT DATE(seance.datetime) AS `date`
					  FROM `seance`
					  GROUP BY DATE(seance.datetime)
					  ;
			";
        $result = mysqli_query($this->db, $query);
        $seances = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $seances;
    }


}

