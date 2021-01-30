<?php

    function  view($template, $data=[]){
        extract($data);
        if(file_exists($template)){
            include_once($template);
        }
    }