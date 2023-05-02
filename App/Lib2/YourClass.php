<?php
namespace App\Lib2;

class YourClass {
    public $var = 'I hate OOP';
    
    public function __construct($text) {
        $this->var = $text;
    }
    
    public function my_function() {
        echo $this->var;
    }
}