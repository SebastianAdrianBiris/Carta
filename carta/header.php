<?php
    if(is_user_logged_in() && is_page('570')) {
        wp_redirect('/beregner');
        exit;
    }
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php echo the_title(); ?></title>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
        <!-- wordpress header -->
        <?php wp_head(); ?>
        <!-- /wordpress header -->

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
        <?php // Google Analytics ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="page">
            <header>
                <div id="topmenu" class="menu">
                    <div class="container">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'top_menu_area',
                                'container' => ''
                            ));
                        ?>
                    </div>
                </div>
                <div id="mainmenu" class="menu">
                    <div class="container">
                        <div id="logo">
                            <a href="/">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Carta">
                            </a>
                        </div>
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'main_menu_area',
                                'container' => ''
                            ));
                        ?>
                    </div>
                </div>
                <?php
                    if(get_field('slides')) {
                        echo '<div id="banner">';
                        $count = 0;
                        $numOfSlides = count(get_field('slides'));
                        if($numOfSlides > 1) {
                            echo '<ol id="banner-nav">';
                            for($i = 0; $i < $numOfSlides; $i++) {
                                echo '<li class="banner-nav banner-nav-'.$i.'" data-slide-no="'.$i.'"><a></a></li>';
                            }
                            echo '</ol>';
                        }
                        foreach(get_field('slides') as $slide) {
                            if($count == 0) $active = " active"; else $active = "";
                            echo '<div class="slide" id="slide-'.$count.'">';
                                echo '<div class="container">';
                                    echo '<div class="textbox '.$slide['textbox_position'].'">';
                                        echo '<p>';
                                        echo $slide['bigtext'];
                                        if($slide['smalltext'] ) {
                                            echo '<span>'.$slide['smalltext'].'</span>';
                                        }
                                        echo '</p>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<img src="'.$slide['image'][sizes][large].'">';
                            echo '</div>';
                            $count++;
                        }

                        echo '</div><!-- /banner -->';
                    }
                ?>

            </header>
            <div id="content">
                <div id="headline">
                    <div class="triangle"></div>
                    <div class="container">
                        <h1><?php echo get_the_title(); ?></h1>
                    </div>
                </div>
