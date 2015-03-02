<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 04-Feb-15
 * Time: 11:19 AM
 */
header('Content-Type: text/html; charset=utf-8');
function bp_enqueue_main_js()
{
    $file_dir = plugin_dir_url(__FILE__) . 'jquery-2.1.3.js';
    wp_enqueue_script('jquery-2.1.3.js', $file_dir, false, "1.0", "all");
}

add_action('wp_print_styles', 'bp_enqueue_main_js');
add_action('admin_menu', 'bp_plugin_settings');

function bp_plugin_settings()
{

    global $current_user;

    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
    if ($user_role == 'administrator' || $user_role == 'subscriber') {
        add_menu_page('bil', 'Bil Opload', $user_role, 'Bil Opload', 'bp_display_settings');
    }
}

function bp_display_settings()
{
    $year = date("Y");


    $html = '




<link rel="stylesheet" href="../wp-content/plugins/biler/css/style.css" type="text/css" media="screen">
    <script type="text/javascript" src="../wp-content/plugins/biler/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="../wp-content/plugins/biler/js/tabs.js"></script>

    <script src="../wp-content/plugins/biler/includes/uploadImage.js"></script>
    <script>



function test(){


  $.post("../wp-content/plugins/biler/includes/LoadFromDB.php",
        {
          cardetails:  1404

        },
        function(data,status){


               var container = document.getElementById("testdiv");
        container.innerHTML = data;
        });


}
</script>
    <div id="tab-container">
        <ul class="tab-menu">
            <li id="html"  class="active">Publish a car</li>
            <li id="css">View posts</li>

        </ul>
        <div class="clear"></div>
        <div class="tab-top-border"></div>
        <div id="html-tab" class="tab-content active">
            <h1>Publish a car </h1>
            <form name="form3" enctype="multipart/form-data" method="post" class="elegant-aero" action="../wp-content/plugins/biler/includes/Save.php">



' . wp_nonce_field('update-options') . '




                <table  width="40%"  cellpadding="" action="../wp-content/plugins/biler/includes/Save.php" >
                </div>
                <div id="javascript-tab" class="tab-content">

                    <tbody>
                        <tr>
                            <td scope="row" align="left" >
                                    <label>Valg Mærket </label>
                                    <select class="textbox-custom" id="Brand" name="Brand">
                                        <option value="bmw"> BMW</option>
                                        <option value="merc"> Mercedes Benz</option>
                                        <option value="audi"> Audi</option>
                                         <option value="vovlo"> Volvo</option>
                                          <option value="vw"> VW</option>
                                           <option value="porsche"> Porsche</option>
                                    </select>
                            </td>
                        </tr>
                            <tr>
                            <td scope="row" align="left">
                                <label>Title</label>
                                <input type="text" class="textbox-custom" id="title" name="title" required/>
                        </tr>
                        <tr>
                            <td scope="row" align="left">
                                    <label>Ny/Brugte </label>
                                    <select class="textbox-custom" id="New_old" name="New_old">
                                        <option value="ny"> Ny</option>
                                        <option value="old"> Brugte </option>
                                    </select>
                                <!-- DropDown -->
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" align="left">
                                <label>Årgang</label>
                                <input class="textbox-custom" type="number" min="1950" max=' . "$year" . ' id="production" name="production" required />
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" align="left">
                             <label>Km</label><input class="textbox-custom" type="number" min="0" max="999999" id="kilometer" name="kilometer" required /></td>
                        </tr>
                        <tr>
                            <td  scope="row" align="left">
                                <label>Pris</label>
                                <input id="price"  class="textbox-custom" type="number" min="0" name="price" required/>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" align="left">
                                <label>Brændstof</label>
                                <select  class="textbox-custom" id="fuel" name="fuel">
                                    <option value="benzin">Benzin</option>
                                    <option value="diesel">Diesel</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" align="left">
                                <label>Farve</label>
                                <input type="text" class="textbox-custom" id="colour" name="colour" required/>
                        </tr>
                         <tr>
                            <td scope="row" align="left">
                                <label>Besparelse</label>
                                <input type="number" class="textbox-custom" id="besparelse" name="besparelse" required/>
                        </tr>
                        <tr>
                            <td scope="row" align="left">
                                <label>Kørsel</label>
                                <input type="number" class="textbox-custom" id="korsel" name="korsel" required/>
                        </tr>
                         <tr>
                            <td scope="row" align="left">
                                <label>Periode</label>
                                <input type="number" class="textbox-custom" id="periode" name="periode" required/>
                        </tr>
                         <tr>
                            <td scope="row" align="left">
                                <label>Pr Måned</label>
                                <input type="number" class="textbox-custom" id="permonth" name="permonth" required/>
                        </tr>
                        <tr>
                            <td scope="row" align="left">
                                <label>Ydelse</label>
                                <input type="number" class="textbox-custom" id="ydelse" name="ydelse" required/>
                        </tr>
                        <tr>
                            <td scope="row" align="left">
                                <label>Beskatningsgrundlag</label>
                                <input type="number" class="textbox-custom" id="beskatningsgrundlag" name="beskatningsgrundlag" required/>
                        </tr>

                        <tr>
                            <td scope="row" align="left">
                            <label>Beskrivelse</label>
                            <textarea id="description" class="textbox-custom" type="text" name="description"></textarea><br></td>
                        </tr>
                        <tr>
                                <input type="hidden" id="currentID" name="currentID" value = ""/>
                            </tr>
                        </tr>
                        <tr>
                            <input type="hidden" id="Image1" name="Image1" />
                        </tr>
                    </tr>
                    <tr>
                        <input type="hidden" id="Image2" name="Image2" />
                    </tr>
                </tr>
                <tr>
                    <input type="hidden" id="Image3" name="Image3" />
                </tr>
            </tr>
            <tr>
                <input type="hidden" id="Image4" name="Image4"  />
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="action" value="update" onclick="save()"/>
    <input type="hidden" name="page_options" value="fwds_autoplay,fwds_effect,fwds_interval,fwds_playBtn" />
    <fieldset class="left">
            <br />

            <input type="file" class="padding-fix" onchange="readURL(this);" size="32" name="my_field[]" value="" />

            <input type="file" class="padding-fix"  onchange="readURL2(this);"size="32" name="my_field[]" value="" />

            <input type="file" class="padding-fix" onchange="readURL3(this);"size="32" name="my_field[]" value="" />


            <input type="file" class="padding-fix"  onchange="readURL4(this);"size="32" name="my_field[]" value="" />


            <input type="hidden" name="action" value="multiple" />

            <ul>
           <img id="blah" src="../wp-content/plugins/biler/includes/test/white.png" style="margin-left:0px" alt="your image"  height="auto" width="92" />
           <img id="blah1" src="../wp-content/plugins/biler/includes/test/white.png" style="margin-left:14px" alt="your image" height="auto" width="92" />
           <img id="blah2" src="../wp-content/plugins/biler/includes/test/white.png" style="margin-left:15px" alt="your image" height="auto" width="92" />
           <img id="blah3" src="../wp-content/plugins/biler/includes/test/white.png" style="margin-left:14px" alt="your image" height="auto" width="92" />
            </ul>

            <button  class="myButton" style="margin-left:10px" type="submit" name="Submit" value="upload233" onclick = "" />
            Gem
            </button>
        <script>
function test1(elementTo){


  $.post("../wp-content/plugins/biler/EditDB.php",
        {
            element:  elementTo

        },
        function(elementTo,status){


        var jArray = JSON.parse(elementTo);





        for(var x = 0 ;x < jArray.length; x++ ){

        }

            var container = document.getElementById("Brand").value = jArray[0];
            var container = document.getElementById("title").value = jArray[1];
            var container = document.getElementById("New_old").value = jArray[2];
            var container = document.getElementById("production").value = jArray[3];
            var container = document.getElementById("kilometer").value = jArray[4];
            var container = document.getElementById("price").value = jArray[5];
            var container = document.getElementById("fuel").value = jArray[6];
            var container = document.getElementById("colour").value = jArray[7];
            var container = document.getElementById("besparelse").value = jArray[8];
            var container = document.getElementById("korsel").value = jArray[9];
            var container = document.getElementById("periode").value = jArray[10];
            var container = document.getElementById("permonth").value = jArray[11];
            var container = document.getElementById("ydelse").value = jArray[12];
            var container = document.getElementById("beskatningsgrundlag").value = jArray[13];
            var container = document.getElementById("description").value = jArray[14];
     /*  thi is date     var container = document.getElementById("date").value = jArray[15]; */

            var container = document.getElementById("Image1").value =  jArray[16];
            var container = document.getElementById("Image2").value =  jArray[17];
            var container = document.getElementById("Image3").value = jArray[18];
            var container = document.getElementById("Image4").value =  jArray[19];


            var container = document.getElementById("blah").src =  "../wp-content/plugins/biler/includes/test/"+jArray[16];
            var container = document.getElementById("blah1").src =  "../wp-content/plugins/biler/includes/test/"+jArray[17];
            var container = document.getElementById("blah2").src =  "../wp-content/plugins/biler/includes/test/"+jArray[18];
            var container = document.getElementById("blah3").src =  "../wp-content/plugins/biler/includes/test/"+jArray[19];
            var container = document.getElementById("currentID").value = jArray[20];


        });

}
  function DeleteAll()
         {

          var x = confirm("Are you sure you want to delete this post?");
             if (x==true){
                 var vals = [];
                $(":checkbox:checked[name^=checkboxDelete]").val(function() {
                vals.push(this.id);});

                 if(vals.length != 0)
                     {
                 $.post("http://localhost:8080/wp-content/plugins/biler/DeleteFromDB.php",
                    {
                    vals:vals
                    });
             setTimeout("location.reload(true);",200);
                }
            else {alert("Nothing is selected");
             }
         }

    }
  function test2(elementTo){

  var x = confirm("Are you sure you want to delete this post?");
 if (x==true)
 {
$.post("../wp-content/plugins/biler/DeleteFromDB.php",
{
            element:elementTo
          });

        }
        setTimeout("location.reload(true);",200);
        }

        </script>


    </form>
</fieldset>

</p></div>
<form name="secondForm"   method="post">
<div id="css-tab" class="tab-content" >
<body onload="test()">
    <div id="testdiv"></div>
    <div id="testdiv1"></div>
</body>

    </form>


</div>



';

    echo $html;


}

?>