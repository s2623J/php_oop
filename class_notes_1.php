<?php

/**
 * This page can be executed in VS Code via the 
 * debug "Launch currently open script". Output 
 * will be visible in the Debug Console
 */

/**
 * Namespace declaration statement has to be the 
 * very first statement or after any declare call 
 * in the script
 */
namespace App\Lib1;

// Setup Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', true);

/**
 * Classes must be title-case. 
 * Classes fit inside Namespaces, but 
 * have many of the same features
 */
class MyClass{

    // Variable below has public scope and must 
    // begin with "$"
    public $var = 'I like OOP';

    public function __construct($text = '')
    {
        $this->var = $text; // This constructor will override $var
    }

    // Function Examples:
    public function my_function() {
        // "$this" always refers to the class, and its constituents
        echo $this->var;
        // Or:
        // $this->my_function();
    }

    public function my_function_2($inputStr) {
        echo $inputStr;
    }

    final function display_4() {
        // This cannot be overriden
        echo(' | This is a final method that cannot be overridden | ');
        echo(' | Final classes cannot be extended | ');
    }
}

$myClass = new MyClass();

$myClass->my_function();
$myClass->my_function_2('   Hello! ;-)');
$firstClass = new $myClass("an overriden property!");
$secondClass = new $myClass("another overriden property!");
$firstClass->my_function();
$secondClass->my_function();

var_dump($myClass->var); // Prints overridden value

class ChildClass extends MyClass {

    public function __construct($text = '') {
        echo($text);
    }

    public function display() {
        echo('| Public function within childClass only | ');
    }

    protected function display_2() {
        return ' | This uses a protected function! |';
    }

    public function display_3() {
        echo($this->display_2());
    }

    public static function myStatic() {
        // Static functions are not meant to be
        // used in the object's scope
        echo(' | This is a static function | ');
    }
}

/**
 * ChildClass inherits ALL of the functionality of MyClass
 * except for anything scoped as "private" 
 */
$childClass = new ChildClass();
$childClass->my_function_2('This is from a child class!');
$childClass->display();
$childClass->display_3();
$childClass->__construct(' | I like OOP! | ');
$childClass->display_4();

// Both lines below work the same
$childClass::myStatic();
ChildClass::myStatic();

/**
 * Why use "Static"?
 * Static was used within classes before Namespaces 
 * were a thing. Allows access to properties and 
 * methods without having to instantiate the class. 
 * Used much like a global variable.
 * Namespaces are generally preferred over Static
 */


namespace App\Lib2;

 class MyClass_2 {
    public $var = ' | This is the second namespace | ';
 }


namespace App\Lib3;

use App\Lib1\MyClass as X; // "X" is an alias
use App\Lib1\ChildClass;
use App\Lib2\MyClass_2;

$ns_1 = new X(' | This is the first namespace | ');
$ns_1->my_function();
$ns_2 = new MyClass_2();
echo($ns_2->var);
new ChildClass(' | This is ChildClass in first namespace | ');

/**
 * Autoload page(s) tend to be better when you 
 * have a more back-end heavy app (ie. MVC).
 * The effect is centralize, for example, 15 
 * require_once() lines.
 * 
 * See class_notes_2.php
 */


