<?php
/**
 *
 * AutoLoad para as classes
 * @author ericsilva
 *
 */
class Autoloader {
    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }
    private function loader($className) {
        @include $className . '.php';
    }
}

$autoloader = new Autoloader();