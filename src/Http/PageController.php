<?php
/**
 * User: Oleg Prihodko
 * Mail: shuru@e-mind.ru
 * Date: 29.07.2019
 * Time: 14:17
 */

namespace App\Http;

use App\System\Controller\Controller;

class PageController extends Controller
{
    public function show()
    {
        return $this->render("page/show", ['title' => 'Hello World!']);
    }
}
