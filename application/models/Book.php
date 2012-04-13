<?php
/**
 *
 * Entidadee Book
 * @author ericsilva
 */

class Book {
    private $titulo = '';
    private $subTitulo = '';
    private $numPaginas = '';
    private $autores = array();
    private $anoPublicacao = '';
    private $descricao = '';
    private $editora = '';
    private $thumbnail = '';
    private $link = '';

    public function __construct() {

    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setSubTitulo($subTitulo) {
        $this->subTitulo = $subTitulo;
        return $this;
    }

    public function getSubTitulo() {
        return $this->subTitulo;
    }

    public function setNumPaginas($numPaginas) {
        $numPaginas = ($numPaginas == '') ? ' - ' : $numPaginas;
        $this->numPaginas = $numPaginas;
        return $this;
    }

    public function getNumPaginas() {
        return $this->numPaginas;
    }

    public function setAutores(array $autores) {
        $this->autores = $autores;
        return $this;
    }

    public function getAutores() {
        return $this->autores;
    }

    public function setAnoPublicacao($anoPublicacao) {
        $anoPublicacao = ($anoPublicacao == '') ? ' - ' : $anoPublicacao;
        $this->anoPublicacao = $anoPublicacao;
        return $this;
    }

    public function getAnoPublicacao() {
        return $this->anoPublicacao;
    }

    public function setDescricao($descricao) {
        $descricao = ($descricao == '') ? ' - ' : $descricao;
        $this->descricao = $descricao;
        return $this;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setEditora($editora) {
        $this->editora = $editora;
        return $this;
    }

    public function getEditora() {
        return $this->editora;
    }

    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getThumbnail() {
        return $this->thumbnail;
    }

    public function setLink($link) {
        $this->link = $link;
        return $this;
    }

    public function getLink() {
        return $this->link;
    }
}