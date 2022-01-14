<?php

namespace App;

use App\Controllers;
use App\Controllers\SongController;

class Application
{
    public function run()
    {
        $song = new SongController();
        $song->index();
    }
}