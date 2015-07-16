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

<?php get_header(); ?>


<!-- #MAIN -->
<!--<div id="main" class="clearfix">-->
<!-- Welcome Section-->
<section class="section-gray">
    <div class="row">
        <div id="welcome-section">
            <div id="welcome-multimedia">
                <iframe width="430" height="250" src="https://www.youtube.com/embed/f9C1RpV6ta0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div id="welcome-text">
                <div id="welcome-text-title">
                    Welcome to Climate Analogues
                </div>
                <div id="welcome-text-content-excerpt">
                    Climate Analogues is used to identify areas that experience statistically similar climatic conditions, 
                    but which may be separated temporally and/or spatially. In essence, the approach allows you to glimpse 
                    into the future by locating areas whose climate today is similar to the projected future climate of a 
                    place of interest (i.e. where can we find today the future climate of Nairobi, Kenya?), or vice-versa.
                </div>
                <div class="readmore"><a href="#">Read More</a></div>
            </div>
        </div>
    </div>
</section>
<!-- End Welcome Section-->
<!-- Introduction Section-->
<section class="section-white">
    <div class="row">
        <div id="intro-section">
            <div class="section-title">What&apos;s Analogues?</div>
            <div id="intro-blocks">
                <div id="intro-blocks-1">
                    <div id="intro-blocks-title">Why Analogues?</div>
                    <div id="intro-blocks-content">
                        Climate Analogues is used to identify areas that experience statistically similar climatic conditions, 
                    but which may be separated temporally and/or spatially. In essence, the approach allows you to glimpse 
                    into the future by locating areas whose climate today is similar to the projected .....
                    </div>
                    <div class="readmore"><a href="#">Read More</a></div>
                </div>
                <div id="intro-blocks-2">
                    <div id="intro-blocks-title">Who&apos;s using it?</div>
                    <div id="intro-blocks-content">
                        Climate Analogues is used to identify areas that experience statistically similar climatic conditions, 
                    but which may be separated temporally and/or spatially. In essence, the approach allows you to glimpse 
                    into the future by locating areas whose climate today is similar to the projected ....
                    </div>
                    <div class="readmore"><a href="#">Read More</a></div>
                </div>
                <div id="intro-blocks-3">
                    <div id="intro-blocks-title">What has been made?</div>
                    <div id="intro-blocks-content">
                        Climate Analogues is used to identify areas that experience statistically similar climatic conditions, 
                    but which may be separated temporally and/or spatially. In essence, the approach allows you to glimpse 
                    into the future by locating areas whose climate today is similar to the projected ....
                    place of interest.
                    </div>
                    <div class="readmore"><a href="#">Read More</a></div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End Introduction Section-->
<!-- News Section-->
<section class="section-gray">
    <div class="row">
        <div id="news-section">
            <div class="section-title">News</div>
            <?php get_template_part('consult', 'news'); ?>
            <!--<div class="news">
                <div class="newsmedia">
                    <a href="#"><img src="#"/></a>
                </div>
                <div class="news-content">
                    <div class="newstitle">
                        Reaching the private sector with tools and resources for climate-smart agriculture in East Africa
                    </div>
                    <div class="type-post">Video</div>
                    <div class="news-excerpt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
                        consequat.
                    </div>
                    <div class="readmore"><a href="#">Read More</a></div>
                </div>
            </div>
            <div class="news">
                <div class="newsmedia">
                    <a href="#"><img src="#"/></a>
                </div>
                <div class="news-content">
                    <div class="newstitle">
                        A glimpse into past, present and future climates.
                    </div>
                    <div class="type-post">Video</div>
                    <div id="news-excerpt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
                        consequat. 
                    </div>
                    <div class="readmore"><a href="#">Read More</a></div>
                </div>
            </div>
            <div class="news">
                <div class="newsmedia">
                    <a href="#"><img src="#"/></a>
                </div>
                <div class="news-content">
                    <div class="newstitle">
                        How will your forest grow? Climate Analogues provides clues for pine plantation adaptation
                    </div>
                    <div class="type-post">Video</div>
                    <div id="news-excerpt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
                        consequat.
                    </div>
                    <div class="readmore"><a href="#">Read More</a></div>
                </div>
            </div>-->
            <div id="loadmore"><a href="#">See More News</a></div>
        </div>
    </div>
</section>
<!-- End News Section-->

<!--</div>-->
<!-- FINAL #MAIN -->


<?php get_footer(); ?>