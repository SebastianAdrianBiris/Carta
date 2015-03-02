<?php
/*
	Template name: carpage
*/
?>


<?php get_header(); ?>



<link type="text/css" href="../wp-content/themes/carta/css/style.css" rel="stylesheet"/>
<link type="text/css" href="../wp-content/themes/carta/css/bootstrap.min.css" rel="stylesheet"/>
<script type="text/javascript" src="../wp-content/themes/carta/js/tabs_old.js"></script>
<script type="text/javascript" src="../wp-content/themes/carta/js/jquery.min.js"></script>

<script type="text/javascript" src="../wp-content/themes/carta/js/script.js"></script>


<meta http-equiv="Content-Type" tab-content="text/html; charset=UTF-8">
<title>Tabs</title>
<meta charset="utf-8"/>

<body >
<div>

    <div class="container">
        <div class="row clearfix" style="padding-top:100px;">
            <div class="col-md-2 column">
                <span class="pull-right">
                <div class="menu_simple">
                    <ul>
                        <li>
                            <a href="#" type="button"  onclick="myFunctionGet()" style="font-size: 12px; color: white; text-align:right;">Nye Biller </a><br/>
                        </li>
                        <li>
                            <a href="#" type="button"  onclick="myFunctionGet()" style="font-size: 12px; color: white; text-align:right;">Brugte Biller </a><br/>
                        </li>
                        <li>

                            <a href="#" type="button"  onclick="myFunctionGet()">Audi </a>
                        </li>

                        <li>
                            <a href="#" type="button" onclick="myFunctionGet()">Mercedes </a>
                        </li>
                        <li>
                            <a href="#" type="button" onclick="myFunctionGet()">BMW </a>
                        </li>

                        <li>
                            <a href="#" type="button" onclick="myFunctionGet()">Volvo </a>
                        </li>

                        <li>
                            <a href="#" type="button" onclick="myFunctionGet()">Porsche </a>
                        </li>
                        <li>
                            <a href="#" type="button" onclick="myFunctionGet()">VW </a>
                        </li>


                    </ul>
                    </span>
            </div>
        </div>
        <div class="col-md-5 column">
            <div id="gallery">
                <p class="head-lines">Audi A3 1.9 TDI<br/>
                    Sportpack DPF Attraction</p>

                <div id="bigimages">
                    <div id="normal1" class=".img-responsive">
                        <img id="image11" src="../wp-content/plugins/biler/test/white.png" alt=""/>
                    </div>

                    <div id="normal2">
                        <img id="image12" src="../wp-content/plugins/biler/test/white.png" alt=""/>
                    </div>

                    <div id="normal3">
                        <img id="image13" src="../wp-content/plugins/biler/test/white.png" alt=""/>
                    </div>

                    <div id="normal4">
                        <img id="image14"  src="../wp-content/plugins/biler/test/white.png" alt=""/>
                    </div>


                </div>
                <div id="thumbs">
                    <a href="javascript: changeImage(1);"><img id="image1" src="../wp-content/plugins/biler/test/white.png" alt=""/></a>
                    <a href="javascript: changeImage(2);"><img id="image2" src="../wp-content/plugins/biler/test/white.png" alt=""/></a>
                    <a href="javascript: changeImage(3);"><img id="image3" src="../wp-content/plugins/biler/test/white.png" alt=""/></a>
                    <a href="javascript: changeImage(4);"><img id="image4" src="../wp-content/plugins/biler/test/white.png" alt=""/></a>
                </div>
                <table class="content-table" style="width:100%">
                    <tr>
                        <td>Årgang</td>
                        <td id="year">2006</td>

                    </tr>
                    <tr>
                        <td>Km</td>
                        <td id="km">88.854</td>

                    </tr>
                    <tr>
                        <td>Farve</td>
                        <td id="color">Hvid</td>

                    </tr>
                    <tr>
                        <td>Brændstof</td>
                        <td id="fuel">Diesel</td>

                    </tr>
                </table>
                <p id="bp_description" class="custom-mid-h custom-mid-h-2">
                    Lorem Ipsum er ganske enkelt fyldtekst fra print- og typografiindustrien. Lorem Ipsum har været
                    standard fyldtekst siden 1500-tallet, hvor en ukendt trykker sammensatte en tilfældig spalte for at
                    trykke en bog til sammenligning af forskellige skrifttyper. Lorem Ipsum har ikke alene
                    trykke en bog til sammenligning af forskellige skrifttyper. Lorem Ipsum har ikke alene
                </p>
            </div>
        </div>
        <div class="col-md-5 column">
            <div id="bp_car-shared-leasing-slider-description">

                <div id="bp_car-shared-leasing">
                    <div id="tabContainer">
                        <div id="tabs">
                            <ul>
                                <li id="tabHeader_1">Deleasing</li>
                                <li id="tabHeader_2">Flexleasing</li>
                            </ul>
                        </div>
                        <div id="tabscontent">
                            <div class="tabpage" id="tabpage_1">
                                <table style="background-color:#fff;">
                                    <tbody>
                                    <tr>
                                        <td>Fordeling</td>
                                        <td class="bp_number">
                                            <div id="bp_percentage-business">
                                                <p>Erhverv</p>

                                                <b></b>
                                            </div>
                                        </td>
                                        <td class="bp_number">
                                            <div id="bp_percentage-private">
                                                <p>Privat</p>

                                                <b></b>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color:white;"></td>
                                        <td class="custom-number" style="padding-top:20px; padding-bottom:20px;">
                                            <div id="bp_car-shared-leasing-slider">
                                                <div id="bp_car-shared-leasing-slider-car">
                                                    <div id="bp_dragger">
                                                        <div id="bp_dragger-arrow">
                                                        </div>
                                                    </div>
                                                    <!-- /dragger -->
                                                    <div id="bp_car-private" class="car">
                                                        <img src="../wp-content/themes/carta/img/1a.png">
                                                    </div>
                                                    <div id="bp_car-business-mask">
                                                        <div id="bp_car-business" class="car">
                                                            <img src="../wp-content/themes/carta/img/2b.png">
                                                        </div>
                                                        <!-- /car-business -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /car-shared-leasing-slider-car -->

                                        </td>
                                    </tr>
                                    </tbody>


                                    <tbody>
                                    <tr>
                                        <td>Ydelse pr. mdr.</td>
                                        <td class="bp_number"><span>Erherv</span>kr. <b
                                                style="color:#203742; font-weight: bold;"
                                                id="bp_monthly-payment-business">4.874</b>,-
                                        </td>
                                        <td class="bp_number"><span>Privat	</span>kr. <b
                                                style="color:#203742; font-weight: bold;"
                                                id="bp_monthly-payment-private">1.523</b>,-
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Driftstillæg*</td>
                                        <td class="bp_number">kr. <b id="bp_work-allowance-business"
                                                                     style="color:#203742; font-weight: bold;">2.402</b>,-<span>Ekskl. moms</span>
                                        </td>
                                        <td class="bp_number">kr. <b id="bp_work-allowance-private"
                                                                     style="color:#203742; font-weight: bold;">751</b>,-<span>Inkl. moms</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1. ydelse</td>
                                        <td class="bp_number">kr. <b id="bp_first-payment-business"
                                                                     style="color:#203742; font-weight: bold;">56.000</b>,-
                                            <span>Ekskl. moms</span></td>
                                        <td class="bp_number">kr. <b
                                                id="bp_first-payment-private"
                                                style="color:#203742; font-weight: bold;">17.500</b>,-<span>Inkl. moms</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Besparelse</td>
                                        <td class="bp_number">kr. <b id="bp_savings-business"
                                                                     style="color:#203742; font-weight: bold;">99.353</b>,-
                                        </td>
                                        <td class="bp_number">kr. <b id="bp_savings-private"
                                                                     style="color:#203742; font-weight: bold;">91.191</b>,-
                                        </td>
                                    </tr>
                                    </tbody>

                                    <tbody>
                                    <tr class="bp_total-savings" style="color:#344A57; font-weight: bold;">
                                        <td colspan="2">Samlet besparelse i forhold til traditionel erhvervsleasing</td>
                                        <td class="bp_number"><br>kr. <b id="bp_relative-total-savings">160.169</b>,-
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Leasing periode</td>
                                        <td class="bp_number"><b id="bp_savings-private"></b></td>
                                        <td id="period" class="bp_number">36 mdr<b id="bp_savings-private"></b></td>
                                    </tr>
                                    <tr style="border-bottom:4px solid #77848c;">
                                        <td>Kørsel:</td>
                                        <td class="bp_number"><b id="bp_savings-private"></b></td>
                                        <td id="kørsel" class="bp_number">30.000 km/årligt<b id="bp_savings-private"></b></td>
                                    </tr>

                                    </tbody>

                                </table>
                                <p></p>
                            </div>
                            <div class="tabpage" id="tabpage_2">
                                <table style="text-align:right;">
                                    <thead>

                                    <h2 id="permonth" style="=text-align:center; padding-left:80px; padding-top:15px;">2.189
                                        kr./måned</h2>
                                    <span style=color:#E1E8F0;padding-left:150px;">ex. moms</span>


                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="bp_number">Ydelse</td>
                                        <td id="ydelse" class="custom-tds">kr. 46 000,-
                                            <span style="color:rgba(65, 31, 45, 0.32)">Ex. moms</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bp_number">Leasing periode i mdr.</td>
                                        <td id="period2" class="custom-tds">24
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bp_number">Årligt antal km</td>
                                        <td id="kørsel2" class="custom-tds">25 000km
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bp_number">Beskatningsgrundlag</td>
                                        <td id="beskat" class="custom-tds">Kr. 208 227 ,-
                                            <span style="color:rgba(65, 31, 45, 0.32)">(anslået)</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <div class="bottom-text">
                            <p>
                                Vi tager forbehold for indtastningsfejl, samt endelig
                                værdifastsættelse af registreringsafgift.
                                Endeligt tilbud er betinget af Carta Leasing
                                A/S´ kreditgodkendelse.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</body>
<script>




    function myFunctionGet(){





        url = "http://deleleasing.dk/biler/";

        window.open(url,'_self');
    }

</script>




<?php get_footer(); ?>
