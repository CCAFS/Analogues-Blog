<div id="special-blocks">
    <?php
    $categoriesIds = array(
        9, //News
        10, //Workshops
        11 //Farms of the future
    );
    $postsPerPage = 10;
    for ($i = 0; $i < sizeof($categoriesIds); $i++) {
        $catquery = new WP_Query("cat=" . $categoriesIds[$i] . "&posts_per_page=" . $postsPerPage);
        $category = get_the_category_by_ID($categoriesIds[$i]);
        ?>
        <div class="column">
            <h1><a href="<?php echo get_category_link($categoriesIds[$i]);?>"><?php echo $category; ?></a></h1>
            <?php
            $isFirst = true;
            while ($catquery->have_posts()) : $catquery->the_post();
                if ($isFirst) {
                    $isFirst = false;
                    ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                    <?php
                    // Getting image.
                    $cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
                    $image = ui::getImage('250', '140', $cropLocation);
                    ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $image; ?>" alt="<?php the_title_attribute(); ?>" width="250" height="140" /></a>
                    <p><?php echo substr(get_the_excerpt(), 0, strpos(get_the_excerpt(), ' ', 290)); ?>... <span class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></span></p>
                    <h3 class="others">More in this category<?php //echo $category;   ?></h3>
                    <ul id="post-list">
                        <?php
                    } else {
                        ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                    }
                    ?>
                    <?php
                // end block content
                endwhile;
                ?>
            </ul>
        </div> <!-- end column -->
        <?php
    }
    ?>
    
</div><!-- end #special-blocks -->