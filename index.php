<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php




function dd($option='', $arg=''){
    echo "<style>
            .dd_container{
                border : 3px dashed black;
                text-align: center;
                width: 300px;
                padding: 3px;
                position: fixed;
                bottom :0;
                left: 0;
                display: none;
            } 
            
            .dd_container ul{
               text-align: left; 
            }
            
            .dd_arrow{
            width: 50px;
            height:50px;
            background-color: #00ccff;
            position: fixed;
            bottom :0;
            left: 0;
            }
            
            .dd_close{
                width: 15px;
                height:15px;
                background-color: #00ccff;
                position: absolute;
                top :0;
                right: 0;
            }
            
        </style>";


    switch ($option) {
        //Doc
    case 0:
		echo '<div class="dd_container">';
		echo '<div class="dd_close" onclick="dd_close()"></div>';
		echo '<h3>== tools ==</h3>';
        echo '<form method="POST" id="dd_form">';
        echo '<ul><li>1 : var_dump(<input name="vd" class="dd_vd" type="text" placeholder="$...">)</li>';
        echo '<li>2 : print_r(<input name="pr" type="text" placeholder="$...">)</li>';
        echo '<li>3 : console.log(<input name="cl" type="text" placeholder="$...">)</li>';
        echo '<li>4 : get_defined_var(<input name="gdv" type="checkbox">)</li>';
        echo '<li>5 : get_defined_constants(<input name="gdc" type="checkbox">)</li></ul>';
        echo '<input type="submit">';
		echo '</form></div>';

		echo '<div class="dd_arrow" onclick="dd_show()"></div>';



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



            $("#dd_form").click('submit', function (e) {

                var vd = $(".dd_vd").val();
                    jQuery.ajax({
                        type: "POST",
                        url: "traitement.php",
                        data: {vd : vd},


                        success: function(result){
                            console.log(result);
                        }
                    });
                console.log(vd);
                    e.preventDefault();
                    return false;
                });


        </script>

<?php





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