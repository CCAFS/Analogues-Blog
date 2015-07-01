<?php

/* 
 * Copyright (C) 2015 CCAFS-CGIAR
 * Developed By: Javier Andrés Gallego B.
 * Designed by: Sebastián Amariles G.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<!DOCTYPE HTML>
<html>
<head>
      <?php wp_head(); ?>
     <title>Climate Analogues</title>
     <!-- METAS -->
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="" />
     <meta name="keywords" content="" />
     <meta name="author" content="" />
     <!-- /METAS -->
 
     <!-- CSS -->
     <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/vnd.microsoft.icon">
     <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
     <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" />
     <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url');  ?>" />
     <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
     <!-- /CSS -->
 
     <!-- JQuery and Plugins -->
     <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.min.js"></script>
     <!-- <script src="js/custom.js"></script>
     <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
     <script type="text/javascript" src="js/jquery.tinycarousel.min.js"></script>-->
     <!-- /JQuery and Plugins -->
 
     <!--[if IE]>
     <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
     <![endif]-->
</head>
<body <?php body_class();?> >
    <!-- WRAPPER -->
    <div id="wrapper" class="clearfix">
        <!-- HEADER -->
        <header id="header" class="clearfix">
            <div id="header-line"></div>
            <div class="row">
                <div id="title"><a href="<?php echo home_url();?>">Climate Analogues</a></div>
                <div id="logo">
                    <a href="http://ccafs.cgiar.org" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/logo_ccafs.png" width="250px"/></a>
                </div>
                <!-- NAV#TOP-MENU -->
                <nav id="header-menu" role="navigation" class="clearfix">
                    <!-- ul Menú -->
                    <div id="blog-menu">
                        <ul id="top-menu">
                            <li class="current-menu-item"><a href="<?php echo home_url();?>">Home</a></li>
                            <li>
                                <a href="<?php echo home_url();?>/tool/">Tool</a>
                                <ul id="submenu">
                                    <li><a href="<?php echo home_url();?>/tool/">Tool</a></li>
                                    <li><a href="<?php echo home_url();?>/r-package/">R Package</a></li>
                                    <li><a href="<?php echo home_url();?>/data/">Data</a></li>
                                    <li><a href="<?php echo home_url();?>/more-information/">Analogues Approach</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo home_url();?>/category/news">News</a></li>
                            <li><a href="<?php echo home_url();?>/category/whats-analogues">What´s Analogues?</a></li>
                        </ul>
                        <ul id="right-menu">
                            <li><a href="<?php bloginfo('rss2_url');  ?>" target="_blank">&nbsp; | <img src="<?php echo get_template_directory_uri();?>/img/rss.png" width="15px;"/>&nbsp;RSS</a></li>  
                            <li><a href="<?php echo home_url();?>/contact-us/">&nbsp; | Contact Us</a></li>
                            <li><a href="<?php echo home_url();?>/about-us/">About Us</a></li>

                        </ul>
                    </div>
                    <!-- final ul Menú-->
                </nav>
                <!-- FINAL NAV#TOP-MENU -->
            </div>
            <div id="menu-line"></div>
        </header>
        <!-- FINAL HEADER -->
