<?php

	abstract class BaseController {

		protected $answer = []; 

		abstract function main($id, $date);

		protected function sendAnswer() {
			header('HTTP/1.1 200 OK');
			header('Content-type: application/json');
			echo (json_encode($this->answer));
		}

		protected function showNotFound() {
			header('HTTP/1.1 404 Not Found');
		}

		protected function showNotAllowed() {
			header('HTTP/1.1 405 Method not allowed');
		}

		protected function showBadRequest() {
			header('HTTP/1.1 400 Bad request');
		}

	}