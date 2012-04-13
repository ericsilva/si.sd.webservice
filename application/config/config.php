<?php

class Config {
    private static $defaultController = 'search';
    private static $googleBooksUrl = 'https://www.googleapis.com/books/v1/volumes';

    public static function getDefaultController() {
        return self::$defaultController;
    }

    public static function getGoogleBooksUrl() {
        return self::$googleBooksUrl;
    }
}