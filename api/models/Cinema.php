<?php

	class Cinema {

		private $db;

		public function __construct() {
			$this->db = DB::getConnection();
		}

		public function getCinemas() {
			$query = "SELECT *
					  FROM `cinema`;
			";
			$result = mysqli_query($this->db, $query);
            $cinemas = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $cinemas;
		}

        public function getCinemaById($id, $date){
            $query = "SELECT cinema.ID, cinema.name, cinema.address, hall.name AS `hall_name`,  DATE(seance.datetime) AS `date`,
                        TIME (seance.datetime) AS `time`,
                        seance.price AS `price`, movies.name AS `movie_name`, movies.desc AS `movie_desc`, movies.census AS `census`, seance.ID AS `seance_id`
					  FROM `cinema`
					  LEFT JOIN `hall` ON hall.`ID_cinema` = cinema.`ID`
					  LEFT JOIN `seance` ON seance.`ID_hall` = hall.`ID`
					  LEFT JOIN `movies` ON movies.`ID` = seance.`ID_movie`
					  WHERE cinema.ID = '$id' AND DATE(seance.datetime) = '$date'
					  ORDER BY DATE(seance.datetime) ASC, TIME(seance.datetime) ASC;
			";
            $result = mysqli_query($this->db, $query);
            $cinema = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $cinema;
        }

    }