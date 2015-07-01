<?php
/*
 * Copyright (C) 2015 JGALLEGO
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
get_header();
?>
<section class="section-gray">
    <div class="row">
        <div id="page">

            <div class="breadcrumbs">
                <p><?php ?></p>
            </div><!-- end .breadcrumbs -->

            <?php
            while (have_posts()) : the_post();
                // get crop location from post meta

                /* if ($featured_image == 'Full Width') {
                  $image = ui::getImage('940', '300', $cropLocation);
                  } elseif ($featured_image == 'Before Title (two thirds)') {
                  $image = ui::getImage('650', '250', $cropLocation);
                  } */
                ?>

                <h1 class="page-title"><?php the_title(); ?></h1>

                <div class="page-content">
                    <?php the_content(); ?>
                </div><!-- end .page-content -->

            <?php endwhile; ?>

            <div class="cleaner">&nbsp;</div>
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
        </div><!-- end #content -->
    </div>
</section>

<?php get_footer(); ?>
