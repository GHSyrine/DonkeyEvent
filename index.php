<?php
ini_set('display_errors', 1);
class App
{
    protected $URL;
    protected $controller;
    protected $method;
    protected $params;

    public function __construct($URL)
    {
        $this->URL = $_SERVER['REQUEST_URI'];
    }

    /**
     * Get the URL
     * @return array
     */

    private function getURL() : array
    {
        $this->URL = explode('/', $this->URL);
        $this->URL = array_filter($this->URL);
        $this->URL = array_values($this->URL);

        if (empty($this->URL) || !file_exists('Controller/' . ucfirst($this->URL[0]) . 'Controller.php')) {
            $this->URL = [];
            $this->URL[0] = 'movie';
            header('location: /movie');
        }
        return $this->URL;
    }

    /**
     * Get the parameters from the URL
     * @return array
     */

    private function getParams() : array
    {
        $this->params = $this->URL;
        unset($this->params[0]);
        $this->params = array_values($this->params);
        return $this->params;
    }

    /**
     * Get the controller from the URL
     * @return void
     */

    public function getController() : void
    {
        // Récuperer le controller associé à l'URL
        $this->URL = $this->getURL();
        $this->params = $this->getParams();
        $controller = ucfirst($this->URL[0]) . 'Controller.php';

        // Si le controller existe, instancier le controller
        if (file_exists('Controller/' . $controller)) {
            require_once 'Controller/' . $controller;
            $this->controller = new (ucfirst($this->URL[0]) . 'Controller');

            // var_dump($this->params);

            // Si la méthode dans les paramètres existe, garder la méthode, sinon garder la méthode par défaut
            if (!in_array($this->params[0], $this->controller->ALLOWED_METHODS) && !empty($this->params)) {
                $this->URL[0] = 'notFound';
                $this->controller = "test";
                header('location: /notFound');
                return;
            } else {
                $this->method = $this->params[0];
            }

            if ($this->method == 'one'){
                if (empty($this->params[1])) {
                    $this->URL[0] = 'notFound';
                    $this->controller = "test";
                    header('location: /notFound');
                    return;
                }
            }

            // Si des paramètres existent, garder la vue associée au controller et aux paramètres
            if (!empty($this->params)) {
                $view = $this->URL[0] . $this->params[0];
            } else {
                $view = $this->URL[0];
            }

            if ($this->URL[0] == 'notFound') {
                $view = $this->URL[0];
            }

            // Si l'URL est "NotFound" alors afficher la vue NotFound
            if ($this->URL[0] == 'notFound') {
                $this->controller->getView($view, []);
                return;
            }
            // Afficher la vue associée au controller
            $this->controller->getView($view, $this->controller->{$this->method}($this->params[1]));
            
        } else {
            // Rediriger vers l'URL notFound pour instancer le controller NotFound et afficher la vue NotFound
            header('location: /notFound');
        }
    }
}

$app = new App($_SERVER['REQUEST_URI']);
$app->getController();
?>