
<?php

$foo = '{"text":"kevin va au travail le matin","actions":[{"predicate":{"coref":[],"idSentence":0,"idToken":1,"start":6,"lemma":"aller","end":8},"negative":false,"stimulus":{"coref":[],"idSentence":0,"idToken":0,"start":0,"lemma":"Kevin","end":5},"timeexact":{"coref":[],"idSentence":0,"idToken":5,"start":23,"lemma":"matin","end":28},"experiencer":{"coref":[],"idSentence":0,"idToken":3,"start":12,"lemma":"travail","end":19},"idAction":1}]}
';

$a = json_decode($foo);

//var_dump($foo);
//var_dump($a);

function dd($option='', $arg=''){


//	    ------------------------------------
//	    PARAM
//	    ------------------------------------

    $jQuery = true; // true to load jQuery from the function - recommended to add it manually with the others scripts
    $dd_height_result = "500px"; // result window's height
    $dd_height_container = 235; //
    $dd_width_container = 330; //
    $horizontal_position = "left"; //possibles values are left, right, middle
    $vertical_position = "middle"; //possibles values are top, bottom, middle



//	    ------------------------------------
    if($jQuery){
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
    }

    ?>

    <script>

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
                border : 5px dashed #7acf96;
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
                font-size: 14px!important;
                font-family: "Lucida Console";
            }

            table{
                font-size: 12px!important;
                table-layout: auto!important;
            }

            .dd_container table{
                margin: auto;
            }
            
            .dd_arrow{
                width: 30px;
                height:100px;
                border : 1px solid #7acf96;
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
                writing-mode: vertical-rl;
                text-orientation: upright;
                cursor: pointer;
            }

            .dd_arrow:hover{
                transform: scale(1.1);
                transition: 0.5s;
            }

            .dd_arrow span {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                text-transform: uppercase;
            }

            
            .dd_close{
                width: 15px;
                height:15px;
                position: absolute;
                top :0;
                right: 0;
                cursor: pointer;
                margin-top: 2px;
                margin-right: 7px;
            }

            .dd_close:hover{
                color:firebrick;
                font-weight: bold;
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
                cursor: pointer;
                float : right;
                z-index: 15;
                margin-bottom: 100px;
            }

            .dd_close_result:hover{
                 color:firebrick;
                 font-weight: bold;
             }

            .dd_btn {
                color: white;
                font-family: Helvetica, Arial, Sans-Serif;
                font-size: 16px;
                text-decoration: none;
                text-shadow: -1px -1px 1px #616161;
                position: relative;
                padding: 10px 25px;
                -webkit-box-shadow: 4px 4px 0 #666;
                -moz-box-shadow: 4px 4px 0 #666;
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                margin: 0 10px 0 0;
                background: #7ACF96;
                cursor: pointer;
            }

            .dd_btn:hover {
                -webkit-box-shadow: 0px 0px 0 #666;
                -moz-box-shadow: 0px 0px 0 #666;
                top: 5px;
                left: 5px;
            }

        </style>


    <?php
    switch ($option) {
        case 0:
            ?>
            <div class="dd_container">
                <div class="dd_close" onclick="dd_close()">[X]</div>
                    <h3>== tools ==</h3>
                    <form method="POST" id="dd_form">
                        <table>
                            <tr><td>var_dump</td><td>( <input name="vd" class="dd_vd" type="text" placeholder="$..."> )</td><td>json<input name="vd_json" type="checkbox"></td></tr>
                            <tr><td>print_r</td><td>( <input name="pr" type="text" placeholder="$..."> )</td><td>json<input name="pr_json" type="checkbox"></td></tr>
                            <tr><td>console.log</td><td>( <input name="cl" type="text" placeholder="$..."> )</td></tr>
                            <tr><td></td><td>get_defined_var(<input name="gdv" type="checkbox">)</></tr>
                            <tr><td></td><td>get_defined_constants(<input name="gdc" type="checkbox">)</td></tr>
                        </table>
                        <input class="dd_btn" type="submit" value="See result">
                    </form>
                </div> <!--       dd_container-->
            <div class="dd_arrow" onclick="dd_show()"><span>tools</span></div>




            <?php
            if(isset($_POST['vd']) && !empty($_POST['vd']) || isset($_POST['pr']) && !empty($_POST['pr']) || isset($_POST['gdv']) && !empty($_POST['gdv']) || isset($_POST['gdc']) && !empty($_POST['gdc'])){
                echo '<div class="dd_result"><div class="dd_close_result" onclick="dd_close_result()">[X]</div>';
            }


            if(isset($_POST['vd']) && !empty($_POST['vd'])){
                global $$_POST['vd'];
                if(isset($_POST['vd_json'])){
                    if(isset($$_POST['vd'])){
                       var_dump(json_decode($$_POST['vd']));
                    } else {
                        var_dump(json_decode($_POST['vd']));
                    }
                } else if(isset($$_POST['vd'])){
                    var_dump($$_POST['vd']);
                } else {
                    var_dump($_POST['vd']);
                }
            }
            if(isset($_POST['pr']) && !empty($_POST['pr'])){
                global $$_POST['pr'];
                echo '<pre>';
                if(isset($_POST['pr_json'])){
                    if(isset($$_POST['pr'])){
                        print_r(json_decode($$_POST['pr']));
                    } else {
                        print_r(json_decode($_POST['pr']));
                    }
                } else if(isset($$_POST['pr'])){
                    print_r($$_POST['pr']);
                } else {
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