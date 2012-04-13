<?php
/**
 *
 * Modelo responsavel por consumir o Webservice Google Books
 * @author ericsilva
 *
 */
class Search {

    /**
     *
     * Realiza a busca por uma determinada string
     * @param String $string Termo a ser pesquisado
     */
    public static function find($string) {
        $http = new Http();
        $result = $http->get(Config::getGoogleBooksUrl(), array('q' => $string));

        if(!$result) {
            return array();
        }

        $result = json_decode($result);
        return $result->items;
    }

}