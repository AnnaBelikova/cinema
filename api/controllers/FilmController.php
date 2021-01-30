<?php

class FilmController extends BaseController
{

    protected $answer = [];

    private $filmModel;

    public function __construct()
    {
        $this->filmModel = new Film();
    }

    public function main($id, $date)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET':
                $this->get($id);
                break;
            default:
                $this->showNotAllowed();
        }
        return;
    }

    private function get($id)
    {
        if ($id > 0) {
            $this->answer = $this->filmModel->getFilmById($id);
            if (!empty($this->answer)) {
                $this->sendAnswer();
            } else {
                $this->showNotFound();
            }

        } else {
            $this->answer = $this->filmModel->getFilms();
            $this->sendAnswer();
        }
    }

}

