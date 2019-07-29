<?php

namespace App\Http;

use App\System\Controller\Controller;

/**
 * User: Oleg Prihodko
 * Mail: shuru@e-mind.ru
 * Date: 29.07.2019
 * Time: 12:52
 */
class IndexController extends Controller
{

    public function index()
    {
        return $this->render("index/index", ["title" => "Test index page!"]);
    }
}
