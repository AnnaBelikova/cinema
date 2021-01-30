<?php

	$routes = array(

		'CinemaController' => array(
			'cinemas/*([0-9]*)\/?([0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01]))?' => 'main',

		),

        'SeanceController' => array(
            '/seances/*([0-9]*)/([0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01]))' => 'main',

        ),

        'PlaceController' => array(
            '/places/*([0-9]*)' => 'main',
        ),

        'FilmController' => array(
            '/films/*([0-9]*)' => 'main',
        ),

        'DateController' => array(
            '/dates/*([0-9]*)' => 'main',
        ),


	);

?>