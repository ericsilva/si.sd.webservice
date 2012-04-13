<?php
class Application {

    /**
     *
     * Run application
     */
    public function run() {

        try {
            // Definindo o nome do controller
            $controller = ucfirst("{$this->getControllerName()}Controller");

            if(!class_exists($controller)) {
                throw new InvalidControllerException('Controller inválido', '404');
            }

            $controller = new $controller;
            $controller->execute();

        } catch(InvalidControllerException $e) {
            $view = new ErrorView();
            $view->render($e->getCode());

        } catch(Exception $e) {
            die($e->getMessage());
        }


    }

    /**
     *
     * Qual controller esta sendo requisitado
     */
    private function getControllerName() {
        if(isset($_GET['c']) && !empty($_GET['c'])) {
            return $_GET['c'];
        }
        return Config::getDefaultController();
    }
}