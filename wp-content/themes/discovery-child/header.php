<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

            <title><?php ui::title(); ?></title>

            <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

            <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php ui::rss(); ?>" />
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

            <?php ui::head(); ?>
    </head>
    <body <?php body_class() ?>>

        <div id="container">

            <div class="wrapper wrapper-main">

                <header>

                    <div id="logo">
                        <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">
                            <?php echo bloginfo('name'); ?>
                        </a>
                    </div><!-- end #logo -->
                    <div id="header-right">

                        <?php if (option::get('menu_top_secondary_show') == 'on') { ?>

                            <nav id="top-menu">

                                <?php
                                if (option::get('social_icons_show') == 'on') {

                                    $menuSocial = '';
                                    if (strlen(option::get('misc_feedburner')) < 1) {
                                        $rssurl = get_bloginfo('rss2_url');
                                    } else {
                                        $rssurl = option::get('misc_feedburner');
                                    }

                                    $menuSocial = '<li class="social-icons">';
                                    if (option::get('social_icons_facebook')) {
                                        $menuSocial .= '<a href="' . option::get('social_icons_facebook') . '" rel="external,nofollow"><img src="' . get_bloginfo('template_url') . '/images/icons/facebook_small.png" width="16" height="16" alt="" /></a>';
                                    }
                                    if (option::get('social_icons_twitter')) {
                                        $menuSocial .= '<a href="' . option::get('social_icons_twitter') . '" rel="external,nofollow"><img src="' . get_bloginfo('template_url') . '/images/icons/twitter_small.png" width="16" height="16" alt="" /></a>';
                                    }
                                    $menuSocial .= '<a href="' . $rssurl . '" rel="external,nofollow"><img src="' . get_bloginfo('template_url') . '/images/icons/rss_small.png" width="16" height="16" alt="" /></a>';
                                    $menuSocial .= '</li>';
                                }
                                ?>

                                <?php
                                if (has_nav_menu('secondary')) {
                                    $menu = wp_nav_menu(array('container' => '', 'container_class' => '', 'menu_class' => '', 'menu_id' => '', 'sort_column' => 'menu_order', 'echo' => false, 'depth' => '1', 'theme_location' => 'secondary', 'items_wrap' => '<ul>%3$s' . $menuSocial . '</ul>'));
                                    print($menu);
                                } else {
                                    echo '<p class="wpzoom-notice">Please set your Secondary Menu on the <a href="' . get_admin_url() . 'nav-menus.php">Appearance > Menus</a> page. For more information please <a href="http://www.wpzoom.com/documentation/discovery/">read the documentation</a>.</p>';
                                }
                                ?>

                                <div class="cleaner">&nbsp;</div>

                            </nav><!-- end #top-menu -->
                            <div id="secondary-logo">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo_ccafs.png" />
                            </div>

                        <?php } ?>
                    </div> <!-- End #header-right -->

                    <?php if (option::get('tel_enable') == 'on') { ?>
                        <span class="top-info"><?php print(option::get('tel_text')); ?></span>
                    <?php } // if show header text  ?>

                    <div class="cleaner">&nbsp;</div>
                    <!-- div class="divider">&nbsp;</div -->

                    <?php if (option::get('menu_top_show') == 'on') { ?>

                        <nav id="main-menu">

                            <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(array('container' => '', 'container_class' => '', 'menu_class' => 'dropdown', 'menu_id' => '', 'sort_column' => 'menu_order', 'theme_location' => 'primary', 'items_wrap' => '<ul class="dropdown">%3$s<li class="cleaner">&nbsp;</li></ul>'));
                            } else {
                                echo '<p class="wpzoom-notice">Please set your Main Menu on the <a href="' . get_admin_url() . 'nav-menus.php">Appearance > Menus</a> page. For more information please <a href="http://www.wpzoom.com/documentation/discovery/">read the documentation</a>.</p>';
                            }
                            ?>

                        </nav><!-- end #main-menu -->

                    <?php } ?>

                    <div class="cleaner">&nbsp;</div>

                </header>
