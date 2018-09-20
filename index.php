<?php

function dd($option='', $arg=''){
    echo "<style>
            .dd_container{
                border : 3px dashed black;
                text-align: center;
                width: 200px;;
            } 
            
            .dd_container ul{
               text-align: left; 
            }
            
        </style>";

    $result ='';

    switch ($option) {
        //Doc
    case 0:
		$result .= '<div class="dd_container">== doc ==<br>';
		$result .= '$options possibles values :';
		$result .= '<ul><li>1 : vardump</li>';
		$result .= '<li>2 : print_r</li>';
		$result .= '<li>3 : get defined var</li>';
		$result .= '<li>4 : get defined constants</li></ul>';
        $result .= '$arg possibles values : whatever</div>';
    break;

    case 1:
		var_dump($arg);
    break;

    case 2:
        echo '<pre>';
        print_r($arg);
        echo '</pre>';
    break;

    case 3:
        echo '<pre>';
        print_r($GLOBALS += get_defined_vars());
        echo '</pre>';
    break;

    case 4:
        echo '<pre>';
        print_r(get_defined_constants());
        echo '</pre>';
    break;

    }

    echo $result;
}




$test = json_decode('{"kev":"lol?"}');

dd(0, $test);



//function test($arg='', $arg2=''){
//
//}


//echo '<pre>';
//print_r(get_defined_vars());
//echo '</pre>';

?>