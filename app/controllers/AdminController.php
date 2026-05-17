<?php

class AdminController {

    public function __construct()
    {
        //
    }

    public function dashboard(){

        $data = [
            'title' => 'Admin Dashboard',
            'message' => "Welcome to the Admin Dashboard",
        ];

        render('admin/dashboard', $data, 'layouts/admin_layout');
    }

}