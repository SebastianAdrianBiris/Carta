<?php
/*
*	Bar Type 1: Lang tekst
**/
function barType1($bar)
{
    echo '<div class="bar bar-type-1 colortheme-' . $bar['colortheme'] . '" data-colortheme="' . $bar['colortheme'] . '">';
    echo '<div class="triangle"></div>';
    echo '<div class="container">';
    foreach ($bar['sections'] as $section) {
        echo '<div class="section no-of-columns-' . $section['columns'] . '">';
        echo '<div class="title">';
        echo '<h2>' . $section['title'] . '</h2>';
        if ($section['withimage'] == 1) {
            echo '<div class="image">';
            echo '<img src="' . $section['image'][sizes][large] . '">';
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="text">';
        echo '<div class="column column-1">' . $section['column1'] . '</div>';
        if ($section['column2'] !== "") {
            echo '<div class="column column-2">' . $section['column2'] . '</div>';
        }
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}

/*
*	Bar Type 2: Billede
**/
function barType2($bar)
{
    echo '<div class="bar bar-type-2" data-colortheme="' . $bar['colortheme'] . '">';
    echo '<div class="container">';
    echo '<div class="textbox ' . $bar['textbox_position'] . '">';
    echo '<p>';
    echo $bar['bigtext'];
    if ($bar['smalltext']) {
        echo '<span>' . $bar['smalltext'] . '</span>';
    }
    echo '</p>';
    echo '</div>';
    echo '</div>';
    echo '<div class="image-cropper">';
    echo '<div class="image-cropper-bar image-cropper-left-bar"></div>';
    echo '<div class="image-cropper-triangle image-cropper-left-triangle"></div>';
    echo '<div class="image-cropper-triangle image-cropper-right-triangle"></div>';
    echo '<div class="image-cropper-bar image-cropper-right-bar"></div>';
    echo '</div>';
    echo '<img src="' . $bar[image][sizes][large] . '">';
    echo '</div>';
}


    /*
     *	Bar Type 3: Tre indgange
    **/
    function barType3($bar)
    {
        echo '<div class="bar bar-type-3 colortheme-' . $bar['colortheme'] . '" data-colortheme="' . $bar['colortheme'] . '"><div class="triangle"></div>';
        echo '<div class="container">';
        echo '<div class="entries">';
        foreach ($bar[entries] as $entry) {
            echo '<div class="entry">';
            echo '<div class="icon">';
            echo '<img src="' . $entry[icon][sizes][large] . '">';
            echo '</div>';
            echo '<h3>' . $entry[title] . '</h3>';
            echo '<p>' . $entry[text] . '</p>';
            $count = 1;
            foreach ($entry['read_more_links'] as $readMoreLink) {
                /*if($count == 2) {
                    echo " | ";
                }*/
                echo '<a href="' . $readMoreLink['link'] . '">' . $readMoreLink['text'] . '</a>';

                $count++;
            }
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    /*
     *	Bar Type 4: Centreret tekst
    **/
    function barType4($bar)
    {
        echo '<div class="bar bar-type-4 colortheme-' . $bar['colortheme'] . ' backgroundtype-' . $bar['backgroundtype'] . '" data-colortheme="' . $bar['colortheme'] . '">';
        echo '<div class="text">';
        echo '<div class="container">';
        echo '<div class="text-inner">' . $bar['text'] . '</div>';
        echo '</div>';
        echo '</div>';

        if ($bar['backgroundtype'] == "image") {
            echo '<div class="image-container"><img src="' . $bar['image'][sizes][large] . '"></div>';
            echo '<div class="image-cropper">';
            echo '<div class="image-cropper-bar image-cropper-left-bar"></div>';
            echo '<div class="image-cropper-triangle image-cropper-left-triangle"></div>';
            echo '<div class="image-cropper-triangle image-cropper-right-triangle"></div>';
            echo '<div class="image-cropper-bar image-cropper-right-bar"></div>';
            echo '</div>';
        } else {
            echo '<div class="triangle"></div>';
        }
        echo '</div>';
    }

    /*
    *	Bar Type 5: Bil
    **/
    function barType5($bar)
    {
        echo '<div class="bar bar-type-5 colortheme-' . $bar['colortheme'] . '" data-colortheme="' . $bar['colortheme'] . '">';
        echo '<div class="triangle"></div>';
        echo '<div class="container">';
        echo '<h2>' . $bar['bigtext'] . '<span>' . $bar['smalltext'] . '</span></h2>';
        echo '
                <div id="car-shared-leasing">
                    <div id="car-shared-leasing-calculator">
                        <div id="percentages">
                            <div id="percentage-business"><b></b><br>Erhverv</div>
                            <div id="percentage-private"><b></b><br>Privat</div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2" class="number">Erhverv</th>
                                    <th class="number">Privat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ydelse pr. mdr.</td>
                                    <td class="number">kr. <b id="monthly-payment-business"></b>,- <span>Ekskl. moms</span></td>
                                    <td class="number">kr. <b id="monthly-payment-private"></b>,-<span>Inkl. moms</span></td>
                                </tr>
                                <tr>
                                    <td>Driftstillæg*</td>
                                    <td class="number">kr. <b id="work-allowance-business"></b>,-<span>Ekskl. moms</span></td>
                                    <td class="number">kr. <b id="work-allowance-private"></b>,-<span>Inkl. moms</span></td>
                                </tr>
                                <tr>
                                    <td>1. ydelse</td>
                                    <td class="number">kr. <b id="first-payment-business"></b>,- <span>Ekskl. moms</span></td>
                                    <td class="number">kr. <b id="first-payment-private"></b>,-<span>Inkl. moms</span></td>
                                </tr>
                                <tr>
                                    <td>Besparelse</td>
                                    <td class="number">kr. <b id="savings-business"></b>,-</td>
                                    <td class="number">kr. <b id="savings-private"></b>,-</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="total-savings">
                                    <td colspan="2">Samlet besparelse i forhold til traditionel erhvervsleasing</td>
                                    <td class="number"><br>kr. <b id="relative-total-savings"></b>,-</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="disclaimer">Leasing periode 36 mdr.<br>Kørsel: 30.000 km/årligt<br>* Brændstof, Grøn Ejerafgift, Forsikring, Service, Reparation mv.</div>
                    </div>
                    <div id="car-shared-leasing-slider">
                        <div id="car-shared-leasing-slider-car">
                            <div id="dragger">
                                <div id="dragger-arrow">
                                    <div id="dragger-label">Træk her<span></span></div>
                                </div>
                            </div><!-- /dragger -->
                            <div id="car-private" class="car">
                                <img src="' . get_template_directory_uri() . '/img/carSharedLeasingPrivate.jpg">
                            </div><!-- /car-private -->
                            <div id="car-business-mask">
                                <div id="car-business" class="car">
                                    <img src="' . get_template_directory_uri() . '/img/carSharedLeasingBusiness.jpg">
                                </div><!-- /car-business -->
                            </div><!-- /car-business-mask -->
                        </div><!-- /car-shared-leasing-slider-car -->
                        <div id="car-shared-leasing-slider-description"><strong>Eksempel</strong><br >Audi A4 Business 2,0 TDI 190 HK Multi Tronic S-line, Business og Komfortpakke.<br> Beskatningsgrundlag kr. 475.707,-</div><!-- /car-shared-leasing-slider-description -->
                    </div><!-- /car-shared-leasing-slider -->
                </div><!-- /car-shared-leasing -->
            ';
        echo '</div><!-- /container -->';
        echo '</div><!-- /bar-type-5 -->';
    }
?>
