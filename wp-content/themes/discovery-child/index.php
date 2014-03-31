<?php get_header(); ?>

<div id="main">

    <?php
    if (option::get('featured_enable') == 'on' && is_home() && $paged < 2) {
        get_template_part('featured-posts', '');
    }
    ?>

    <?php if (option::get('home_teaser_show') == 'on' && is_home() && $paged < 2) { ?>

        <div id="welcome-message">
                <!-- h1><?php echo option::get('home_teaser_heading') ?></h1 -->
            <p><?php echo stripslashes(option::get('home_teaser_content')); ?></p>
        </div><!-- end #welcome-message -->        

    <?php } ?>

    <?php
    get_template_part('blocks-section');    
    ?>
    <div class="cleaner">&nbsp;</div>
    <div id="tag-list">
    <?php    
    the_widget("WP_Widget_Tag_Cloud", array('title' => 'Themes:'), null);    
    ?>
    </div>
    <div class="cleaner">&nbsp;</div>


    <?php get_footer(); ?>