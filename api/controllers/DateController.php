<?php

class DateController extends BaseController
{

    protected $answer = [];

    private $dateModel;

    public function __construct()
    {
        $this->dateModel = new Date();
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

    private function get($id)
    {
            $this->answer = $this->dateModel->getDates();
            $this->sendAnswer();

    }

}
