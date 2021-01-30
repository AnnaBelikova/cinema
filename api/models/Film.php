<?php

class Film {

    private $db;

    public function __construct() {
        $this->db = DB::getConnection();
    }

    public function getFilms() {
        $query = "SELECT movies.ID, movies.name, movies.census, movies.desc, genre.name AS `genre_name`, 
                directed.first_name AS `first_name_directed`, directed.last_name AS `last_name_directed`, 
                group_concat(concat(actor.first_name,' ',actor.last_name) separator ',') AS `actors`
					  FROM `movies`
					  LEFT JOIN `genre` ON genre.`ID` = movies.`ID_genre`
					  LEFT JOIN `directed` ON directed.`ID` = movies.`ID_directed`
					  LEFT JOIN `actor_list` ON movies.`ID` = actor_list.`ID_movis`
					  LEFT JOIN `actor` ON actor_list.`ID_actor` = actor.`ID`
					GROUP BY movies.ID
					  ;
			";
        $result = mysqli_query($this->db, $query);
        $seances = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $seances;
    }

    public function getFilmById($id){
        $query = "SELECT movies.ID, movies.name, movies.census, movies.desc, genre.name AS `genre_name`, 
                directed.first_name AS `first_name_directed`, directed.last_name AS `last_name_directed`, 
                group_concat(concat(actor.first_name,' ',actor.last_name) separator ',') AS `actors`
					  FROM `movies`
					  LEFT JOIN `genre` ON genre.`ID` = movies.`ID_genre`
					  LEFT JOIN `directed` ON directed.`ID` = movies.`ID_directed`
					  LEFT JOIN `actor_list` ON movies.`ID` = actor_list.`ID_movis`
					  LEFT JOIN `actor` ON actor_list.`ID_actor` = actor.`ID`

					WHERE movies.ID = '$id'
					
					  ;
			";
        $result = mysqli_query($this->db, $query);
        $cinema = mysqli_fetch_assoc($result);
        return $cinema;
    }

}

