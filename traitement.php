<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 20/09/2018
 * Time: 16:40
 */


if(isset($_POST['vd']) && !empty($_POST['vd'])){
    global $$_POST['vd'];
//    var_dump($$_POST['vd']);

    return 'return ok';

}

//        if(isset($_GET['vd']) && !empty($_GET['vd'])){
//            global $$_GET['vd'];
//            var_dump($$_GET['vd']);
//
//            echo 'okdddd';
//
//        }

if(isset($_POST['pr']) && !empty($_POST['pr'])){
    global $$_POST['pr'];
    echo '<pre>';
    print_r($$_POST['pr']);
    echo '</pre>';
}

if(isset($_POST['cl']) && !empty($_POST['cl'])){
    global $$_POST['cl'];
    echo '<script>';
    echo 'console.log('. json_encode( $$_POST['cl'] ) .')';
    echo '</script>';
}

if(isset($_POST['gdv']) && !empty($_POST['gdv'])){
    echo '<pre>';
    print_r($GLOBALS += get_defined_vars());
    echo '</pre>';
}

if(isset($_POST['gdc']) && !empty($_POST['gdc'])){
    echo '<pre>';
    print_r(get_defined_constants());
    echo '</pre>';
}





