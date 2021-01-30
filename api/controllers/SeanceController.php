<?php

class SeanceController extends BaseController
{

    protected $answer = [];

    private $seanceModel;

    public function __construct()
    {
        $this->seanceModel = new Seance();
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

    private function get($id, $date)
    {
        if ($id > 0) {
            $this->answer = $this->seanceModel->getSeanceById($id, $date);
            if (!empty($this->answer)) {
                $this->sendAnswer();
            } else {
                $this->showNotFound();
            }

        } else {
            $this->answer = $this->seanceModel->getSeances($date);
            $this->sendAnswer();
        }
    }

}
