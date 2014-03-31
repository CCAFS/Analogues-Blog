<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

            <title><?php ui::title(); ?></title>

            <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
            <style>
                #header-right {
                    margin-top: 18px;
                }
            </style>
            <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php ui::rss(); ?>" />
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

            <?php ui::head(); ?>

    </head>
    <body <?php body_class() ?>>

        <div id="container">

            <div class="wrapper wrapper-main">

                <header>

                    <div id="logo">
                        <a href="" title="<?php bloginfo('description'); ?>">
                            <?php echo ui::logo(); ?>
                        </a>
                    </div><!-- end #logo -->
                    <div id="header-right">

                        <div class="cleaner">&nbsp;</div>

                        </nav><!-- end #top-menu -->
                        <div id="secondary-logo">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo_ccafs.png" />
                        </div>

                    </div> <!-- End #header-right -->

                    <div class="cleaner">&nbsp;</div>


                </header>
