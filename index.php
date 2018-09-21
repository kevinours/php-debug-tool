
<?php


function dd($option='', $arg=''){


//	    ------------------------------------
//	    PARAM
//	    ------------------------------------

    $jQuery = true; // true to load jQuery from the function - recommended to add it manually with the others scripts
    $dd_height_result = "500px"; // result window's height
    $dd_height_container = 220; //
    $dd_width_container = 300; //
    $horizontal_position = "left"; //possibles values are left, right, middle
    $vertical_position = "middle"; //possibles values are top, bottom, middle



//	    ------------------------------------
    if($jQuery){
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
    }

    ?>

    <script>

        var dd_width = document.getElementById("dd_container").offsetWidth ;
        var dd_height = document.getElementById("dd_container").offsetHeight;

        function dd_show(){
            $('.dd_arrow').fadeOut('slow','linear');
            $('.dd_container').fadeIn('slow','linear');
        }

        function dd_close(){
            $('.dd_arrow').fadeIn('slow','linear');
            $('.dd_container').fadeOut('slow','linear');
        }

        function dd_close_result(){
            $('.dd_result').fadeOut('slow','linear');
        }
    </script>

    <style>
            .dd_container{
                border : 3px dashed black;
                text-align: center;
                width: <?= $dd_width_container;?>px;
                height: <?= $dd_height_container;?>px;
                padding: 3px;
                position: fixed;
                <?php if($horizontal_position != "middle"){

                echo !empty($horizontal_position) ? $horizontal_position.":0;":"";
                } else {
                    $w = ($dd_width_container+12)/2 ;
                    echo 'left : calc(50% - '.$w.'px);';
                }?>

                <?php if($vertical_position != "middle"){
                    echo !empty($vertical_position) ? $vertical_position.":0;":"";
                } else {
                    $h = ($dd_height_container+12)/2 ;
                    echo 'top : calc(50% - '.$h.'px);';
                }?>
                display: none;
                background-color: white;
                z-index: 11;
            }

            
            .dd_container ul{
               text-align: left; 
            }
            
            .dd_arrow{
                width: 50px;
                height:50px;
                background-color: #00ccff;
                position: fixed;
                <?php if($horizontal_position != "middle"){

                echo !empty($horizontal_position) ? $horizontal_position.":0;":"";
                } else {
                    echo "left : calc(50% - 25px);";
                }?>

                <?php if($vertical_position != "middle"){

                echo !empty($vertical_position) ? $vertical_position.":0;":"";
                } else {
                    echo "top : calc(50% - 25px);";
                }?>
                z-index: 20;
            }
            
            .dd_close{
                width: 15px;
                height:15px;
                background-color: #00ccff;
                position: absolute;
                top :0;
                right: 0;
            }
            
            .dd_result{
                z-index: 10;
                width: 90%;
                border-top: 2px lightgrey solid;
                border-bottom: 2px lightgrey solid;
                margin: auto;
                position: fixed;
                top : 2%;
                left: 5%;
                overflow: scroll;
                height: <?= $dd_height_result;?>;
            }            
            
            .dd_close_result{
                width: 15px;
                height:15px;
                background-color: #00ccff;
                float : right;
                z-index: 15;
                margin-bottom: 100px;
            }
            
        </style>


    <?php
    switch ($option) {
        case 0:
            echo '<div class="dd_container">';
                echo '<div class="dd_close" onclick="dd_close()"></div>';
                echo '<h3>== tools ==</h3>';
                echo '<form method="POST" id="dd_form">';
                    echo '<ul>';
                        echo '<li>1 : var_dump(<input name="vd" class="dd_vd" type="text" placeholder="$...">)<input name="vd_json" type="checkbox"></li>';
                        echo '<li>2 : print_r(<input name="pr" type="text" placeholder="$...">)<input name="pr_json" type="checkbox"></li>';
                        echo '<li>3 : console.log(<input name="cl" type="text" placeholder="$...">)</li>';
                        echo '<li>4 : get_defined_var(<input name="gdv" type="checkbox">)</li>';
                        echo '<li>5 : get_defined_constants(<input name="gdc" type="checkbox">)</li>';
                    echo '</ul>';
                    echo '<input type="submit" value="See result">';
                echo '</form>';
            echo '</div>'; // dd_container
            echo '<div class="dd_arrow" onclick="dd_show()"></div>';
    ?>



            <?php
            if(isset($_POST['vd']) && !empty($_POST['vd']) || isset($_POST['pr']) && !empty($_POST['pr']) || isset($_POST['gdv']) && !empty($_POST['gdv']) || isset($_POST['gdc']) && !empty($_POST['gdc'])){
                echo '<div class="dd_result"><div class="dd_close_result" onclick="dd_close_result()"></div>';
            }


            if(isset($_POST['vd']) && !empty($_POST['vd'])){
                global $$_POST['vd'];
                    if(isset($$_POST['vd'])){
                        var_dump($$_POST['vd']);
                    } else if(isset($_POST['vd_json'])){
                        var_dump(json_decode($_POST['vd']));
                    }
                    else {
                        var_dump($_POST['vd']);
                    }

            }
            if(isset($_POST['pr']) && !empty($_POST['pr'])){
                global $$_POST['pr'];
                echo '<pre>';
                    if(isset($$_POST['pr'])){
                        print_r($$_POST['pr']);
                    } else if(isset($_POST['pr_json'])){
                        print_r(json_decode($_POST['pr']));
                    }else {
                        print_r($_POST['pr']);

                    }
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

            if(isset($_POST['vd']) && !empty($_POST['vd']) || isset($_POST['pr']) && !empty($_POST['pr']) || isset($_POST['cl']) && !empty($_POST['cl']) || isset($_POST['gdv']) && !empty($_POST['gdv']) || isset($_POST['gdc']) && !empty($_POST['gdc'])){
                echo '</div>'; // dd_result
            }



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
            echo '<script>';
                echo 'console.log('. json_encode( $arg ) .')';
            echo '</script>';
            break;

        case 4:
            echo '<pre>';
                print_r($GLOBALS += get_defined_vars());
            echo '</pre>';
            break;

        case 5:
            echo '<pre>';
                print_r(get_defined_constants());
            echo '</pre>';
            break;
    }

}


dd(0);