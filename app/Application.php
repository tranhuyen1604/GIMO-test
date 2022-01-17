<?php

namespace App;

use App\Controllers;
use App\Controllers\MovieController;
use App\Controllers\SongController;
use App\Models\Movies;
use App\Route\Router;

class Application
{
    public function __construct()
    {
    }

    public function run()
    {
        //songs
        $songs = new SongController();
        if (strstr($_SERVER['REQUEST_URI'],'/songs') && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $songs->index();
        } else if (strstr($_SERVER['REQUEST_URI'],'/songs') && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $songs->create($_POST);
        } else if (strstr($_SERVER['REQUEST_URI'],'/songs/update/') && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $songs->update($_POST);
        } else if (strstr($_SERVER['REQUEST_URI'],'/songs/') && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $songs->delete((int) basename($_SERVER['REQUEST_URI']));
        }

        //movies
        $movies = new MovieController();
        if (strstr($_SERVER['REQUEST_URI'],'/movies') && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $movies->index();
        } else if (strstr($_SERVER['REQUEST_URI'],'/movies') && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $movies->create($_POST);
        } else if (strstr($_SERVER['REQUEST_URI'],'/movies/update/') && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $movies->update($_POST);
        } else if (strstr($_SERVER['REQUEST_URI'],'/movies/') && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $movies->delete((int) basename($_SERVER['REQUEST_URI']));
        }
    }
}