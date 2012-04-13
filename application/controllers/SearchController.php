<?php
class SearchController extends Controller {

    public function execute(){
        $this->request();
    }

    public function request() {
        $params = $this->getParams();

        if(isset($params['listBooks']) && isset($params['q']) && $params['q'] != '') {
            $books = $this->createBooks(Search::find($params['q']));
            $params['books'] = $books;
        }

        $this->response($params);

    }

    public function response($params) {
        $view = new SearchView();
        $view->render('index', $params);
    }

    private function createBooks($data) {
        $books = array();

        foreach($data as $info) {
            $info->volumeInfo->publishedDate =
                isset($info->volumeInfo->publishedDate) ? $info->volumeInfo->publishedDate : '';

            $info->volumeInfo->publisher =
                isset($info->volumeInfo->publisher) ? $info->volumeInfo->publisher : '';

            $info->volumeInfo->imageLinks->thumbnail =
                isset($info->volumeInfo->imageLinks->thumbnail) ? $info->volumeInfo->imageLinks->thumbnail : '';

            $info->volumeInfo->pageCount =
                isset($info->volumeInfo->pageCount) ? $info->volumeInfo->pageCount : 'X';

            $book = new Book();
            $book->setAnoPublicacao($info->volumeInfo->publishedDate)
                ->setEditora($info->volumeInfo->publisher)
                ->setAutores($info->volumeInfo->authors)
                ->setTitulo($info->volumeInfo->title)
                ->setNumPaginas($info->volumeInfo->pageCount)
                ->setThumbnail($info->volumeInfo->imageLinks->thumbnail)
                ->setLink($info->volumeInfo->previewLink);

            $books[] = $book;
        }

        return $books;
    }

}