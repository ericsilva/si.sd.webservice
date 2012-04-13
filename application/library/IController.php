<?php
/**
 *
 * Define o contrato para o controller
 * @author ericsilva
 *
 */
interface IController {

    /**
     *
     * Inicia o fluxo de execucao do controller
     */
    function execute();
    /**
     *
     * Executa o fluxo para a requisicao
     */
    function request();

    /**
     *
     * Responde a uma requisicao
     */
    function response($params);
}