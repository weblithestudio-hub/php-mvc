<?php

class HomeController {

    public function index(){
        
        echo base_url();

        //$data = [
        //    'title' => 'Fooldal',
        //    'message' => 'Udvozollek a Fooldalon',
        //];

        //render('home/index', $data, 'layouts/hero_layout');
    }

    public function about(){
        
        echo base_url();

        //$data = [
        //    'title' => 'Rolunk',
        //    'message' => 'Udvozollek a Rolunk szekcioban',
        //];

        //render('home/about', $data);
    }

}