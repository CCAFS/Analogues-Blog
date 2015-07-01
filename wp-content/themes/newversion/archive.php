<?php get_header(); ?>
<section class="section-gray">
    <div class="row">
        <div id="page">
            <div id="main"> 

                <div class="breadcrumbs">
                    <p><?php wpzoom_breadcrumbs(); ?></p>
                </div><!-- end .breadcrumbs -->

                <div id="content">

                    <h1 class="title title-large">
                        <?php /* category archive */ if (is_category()) {
                            single_cat_title();
                            ?>
                            <?php /* tag archive */
                        } elseif (is_tag()) {
                            ?><?php _e('Post Tagged with:', 'wpzoom'); ?> "<?php single_tag_title(); ?>"
                            <?php /* daily archive */
                        } elseif (is_day()) {
                            ?><?php _e('Archive for', 'wpzoom'); ?> <?php the_time('F jS, Y'); ?>
                            <?php /* search archive */
                        } elseif (is_month()) {
                            ?><?php _e('Archive for', 'wpzoom'); ?> <?php the_time('F, Y'); ?>
                            <?php /* yearly archive */
                        } elseif (is_year()) {
                            ?><?php _e('Archive for', 'wpzoom'); ?> <?php the_time('Y'); ?>
                        <?php /* author archive */
                    } elseif (is_author()) {
                        ?><?php printf(__('Articles by:  %s', 'wpzoom'), get_the_author()); ?>  
                            <?php /* paged archive */
                        }
                        ?>
                    </h1>

                    <?php if (is_category() && category_description()) { ?>
                        <div class="archive-description">
    <?php echo category_description(); ?>
                        </div><!-- end .archive-description -->
<?php } // if is category and there is a description   ?>

                    <div class="divider">&nbsp;</div>

                    <?php get_template_part('loop', ''); ?>

                    <div class="cleaner">&nbsp;</div>
                </div><!-- end #content -->

                <aside>

<?php get_sidebar(); ?>

                    <div class="cleaner">&nbsp;</div>
                </aside>

                <div class="cleaner">&nbsp;</div>
                <div class="cleaner">&nbsp;</div>
            </div><!-- end #content -->
        </div>
</section>

<?php get_footer(); ?>