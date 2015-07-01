<?php
/**
 * WPZOOM Global Theme Features
 */

class ui {
    /**
     * Shows favicon if it's set in theme options
     */
    public static function favicon() {
        if (strlen(option::get('misc_favicon')) > 1) {
            $favicon = option::get('misc_favicon');
            echo '<link rel="shortcut icon" href="' . $favicon . '" type="image/x-icon" />';
        }
    }

    /**
     * Includes analytics scripts if they are set in theme options
     */

     public static function header_code() {
        if (strlen(option::get('header_code')) >1 ) {
            echo stripslashes(option::get('header_code'));
        }
    }

    public static function analytics() {
        if (strlen(option::get('footer_code')) >1 ) {
            echo stripslashes(option::get('footer_code'));
        }
    }

    public static function logo() {
        if (option::get('misc_logo_path')) {
            return option::get('misc_logo_path');
        } else {
            //return get_template_directory_uri() . '/images/logo.png';
            return "";
        }
    }

    /**
     * Smart pages title
     */
    public static function title() {
        if (option::get('seo_enable') == 'off') {
            bloginfo('name');
            wp_title('-');
            return;
        }

        if (is_home()) {
            if (option::get('seo_home_title') == 'Site Title - Site Description') echo get_bloginfo('name').option::get('title_separator').get_bloginfo('description');
            if (option::get('seo_home_title') == 'Site Description - Site Title') echo get_bloginfo('description').option::get('title_separator').get_bloginfo('name');
            if (option::get('seo_home_title') == 'Site Title') echo get_bloginfo('name');
        }

        #if the title is being displayed on single posts/pages
        if (is_single() || is_page()) {
            if (option::get('seo_posts_title') == 'Site Title - Page Title') echo get_bloginfo('name').option::get('title_separator').wp_title('',false,'');
            if (option::get('seo_posts_title') == 'Page Title - Site Title') echo wp_title('',false,'').option::get('title_separator').get_bloginfo('name');
            if (option::get('seo_posts_title') == 'Page Title') echo wp_title('',false,'');
        }

        #if the title is being displayed on index pages (categories/archives/search results)
        if (is_category() || is_archive() || is_search()) {
            if (option::get('seo_pages_title') == 'Site Title - Page Title') echo get_bloginfo('name').option::get('title_separator').wp_title('',false,'');
            if (option::get('seo_pages_title') == 'Page Title - Site Title') echo wp_title('',false,'').option::get('title_separator').get_bloginfo('name');
            if (option::get('seo_pages_title') == 'Page Title') echo wp_title('',false,'');
        }
    }

    /**
     * Robots meta tag for SEO
     */
    public static function index() {
        global $post;
		global $wpdb;
		if(!empty($post)){
			$post_id = $post->ID;
		}

		/* Robots */
		$index = 'index';
		$follow = 'follow';

		if ( is_tag() && option::get('index_tag') != 'index') { $index = 'noindex'; }
		elseif ( is_search() && option::get('index_search') != 'index' ) { $index = 'noindex'; }
		elseif ( is_author() && option::get('index_author') != 'index') { $index = 'noindex'; }
		elseif ( is_date() && option::get('index_date') != 'index') { $index = 'noindex'; }
		elseif ( is_category() && option::get('index_category') != 'index' ) { $index = 'noindex'; }
		echo '<meta name="robots" content="'. $index .', '. $follow .'" />' . "\n";
    }

    /**
     * Keywords meta tag for SEO on posts
     */
    public static function metaPostKeywords() {
        $posttags = get_the_tags();
        $meta_post_keywords = '';
        if (!$posttags) {
            return;
        }
        foreach((array)$posttags as $tag) {
            $meta_post_keywords .= $tag->name . ',';
        }
        echo '<meta name="keywords" content="'.$meta_post_keywords.'" />' . "\n";
    }

    /**
     * Keywords meta tag for SEO on homepage
     */
    public static function metaHomeKeywords() {
        if (strlen(option::get('meta_key')) > 1 ) {
            echo '<meta name="keywords" content="'.option::get('meta_key').'" />' . "\n";
        }
    }

    /**
     * Canonical meta tag for SEO
     */
    public static function canonical() {
        if(option::get('canonical') == 'on') {

            #homepage urls
            if (is_home() )echo '<link rel="canonical" href="'.get_bloginfo('url').'" />';

            #single page urls
            global $wp_query;
            $postid = $wp_query->post->ID;

            if (is_single() || is_page()) echo '<link rel="canonical" href="'.get_permalink().'" />';


            #index page urls

            if (is_archive() || is_category() || is_search()) echo '<link rel="canonical" href="'.get_permalink().'" />';
        }
    }

    /**
     * Prepares TimThumb's crop location
     */

	public static function getCropLocation($location = 'c') {

		switch (strtolower($location)) {
			case"center (default)":
			default:
			$zone = 'c';
			break;

			case"align top":
			$zone = 't';
			break;

			case"align bottom":
			$zone = 'b';
			break;

			case"align left":
			$zone = 'l';
			break;

			case"align right":
			$zone = 'r';
			break;
		}

		return $zone;
	}

    /**
     * Returns the link to image
     */
    public static function getImage($width, $height, $location = 'c') {
        global $blog_id;

        $image = get_the_image(array(
            'format' => 'array'
        ));

       if ($image['url'] != '') {
            $image = $image['url'];

            $imageParts = explode('/files/', $image);

            $filehost = parse_url($image);
            $localhost = $_SERVER['HTTP_HOST'];

            if (isset($imageParts[1]) && ($filehost['host'] == $localhost)) {
                $image = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
            }

            $location = ui::getCropLocation($location);

			return get_template_directory_uri() . '/functions/theme/thumb.php?src=' . $image . '&amp;w=' . $width . '&amp;h=' . $height . '&amp;zc=1' . '&amp;a=' . $location;
        }

        return false;
    }

	public static function thumbIt($image, $width, $height, $return = false, $location = 'c') {
        if (!$image) {
            return false;
        }

		global $blog_id;

		$imageParts = explode('/files/', $image);

		$filehost = parse_url($image);
		$localhost = $_SERVER['HTTP_HOST'];

		if (isset($imageParts[1]) && ($filehost['host'] == $localhost)) {
			$image = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
		}

		$location = ui::getCropLocation($location);

 		$url = get_template_directory_uri() . '/functions/theme/thumb.php?src=' . $image . '&amp;w=' . $width . '&amp;h=' . $height . '&amp;zc=1' . '&amp;a=' . $location;

		if ($return) {
		    return $url;
		}

		echo $url;
    }

    /**
     * Return an array of categories
     * if $parent is true returns only top level categories
     *
     * @param boolean $parent
     * @return array
     */
    public static function getCategories($parent = false) {
        global $wpdb, $table_prefix;

        $tb1 = $table_prefix . "terms";
        $tb2 = $table_prefix . "term_taxonomy";

        $qqq = $parent ? "AND $tb2" . ".parent = 0" : "";

        $q = "SELECT $tb1.term_id,$tb1.name,$tb1.slug FROM $tb1,$tb2 WHERE $tb1.term_id = $tb2.term_id AND $tb2.taxonomy = 'category' $qqq ORDER BY $tb1.name ASC";
        $q = $wpdb->get_results($q);

        foreach ($q as $cat) {
            $categories[$cat->term_id] = $cat->name;
        }

        return $categories;
    }

    /**
     * Returns an array of pages
     *
     * @return array
     */
    public static function getPages() {
        global $wpdb, $table_prefix;

        $tb1 = $table_prefix . "posts";

        $q = "SELECT $tb1.ID,$tb1.post_title FROM $tb1 WHERE $tb1.post_type = 'page' AND $tb1.post_status = 'publish' ORDER BY $tb1.post_title ASC";
        $q = $wpdb->get_results($q);

        foreach ($q as $pag) {
            $pages[$pag->ID] = $pag->post_title;
        }

        return $pages;
    }

    /**
     * Trims $moreText to $maxChars
     *
     * @param int $maxChars
     * @param string $moreText
     * @param string $stripteaser
     * @param string $morefile
     * @return void
     */
    public static function theContentLimit($maxChars, $moreText = '(more ...)', $stripteaser, $moreFile = '') {
        $content = get_the_content($moreText, $stripteaser, $moreFile);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $content = strip_tags($content);

        if (strlen($_GET['p']) > 0 && $thisshouldnotapply) {
            echo $content;
        } elseif ((strlen($content) > $maxChars) && ($espacio = strpos($content, " ", $maxChars))) {
            $content = substr($content, 0, $espacio);
            $content = $content;
            echo $content;
            echo "...";
        } else {
            echo $content;
        }
    }

    /**
     * Handles SEO Options
     */
    public static function seo() {
        if (option::get('seo_enable') == 'on') {
            if ((is_single() || is_page()) && have_posts()) {
                while (have_posts()) {
                    the_post();
                    echo '<meta name="description" content="' . strip_tags(get_the_excerpt()) . '" />' . "\n";
                    ui::metaPostKeywords();
                }
            } elseif (is_home()) {
                echo '<meta name="description" content="' . ui::description() . '" />' . "\n";
                ui::metaHomeKeywords();
            }

            self::index();
        }
    }

    /**
     * Returns meta description if is specified in theme options, if not
     * return WordPress' one
     *
     * @return string
     */
    public static function description() {
        if (strlen(option::get('meta_desc')) < 1) {
            return get_bloginfo('description');
        } else {
            return option::get('meta_desc');
        }
    }

    /**
     * Includes rss link if is specified in theme options
     */
    public static function rss() {
        if (strlen(option::get('misc_feedburner')) < 1) {
            bloginfo('rss2_url');
        } else {
            echo option::get('misc_feedburner');
        }
    }

    /**
     * WPZOOM javascript includer
     *
     * Includes every single file specified as argument
     *
     * @params string
     * @return void
     */
    public static function js() {
        $args = func_get_args();

        foreach ($args as $name) {
            echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/js/' . $name . '.js"></script>' . "\n";
        }
    }

    /**
     * Include css file for specified style
     */
    public static function customStyleCss($style) {
        echo '<link href="'. get_template_directory_uri() . '/styles/' . $style . '.css" rel="stylesheet" type="text/css" />'."\n";
    }

	/**
     * Include shortcodes .css file
     */
	public static function shortcodesCss() {
        echo '<link href="'. get_template_directory_uri() . '/functions/wpzoom/assets/css/shortcodes.css" rel="stylesheet" type="text/css" />'."\n";
    }

    /**
     * Include theme custom.css
     */
    public static function customCss() {
        echo '<link href="'. get_template_directory_uri() . '/custom.css" rel="stylesheet" type="text/css" />'."\n";
    }

    /**
     * Generate custom css from options
     */
    public static function optionsCss() {
    	$css = '';
		$enable = false;
    	foreach (option::$evoOptions as $Eoption) {
			foreach ($Eoption as $option) {
				if ((isset($option['type']) && $option['type'] === 'color') || isset($option['css'])) {
                    $value = option::get($option['id']);
                    if (!trim($value) != "") continue;
                    $enable = true;

                    if (in_array($option['attr'], array('height', 'width')) &&
                        strpos($value, 'px') === false) {
                        $value = $value . 'px';
					}

                    $css .= "{$option['selector']}{{$option['attr']}:$value;}\n";
				}
			}
    	}

    	if ($enable) {
    		echo '<style type="text/css">';
    		echo $css;
    		echo "</style>\n";
    	}
    }

    /**
     * WPZOOM public head
     */
    public static function head() {

        if (is_singular()) {
            wp_enqueue_script('comment-reply');
        }

        /**
         * Enqueue initialization script, HTML5 Shim included
         */
        wp_enqueue_script('wpzoom-init',  get_template_directory_uri() . '/js/init.js');

        /**
         * Enqueue all theme scripts specified in config file to the footer
         */
        foreach (wpzoom::$config['scripts'] as $script) {
            wp_enqueue_script($script,  get_template_directory_uri() . '/js/' . $script . '.js', array(), false, true);
        }

        /**
         * Add Framework Meta Generator Tags
         */
        if (option::get("meta_generator") === "on") {
            wpzoom::metaGenerator();
        }

        /**
         * Use SEO options only on public blogs
         */
        if (get_option('blog_public') != 0) {
            self::seo();
            self::canonical();
        }

        /**
         * If current theme supports styles use them
         */
        if (wpzoom::$config['styled']) {
            self::customStyleCss(str_replace(" ", "-", strtolower(option::get('theme_style'))));
        }

        self::shortcodesCss();
        self::customCss();
        self::optionsCss();

        self::favicon();

        self::header_code();

        /**
         * Execute WordPress head hook
         */
        wp_head();
    }

    /**
     * WPZOOM public footer
     */
    public static function footer() {
        self::analytics();

        /**
         * Execute WordPress footer hook
         */
        wp_footer();
    }

}