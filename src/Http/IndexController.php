<?php

namespace App\Http;

use App\System\Controller\Controller;

class IndexController extends Controller
{

    public function index()
    {
        return $this->render("index/index", ["title" => "Test index page!"]);
    }
}
