<?php

namespace App\System\Controller;

use App\System\View\View;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller implements ControllerInterface
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render($path, $data = [])
    {
        return new Response($this->view->make($path, $data));
    }
}
