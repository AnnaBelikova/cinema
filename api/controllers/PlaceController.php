<?php

class PlaceController extends BaseController
{

    protected $answer = [];

    private $placeModel;

    public function __construct()
    {
        $this->placeModel = new Place();
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
            $this->answer = $this->placeModel->getPlacesbySeance($id);
            if (!empty($this->answer)) {
                $this->sendAnswer();
            } else {
                $this->showNotFound();
            }

        } else {
            $this->answer = $this->placeModel->getPlaces();
            $this->sendAnswer();
        }
    }

}
