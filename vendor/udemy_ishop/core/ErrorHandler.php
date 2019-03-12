<?php

namespace ishop;

class ErrorHandler
{
    public function __construct() {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exeptionHandler']);
    }

    public function exeptionHandler($e) {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Exeption', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = '') {
        error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$message} | File: {$file} | Line: {$line} \n______________________\n", 3, ROOT . '/tmp/errors.log');
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 404) {
        http_response_code($response);
        if ($response == 404 && !DEBUG) {
            require WWW . '/errors/404.php';
            die;
        }
        if (DEBUG) {
            require WWW . '/errors/dev.php';
        } else {
            require WWW . '/errors/prod.php';
        }
        die;
    }
}