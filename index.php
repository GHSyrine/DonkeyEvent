<?php

class App
{
    protected $URL;
    protected $params;

    public function __construct($URL)
    {
        $this->URL = $_SERVER['REQUEST_URI'];
    }

    private function getURL(): array
    {
        $this->URL = explode('/', $this->URL);
        $this->URL = array_filter($this->URL);
        $this->URL = array_values($this->URL);
        return $this->URL;
    }

    private function getParams(): array
    {
        $this->params = $this->URL;
        unset($this->params[0]);
        $this->params = array_values($this->params);
        return $this->params;
    }

    public function getController(): void
    {
        $this->URL = $this->getURL();
        $this->params = $this->getParams();
        if (!empty($this->params)) {
            $view = $this->URL[0] . $this->params[0];
        } else {
            $view = $this->URL[0];
        }

        // Si le controller existe, instancier le controller
        $controller = ucfirst($this->URL[0]) . 'Controller';
        if (file_exists('Controller/' . $controller . '.php')) {
            require_once 'Controller/' . $controller . '.php';
            $controller = new $controller;
            
        } else {
            // Si c'est la page notFound, afficher la page notFound
            if ($controller === "notFoundController") {
                require_once "Template/notFound.html.php";
                return;
            }
            // Rediriger vers l'URL notFound si le controller n'existe pas pour afficher la page notFound
            header('location: /notFound');
        }
    }
}

$app = new App($_SERVER['REQUEST_URI']);
$app->getController();
