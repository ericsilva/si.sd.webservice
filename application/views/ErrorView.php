<?php
class ErrorView implements IView {
    private $folder = 'error';

    /**
     * (non-PHPdoc)
     * @see IView::render()
     */
    public function render($code, $params = null) {
        switch($code) {
            case '404':
                $file = '404';
                break;

            default:
                $file = '404';
                break;
        }

        $file = $this->getFolderName() . DIRECTORY_SEPARATOR . $file . '.php';
        include $file;
    }

    private function getFolderName() {
        return VIEW_PATH . $this->folder;
    }
}