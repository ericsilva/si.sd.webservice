<?php
/**
 * Classe para manipula��o de requisi��es http
 * @author Eric Silva
 * @since 2010
 */
class Http {

    // M�todos suportados
    const HTTP_POST = 'POST';
    const HTTP_GET = 'GET';
    private static $_method = null;
    private static $_instance = null;


    public static function getInstance() {
        if(null == self::$_instance) {
            $classe = __CLASS__;
            self::$_instance = new $classe;
        }
        return self::$_instance;
    }

    /**
     * M�todo que ser� utilizada para solicitar a requisi��o
     * @param string $method string
     */
    public function setMethod($method) {
        $method = strtolower($method);
        switch($method) {
            case 'post':
                self::$_method = self::HTTP_POST;
                break;
            case 'get':
                self::$_method = self::HTTP_GET;
                break;
            default:
                throw new Exception('M�todo de requisi��o n�o suportado');
                break;
        }
        return self::$_instance;
    }

    /**
     * M�todo a ser utilizado na requisi��o
     *
     * @return void
     */
    public static function getMethod() {
        return self::$_method;
    }

    /**
     * Realiza uma requisi��o
     *
     * @param string $url url a ser requisitada
     * @param array $params par�metros passados para a url
     * @return mixed
     */
    private function request($url, array $params) {

        // montando a query string
        $query = http_build_query($params);

        // cabe�alho da requisi��o
        $paramsStream = array(
            'http' => array(
                'timeout' => 10,
                'method' => self::getMethod(),
                'header' =>
                      "Content-Type: application/x-www-form-urlencoded\r\n"
                      . 'Content-Length: ' . strlen($query),
                'content' => $query
                      )
                      );

                      switch(self::getMethod()) {
                          case self::HTTP_POST:
                              $steram = stream_context_create($paramsStream);
                              break;

                          case self::HTTP_GET:
                              $steram = null;
                              $url .= '?' . $query;
                              break;
                          default:
                              throw new Exception('M�todo de requisi��o n�o suportado');
                              break;
                      }

                      return file_get_contents($url, false, $steram);
    }

    /**
     * Realiza uma requisi��o POST
     *
     * @param string $url url a ser requisitada
     * @param array $params par�metros passados para a url
     * @return mixed
     */
    public static function post($url, $params = array()) {
        $s = self::getInstance();
        return $s->setMethod(self::HTTP_POST)->request($url, $params);
    }

    /**
     * Realiza uma requisi��o GET
     *
     * @param string $url url a ser requisitada
     * @param array $params par�metros passados para a url
     * @return mixed
     */
    public static function get($url, $params = array()) {
        $s = self::getInstance();
        return $s->setMethod(self::HTTP_GET)->request($url, $params);
    }

}