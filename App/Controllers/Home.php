<?php

namespace App\Controllers;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        require '../App/Views/Home.php';
    }
}
