<?php

class Place {

    private $db;

    public function __construct() {
        $this->db = DB::getConnection();
    }

    public function getPlacesBySeance($id){
        $queryHall ="SELECT seance.ID_hall
					  FROM `seance`
                      WHERE seance.ID = '$id'
					  ;
			";
        $resultHall = mysqli_query($this->db, $queryHall);
        $hall = mysqli_fetch_assoc($resultHall);
        $hallId = $hall['ID_hall'];

        $query = "SELECT place.ID, place.row, place.number, status.name AS `status`
					  FROM `place`
					  LEFT JOIN `ticket` ON ticket.`row` = place.`row` AND ticket.`number` = place.`number`
					  LEFT JOIN `status` ON status.`ID` = ticket.`ID_status`
                      LEFT JOIN `seance` ON seance.`ID` = ticket.`ID_seance`
                      WHERE place.ID_hall = '$hallId'
                      GROUP BY place.ID
                      ORDER BY place.row ASC, place.number ASC
                      
					  ;
			";
        $result = mysqli_query($this->db, $query);
        $places = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $places;
    }

}

