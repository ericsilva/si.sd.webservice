<?php
/**
 *
 * Define o contrato para o controller
 * @author ericsilva
 *
 */
abstract class Controller implements IController {

    /**
     *
     * Parametros do request
     * @var array
     */
    private $params = array();

    public function __construct() {
        $params =
            array_merge(
                (isset($_POST) ? $_POST : array()),
                (isset($_GET) ? $_GET : array())
            );

        $this->setParams($params);
    }

    public function setParams($params) {
        $this->params = $params;
    }

    public function getParams() {
        return $this->params;
    }

    public function json($dados) {
        header('Content-type: application/json');
        echo json_encode($dados);
        die;
    }


}