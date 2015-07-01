<?php
wp_reset_query();
$m = 0;
$thumbSize = option::get('loop_thumb_size');
?>

<?php if (have_posts()) { ?>
    <ul class="posts-list">

        <?php
        while (have_posts()) : the_post();
            unset($prev, $image, $cropLocation);
            $m++;
            ?>

            <?php
            $cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
            $image = ui::getImage('140', '120', $cropLocation);
            ?>
            <li class="secondary" id="post-<?php the_ID(); ?>">
                <article>
                    <?php
                    if ($thumbSize == 'Small') {
                        if ($image) {
                            ?>
                            <div class="cover">
                                <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                                } else {
                                    ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/img/logo_ccafs.png" alt="<?php the_title(); ?>" />
                            <?php } ?>
                                <!--<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $image; ?>" alt="<?php the_title_attribute(); ?>" /></a>-->
                            </div><!-- end .cover -->
                        <?php } ?>

                        <div class="post-excerpt">
                            <p class="postmetadata"><?php if (option::get('display_date') == 'on') { ?><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_time("j F Y"); ?></time><?php } ?>
                                <?php if (option::get('display_category') == 'on') { ?><span class="category"><?php the_category(', '); ?></span><?php } ?>
                            </p>
                            <h1 class="title title-xsmall"><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'wpzoom'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
							<h5><?php echo get_post_meta($post->ID, 'pmf__BlogTypes', true);?></h5>
                            <?php echo substr(get_the_excerpt(), 0, strpos(get_the_excerpt(), ' ', 290)); ?>... <span class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></span>
                        </div><!-- end .post-excerpt -->
                    <?php } ?>

                </article>                
            </li><!-- end .secondary #post-<?php the_ID(); ?>-->
            <div class="cleaner">&nbsp;</div>
            <div class="divider">&nbsp;</div>

        <?php endwhile; ?>

    </ul><!-- end .posts-list-->
<?php } else { ?>

    <div class="post-content">

        <?php if (is_404()) { ?>
            <h1 class="title title-large"><?php _e('404 Error (page not found)', 'wpzoom'); ?></h1>
            <p><?php _e('Apologies, but the requested page cannot be found. Perhaps searching will help find a related post.', 'wpzoom'); ?></p>
        <?php } else { ?>
            <p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'wpzoom'); ?></p>
        <?php } ?>
        <?php get_search_form(); ?>
        <h2 class="title title-small"><?php _e('Browse Categories', 'wpzoom'); ?></h1>
            <ul>
                <?php wp_list_categories('title_li=&hierarchical=0&show_count=1'); ?>	
            </ul>

            <h2 class="title title-medium"><?php _e('Monthly Archives', 'wpzoom'); ?></h1>
                <ul>
                    <?php wp_get_archives('type=monthly&show_post_count=1'); ?>	
                </ul>

                </div><!-- end .post-content -->

            <?php } ?>

            <?php get_template_part('pagination'); ?>

            <?php wp_reset_query(); ?>