<?php
/**
 * User: Oleg Prihodko
 * Mail: shuru@e-mind.ru
 * Date: 29.07.2019
 * Time: 11:48
 */

namespace App\System;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;

class App
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Router
     */
    private $router;
    private $routes;
    private $requestContext;
    private $controller;
    private $arguments;
    private $basePath;
    public static $instance = null;

    public static function getInstance($basePath = null)
    {
        if(is_null(static::$instance)){
            static::$instance = new static($basePath);
        }
        return static::$instance;
    }

    private function __construct($basePath = null)
    {
        $this->basePath = $basePath;
        $this->setRequest();
        $this->setRequestContext();
        $this->setRouter();
        $this->routes = $this->router->getRouteCollection();
    }
    public function run()
    {
        $matcher = new UrlMatcher($this->routes, $this->requestContext);
        try {
            $this->request->attributes->add($matcher->match($this->request->getPathInfo()));

            $this->controller = $this->getController();
            $this->arguments = $this->getArguments();
            /**
             * @var $response Response
             */
            $response = call_user_func($this->controller, $this->arguments);
        } catch (\Exception $e){
        	exit("Error");
        }

        $response->send();
    }

    private function setRequest()
    {
        $this->request = Request::createFromGlobals();
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    private function setRequestContext()
    {
        $this->requestContext = new RequestContext();
        $this->requestContext->fromRequest($this->request);
    }

    private function setRouter()
    {
        $fileLocator = new FileLocator(array(__DIR__));
        $this->router = new Router(
            new YamlFileLoader($fileLocator),
            $this->basePath.'/config/routes.yaml',
            array('cache_dir'=>$this->basePath.'/storage/cache')
        );
    }

    private function getController()
    {
        return (new ControllerResolver())->getController($this->request);
    }

    private function getArguments()
    {
        return (new ArgumentResolver())->getArguments($this->request, $this->controller);
    }
}
