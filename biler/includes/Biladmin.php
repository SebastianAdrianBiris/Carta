<?php

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
    <script src="../wp-content/plugins/biler/includes/js/biler.js"></script>
<body onload="GetBrands();Check();">
    <div id="tab-container" >
        <ul class="tab-menu">
            <li id="html"  class="active">Upload bil</li>
            <li id="css" onclick="Loadposts()">Oversigt</li>
        </ul>
        <div class="clear"></div>
        <div class="tab-top-border"></div>
        <div id="html-tab" class="tab-content active">
            <h1>Upload bil </h1>
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
                                    </select>
                            </td>
                        </tr>
                            <tr>
                            <td scope="row" align="left">
                                <label title="Title for galley page">Tag</label>
                                <input type="text" class="textbox-custom" id="title" name="title" required/>
                        </tr>
                         <tr>
                            <td  scope="row" align="left">
                                <label title="Title for car page">Title</label>
                                <input id="title_long"  class="textbox-custom"  name="title_long" required/>
                            </td>
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
                            <td scope="row" align="left">
                                <label>Brændstof</label>
                                <select  class="textbox-custom" id="fuel" name="fuel">
                                    <option value="Benzin">Benzin</option>
                                    <option value="Diesel">Diesel</option>
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
                               <label>Samlet Besparelse</label>
                                 <input type="number" class="textbox-custom" id="besparelse" name="besparelse" required/>
                         </tr>
                        <tr>
                            <td scope="row" align="left">
                             <label>Leasingperiode</label>
                                <input type="number" class="textbox-custom" id="periode" name="periode"    required/>
                        </tr>
                          <tr>
                            <td scope="row" align="left">
                                <label>Kørsel km./årligt</label>
                                <input type="number" class="textbox-custom" id="korsel" name="korsel"    required/>
                        </tr>
                        <tr>
                         <td scope="row" align="left">
                         <hr>
                          </tr>
                              <tr>
                            <td scope="row" align="left">
                                <h1><input type="checkbox" name= checkboxFlex id ="checkboxFlex" onclick="ShowLablesFlex()" > <b>Flex<br></h1>
                        </tr>
                           <tr>
                            <td scope="row" align="left">
                                <label>Ydelse Flexleasing</label>
                                <input type="number" class="textbox-custom" id="Ydelse_flex" name="Ydelse_flex" style="background-color:#ccc;"  disabled required/>
                         </tr>

                            <tr>
                            <td scope="row" align="left">
                                <label>1. Ydelse.</label>
                                <input type="number" class="textbox-custom" id="1_ydelse_flex" name="1_ydelse_flex" style="background-color:#ccc;"  disabled required/>

                        </tr>
                         <tr  >
                            <td scope="row" align="left">
                             <label  id ="lable1">Beskatningsgrudlag</label>
                                <input  class="textbox-custom" id="beskatningsgrundlag_flex" name="beskatningsgrundlag_flex" style="background-color:#ccc;"  disabled required/>
                        </tr>
                          <tr>
                         <td scope="row" align="left">
                         <hr>
                        <tr>
                            <td scope="row" align="left">
                                <h1><input type="checkbox" name= checkboxDele id ="checkboxDele" onclick="ShowLablesDele()" > <b>Dele<br></h1>
                        </tr>

                        <tr>
                            <td scope="row" align="left">
                                <label>Deleleasing Ydelse</label>
                                <input type="number" class="textbox-custom" id="Ydelse_dele" name="Ydelse_dele" style="background-color:#ccc;"  disabled />
                        </tr>
                          <tr>
                            <td scope="row" align="left">
                                <label>1. Ydelse.</label>
                                <input type="number" class="textbox-custom" id="1_ydelse_dele" name="1_ydelse_dele" style="background-color:#ccc;"  disabled required/>

                        </tr>
                        <tr>
                            <td scope="row" align="left">
                                <label>Driftstillæg</label>
                                <input type="number" class="textbox-custom" id="driftstillæg" name="driftstillæg" style="background-color:#ccc;"  disabled />
                        </tr>
                         <tr>
                            <td scope="row" align="left">
                             <label>Beskatningsgrudlag</label>
                                <input type="number" class="textbox-custom" id="beskatningsgrundlag_dele" name="beskatningsgrundlag_dele" style="background-color:#ccc;"  disabled required/>
                        </tr>
                         <tr>
                            <td scope="row" align="left">
                                <label>Skat af fri bil (netto)</label>
                                <input type="number" class="textbox-custom" id="skat_af_fri_bil" name="skat_af_fri_bil" style="background-color:#ccc;"  disabled />
                        </tr>
                        <tr>
                            <td scope="row" align="left">
                            <label>Beskrivelse</label>
                            <textarea id="description" class="textbox-custom" type="text" name="description"></textarea><br></td>
                        </tr>

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
            <div id="bptestcheck">

            </div>
            </body>

    </form>
</fieldset>
</p></div>
<form name="secondForm"   method="post">
<div id="css-tab" class="tab-content">
    <div id="testdiv"></div>
    <div id="testdiv1"></div>
    </form>
</div>
';
    echo $html;
}
?>