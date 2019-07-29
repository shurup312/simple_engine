<?php

namespace App\Http;

use App\System\Controller\Controller;

class PageController extends Controller
{
    public function show()
    {
        return $this->render("page/show", ['title' => 'Hello World!']);
    }
}
