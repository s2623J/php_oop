<?php

/**
 * This page can be executed in VS Code via the 
 * debug "Launch currently open script". Output 
 * will be visible in the Debug Console
 */

spl_autoload_register('autoloadStuff');

function autoloadStuff($myClass) { // Must pass in the CLASS NAME
    $parts = explode('\\', $myClass);
    $name = array_pop($parts); 
    echo($name);
    // require_once(str_replace('\\', '/', $myClass) . '.php'); // Works fine
    require_once(sprintf('classes/%s.php', $name)); // Works fine - different directory
}

use App\Lib1\MyClass as X;
use App\Lib2\YourClass as Y;

$ns_1 = new X(' | Hello! | ');  // Sets variable and induces autoload
echo($ns_1->var);               // Calls instantiated object variable
$ns_2 = new Y(' | OOP is fun! | ');
echo($ns_2->my_function());

/**
 * Interfaces
 */
interface MyInterface{
    public function do_thing();
    public function do_other_thing();
}

class MyClass implements MyInterface {
    public function do_thing()
    {
        # code...
    }

    public function do_other_thing()
    {
        # code...
    }

    /**
     * You can add to an interface, but you 
     * cannot subtract any properties/methods
     */
    public function do_yet_another_thing()
    {
        # code...
    }
}

/**
 * True MVC:
 * The controller and view do not communicate.
 * The only intermediary between the two, is 
 * the model. The model does CRUD and misc DB 
 * work.
 */

 // Pickup on lesson #11