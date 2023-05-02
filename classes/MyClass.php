<?php
namespace App\Lib1;

class MyClass {
    public $var = 'I like OOP';
    
    public function __construct($text) {
        $this->var = $text;
    }
    
    public function my_function() {
        echo $this->var;
    }
}