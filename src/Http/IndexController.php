<?php

namespace App\Http;

use App\System\Controller\Controller;

class IndexController extends Controller
{

    public function index()
    {
        return $this->render("index/index", ["dbuser" => app()->get('config')->get('database.user')]);
    }
}
