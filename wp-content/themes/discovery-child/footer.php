			

<div id="prefooter"<?php
if (!is_home()) {
    echo' class="prefooter-inside"';
}
?>>

    <div class="column">
        <a href='http://ciat.cgiar.org' target='_blank'>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 1')) : ?> <?php endif; ?></a>
        <div class="cleaner">&nbsp;</div>
    </div><!-- end .column -->

    <div class="column">
           <a href='http://www.see.leeds.ac.uk/research/icas/climate-impacts-group/' target='_blank'>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 2')) : ?> <?php endif; ?></a>
        <div class="cleaner">&nbsp;</div>
    </div><!-- end .column -->

    <div class="column">
        <a href='http://www.walker-institute.ac.uk/' target='_blank'>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 3')) : ?> <?php endif; ?></a>
        <div class="cleaner">&nbsp;</div>
    </div><!-- end .column -->

    <div class="column column-last">
        <a href='http://www.futureearth.info/' target='_blank'>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 4')) : ?> <?php endif; ?></a>
        <div class="cleaner">&nbsp;</div>
    </div><!-- end .column -->

    <div class="cleaner">&nbsp;</div>

</div><!-- end #prefooter -->                        
<div class="cleaner">&nbsp;</div>

</div><!-- end #main -->

</div><!-- end .wrapper .wrapper-main -->

<footer>

    <div class="wrapper">			
        <p class="copyright"><?php _e('Copyright', 'wpzoom'); ?> &copy; <?php echo date("Y", time()); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'wpzoom'); ?>
        <div class="cleaner">&nbsp;</div>
    </div><!-- end .wrapper -->

</footer>

</div><!-- end #container -->

<?php ui::footer(); ?>
</body>
</html>