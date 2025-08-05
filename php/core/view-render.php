<?php
    class ViewController{
        protected function render($path, $params = [], $layout = ''){
            require_once(__DIR__ . '/../views/'. $path . '.php');
        }
    }