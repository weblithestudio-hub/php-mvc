<?php

class HomeController {

    public function index(){

         $data = [
             'title' => 'Fooldal',
            'message' => 'Udvozollek a Fooldalon',
         ];

         render('home/index', $data, 'layouts/hero_layout');
    }

    public function about(){

        $data = [
            'title' => 'Rolunk',
            'message' => 'Udvozollek a Rolunk szekcioban',
        ];

        render('home/about', $data);
    }

}