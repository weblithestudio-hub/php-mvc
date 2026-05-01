<?php

class HomeController {

    public function index(){
        
        $data = [
            'title' => 'Fooldal',
            'message' => 'Udvozollek a Fooldalon',
        ];

        render('home/index', $data);
    }


}