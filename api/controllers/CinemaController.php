<?php
	class CinemaController extends BaseController {

		protected $answer = [];

		private $cinemaModel;


		public function __construct() {
			$this->cinemaModel = new Cinema();
		}

		public function main($id, $date)
        {
            $method = $_SERVER['REQUEST_METHOD'];
            switch ($method) {
                case 'GET':
                    $this->get($id, $date);
                    break;
                default:
                    $this->showNotAllowed();
            }
            return;
        }

		private function get($id, $date) {
            if($id > 0){
                $this->answer = $this->cinemaModel->getCinemaById($id, $date);
                if(!empty($this->answer)){
                    $this->sendAnswer();
                }else{
                    $this->showNotFound();
                }

            }else{
                $this->answer = $this->cinemaModel->getCinemas();
                $this->sendAnswer();
                return;
            }
		}

	}