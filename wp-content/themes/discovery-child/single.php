<?php get_header(); ?>
<?php
$template = get_post_meta($post->ID, 'wpzoom_post_template', true);
$featured_image = get_post_meta($post->ID, 'wpzoom_featured_show', true);
$show_gallery = get_post_meta($post->ID, 'wpzoom_gallery_show', true);
?>

<div id="main">   
    <div class="breadcrumbs">
        <p><?php wpzoom_breadcrumbs(); ?></p>
    </div><!-- end .breadcrumbs -->

    <?php while (have_posts()) : the_post(); ?>

        <?php
        $cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
        ?>     

        <div id="content" class="single-post">            
            <div id="post-metadata">
                <span class="author">
                    By <?php the_author_posts_link(); ?>
                </span>                
                <span class="datetime">
                    <time datetime="<?php the_time("Y-m-d"); ?>" pubdate>/ <?php the_time("F j, Y"); ?></time>                            
                </span>               
                <span class="edit"><?php edit_post_link(__('Edit post', 'wpzoom'), ' / ', ''); ?></span>
                <br>
                <div class="secondary post-meta">
                    <div class="column column-last">
                        <?php                        
                            the_tags('<p><strong>' . __('Tags', 'wpzoom') . ':</strong> ', ', ', '</p>');                        
                        ?>
                        <div class="cleaner">&nbsp;</div>
                    </div><!-- end .column .column-last -->

                    <div class="cleaner">&nbsp;</div>

                </div><!-- end .secondary .post-meta -->
            </div>

            <h1 class="title title-large"><?php the_title(); ?></h1>
            <div class="post-content">
                <?php the_content(); ?>
                <div class="cleaner">&nbsp;</div>
    <?php wp_link_pages(array('before' => '<p><strong>' . __('Pages', 'wpzoom') . ':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            </div><!-- end .post-content -->
            <div class="post-actions">
                <div class="column">
                    <?php
                    if (option::get('post_related') == 'on') {
                        get_template_part('related-posts');
                    }
                    ?>
                    <div class="cleaner">&nbsp;</div>
                </div><!-- end .column -->

                <div class="cleaner">&nbsp;</div>
            </div><!-- end .column -->
            <div class="cleaner">&nbsp;</div>

        </div><!-- end .post-actions -->
        <aside>

    <?php get_sidebar(); ?>

            <div class="cleaner">&nbsp;</div>
        </aside>
    <?php if (option::get('post_comments') == 'on') { ?>
            <div class="divider">&nbsp;</div>

            <div id="comments">
        <?php comments_template(); ?>  
            </div>

    <?php } ?>

        <div class="cleaner">&nbsp;</div>
    </div><!-- end #content -->

<?php endwhile; ?>  




<div class="cleaner">&nbsp;</div>

<?php get_footer(); ?>