<?php
class SearchView implements IView {
    private $folder = 'search';

    /**
     * Exibe o conteudo ao usuario
     * @see IView::render()
     */
    public function render($file, $params = array()) {
        if(null === $file || $file == '') {
            $file = 'index';
        }

        $file = $this->getFolderName() . DIRECTORY_SEPARATOR . $file . '.php';

        if(!file_exists($file)) {
            throw new Exception('View inv�lida');
        }

        include $file;
    }

    private function getFolderName() {
        return VIEW_PATH . $this->folder;
    }

    public static function renderBook(Book $book) {
        include 'search/book.php';
    }
}