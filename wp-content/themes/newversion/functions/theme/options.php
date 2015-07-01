<?php return array(

/* Theme Admin Menu */
"menu" => array(
    array("id"    => "1",
          "name"  => "General"),
    
    array("id"    => "2",
          "name"  => "Homepage"),
          
  	array("id"    => "5",
          "name"  => "Styling"),

	array("id"    => "7",
          "name"  => "Banners"),
),

/* Theme Admin Options */
"id1" => array(
    array("type"  => "preheader",
          "name"  => "Theme Settings"),

	 array("name"  => "Logo Image",
          "desc"  => "Upload a custom logo image for your site, or you can specify an image URL directly.",
          "id"    => "misc_logo_path",
          "std"   => "",
          "type"  => "upload"),

    array("name"  => "Favicon URL",
          "desc"  => "Upload a favicon image (16&times;16px).",
          "id"    => "misc_favicon",
          "std"   => "",
          "type"  => "upload"),
          
    array("name"  => "Custom Feed URL",
          "desc"  => "Example: <strong>http://feeds.feedburner.com/wpzoom</strong>",
          "id"    => "misc_feedburner",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Display Header Text",
          "desc"  => "Leave this checked if you want to display the special text in header (demo: telephone number).",
          "id"    => "tel_enable",
          "std"   => "on",
          "type"  => "checkbox"), 
 
    array("name"  => "Header Text",
          "desc"  => "Example: Call today: 0800-123-456",
          "id"    => "tel_text",
          "std"   => "Edit this in WPZOOM Theme Options",
          "type"  => "text"),

    array("name"  => "Display Social Icons in Secondary Menu",
          "desc"  => "Leave this checked if you want to display the social icons in the secondary menu in the header.",
          "id"    => "social_icons_show",
          "std"   => "on",
          "type"  => "checkbox"), 
 
    array("name"  => "Facebook URL",
          "desc"  => "Example: <strong>http://www.facebook.com/wpzoom</strong>",
          "id"    => "social_icons_facebook",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Twitter URL",
          "desc"  => "Example: <strong>http://twitter.com/wpzoom</strong>",
          "id"    => "social_icons_twitter",
          "std"   => "",
          "type"  => "text"),

 	array("type"  => "preheader",
          "name"  => "Global Menu Options"),

    array("name"  => "Show main menu",
          "id"    => "menu_top_show",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show secondary menu",
          "id"    => "menu_top_secondary_show",
          "std"   => "on",
          "type"  => "checkbox"),

 	array("type"  => "preheader",
          "name"  => "Global Posts Options"),
	
    array("name"  => "Posts Thumbnail",
          "desc"  => "Choose the size for the post thumbnails on archive pages.",
          "id"    => "loop_thumb_size",
          "options" => array('Small', 'Large', 'Full'),
          "std"   => "Full",
          "type"  => "select"),

    array("name"  => "Excerpt lenght",
          "desc"  => "Default: <strong>30</strong> (words)",
          "id"    => "excerpt_length",
          "std"   => "30",
          "type"  => "text"),

    array("name"  => "Show Date/time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "display_date",
          "std"   => "on",
          "type"  => "checkbox"),  

    array("name"  => "Show Category",
          "id"    => "display_category",
          "std"   => "on",
          "type"  => "checkbox"),           

    array("name"  => "Show Comments Count",
          "id"    => "display_comments",
          "std"   => "off",
          "type"  => "checkbox"), 

	array("type"  => "preheader",
          "name"  => "Single Post Options"),
          
	array("name"  => "Show Date/time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "post_date",
          "std"   => "on",
          "type"  => "checkbox"),  
          
    array("name"  => "Show Category",
          "id"    => "post_category",
          "std"   => "off",
          "type"  => "checkbox"), 
          
    array("name"  => "Show Author Profile",
          "desc"  => "You can edit your profile on this <a href='profile.php' target='_blank'>page</a>.",
          "id"    => "post_author",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Tags",
          "id"    => "post_tags",
          "std"   => "on",
          "type"  => "checkbox"),
          
	array("name"  => "Show Social Buttons",
          "id"    => "post_share",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Related Posts",
          "desc"  => "Display 3 most recent posts in the same category as the active post.",
		  "id"    => "post_related",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Number of Related Posts",
          "desc"  => "Default: <strong>3</strong> (words)",
          "id"    => "post_related_number",
          "std"   => "3",
          "type"  => "text"),

    array("name"  => "Show Comments",
          "id"    => "post_comments",
          "std"   => "on",
          "type"  => "checkbox"),

	array("type"  => "preheader",
          "name"  => "Single Page Options"),
          
	array("name"  => "Show Related Pages Menu in Sidebar",
          "id"    => "page_nav",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Show Social Buttons",
          "id"    => "page_share",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Comments",
          "id"    => "page_comments",
          "std"   => "on",
          "type"  => "checkbox"),

 	array("type"  => "preheader",
          "name"  => "Subscribe Block"),

    array("name"  => "Display on Homepage",
          "desc"  => "Leave this checked if you want to display the special block on the Homepage, under featured items.",
          "id"    => "subscribe_enable_homepage",
          "std"   => "on",
          "type"  => "checkbox"), 

    array("name"  => "Display in Footer",
          "desc"  => "Leave this checked if you want to display the special block on the rest of the pages, in the Footer, above the widgets.",
          "id"    => "subscribe_enable_footer",
          "std"   => "on",
          "type"  => "checkbox"), 

    array("name"  => "Subscription Message",
          "desc"  => "Add the message that should appear before the e-mail input.",
          "id"    => "subscribe_feed_label",
          "std"   => "Subscribe to our updates:",
          "type"  => "text"),

    array("name"  => "Feedburner Feed ID",
          "desc"  => "Insert your <a href=\"http://feedburner.google.com/\" target=\"_blank\">Feedburner Feed ID</a>. Example: WPZOOM<br /><strong><a href=\"http://www.wpzoom.com/images/feedburner.png\" target=\"_blank\">How to find your ID?</a></strong>",
          "id"    => "subscribe_feed_id",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Submit Color",
          "desc"  => "Choose the style that you would like to use for the submit button.<br />",
          "id"    => "subscribe_submit_color",
          "options" => array('Blue', 'Green', 'Orange', 'Purple', 'Red', 'Teal'),
          "std"   => "Blue",
          "type"  => "select"),

),

"id2" => array(          

	array("type"  => "preheader",
          "name"  => "Homepage Settings"),

	array("name"  => "Display Recent Posts on Homepage",
          "id"    => "recent_part_enable",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Recent Posts Text",
          "desc"  => "Example: Check out our latest blog posts for awesome news and promotions.",
          "id"    => "recent_part_text",
          "std"   => "",
          "type"  => "textarea"),

    array("name"  => "Recent Posts Thumbnail",
          "desc"  => "Choose the size for the post thumbnails on the homepage.",
          "id"    => "recent_part_thumb_size",
          "options" => array('Small', 'Large', 'Full'),
          "std"   => "Small",
          "type"  => "select"),

	array("name"  => "Exclude categories",
          "desc"  => "Exclude categories from appearing in the Recent Posts block.",
          "id"    => "recent_part_exclude",
          "std"   => "",
          "type"  => "select-category-multi"),

	array("type"  => "preheader",
          "name"  => "Featured Posts"),

	array("name"  => "Display Featured Posts",
          "desc"  => "Display featured posts at the top of the Homepage.<br />If you have troubles displaying posts in this section, please <a href='http://www.wpzoom.com/documentation/discovery/#featured' target='_blank'>read the documentation</a>.",
          "id"    => "featured_enable",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Hide Featured Posts in Recent Posts",
          "desc"  => "You can use this option if you want to hide posts which are featured on front page from the Recent Posts block, to avoid duplication.",
          "id"    => "hide_featured",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Number of posts to display",
          "desc"  => "Choose how many posts should be displayed in the slider.",
          "id"    => "featured_number",
          "std"   => "5",
          "type"  => "text"),

	array("name"  => "Autoplay slider",
          "desc"  => "Should the slider start rotating automatically?",
          "id"    => "featured_rotate",
          "std"   => "off",
          "type"  => "checkbox"), 

	array("name"  => "Autoplay Interval",
          "desc"  => "Select the interval (in miliseconds) at which the slider should change posts (if autoplay is enabled). Default: 5000 (5 seconds).",
          "id"    => "featured_interval",
          "std"   => "5000",
          "type"  => "text"),

    array("name"  => "Continue Reading Button Color",
          "desc"  => "Choose the style that you would like to use for the Continue Reading button.<br />",
          "id"    => "featured_more_color",
          "options" => array('Blue', 'Green', 'Orange', 'Purple', 'Red', 'Teal'),
          "std"   => "Blue",
          "type"  => "select"),

	array("type"  => "preheader",
          "name"  => "Teaser Settings"),
    
	array("name"  => "Show Teaser on Homepage",
          "id"    => "home_teaser_show",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Teaser Heading",
          "desc"  => "Type the heading for the teaser. <br>Will be wrapped inside <strong>&lt;h1&gt; &lt;/h1&gt;</strong> tags.",
          "id"    => "home_teaser_heading",
          "std"   => "Welcome to our website!",
          "type"  => "text"),

    array("name"  => "Teaser Text",
          "desc"  => "Here you can set the text for the teaser. <br><strong>HTML allowed.</strong> Example:<br>This is a &lt;strong&gt;welcome&lt;/strong&gt; message with some &lt;strong&gt;HTML code&lt;/strong&gt; in it.",
          "id"    => "home_teaser_content",
          "type"  => "textarea"),

	array("type"  => "preheader",
          "name"  => "Featured Services"),
    
	array("name"  => "Display the content of 4 static pages on homepage.",
          "id"    => "featured_pages_show",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Static page 1",
          "desc"  => "Select the 1st static page.",
          "id"    => "featured_page_1",
          "std"   => "",
          "type"  => "select-page"),
          
	array("name"  => "Static page 2",
          "desc"  => "Select the 2nd static page.",
          "id"    => "featured_page_2",
          "std"   => "",
          "type"  => "select-page"),
    
	array("name"  => "Static page 3",
          "desc"  => "Select the 3rd static page.",
          "id"    => "featured_page_3",
          "std"   => "",
          "type"  => "select-page"),
    
	array("name"  => "Static page 4",
          "desc"  => "Select the 4th static page.",
          "id"    => "featured_page_4",
          "std"   => "",
          "type"  => "select-page"),

    ),

"id5" => array(
	array("type"  => "preheader",
          "name"  => "Main Menu Colors"),
          
	array("name"  => "Main Menu Background Color",
		   "id"   => "menu_back_color",
           "type" => "color",
           "selector" => "nav#main-menu,nav#main-menu a",
           "attr" => "background-color"),

	array("name"  => "Main Menu Background Color: Hover and Active State",
		   "id"   => "menu_back_color_hover",
           "type" => "color",
           "selector" => "nav#main-menu a:hover,nav#main-menu li.current-menu-item a,nav#main-menu a:active,nav#main-menu li.current-item a",
           "attr" => "background-color"),

	array("name"  => "Main Menu Right Border Color",
		   "id"   => "menu_border_right",
           "type" => "color",
           "selector" => "nav#main-menu li",
           "attr" => "border-right-color"),

	array("name"  => "Main Menu Link Color",
		   "id"   => "menu_link_color",
           "type" => "color",
           "selector" => "nav#main-menu a",
           "attr" => "color"),

	array("name"  => "Main Menu Link Color:hover",
		   "id"   => "menu_link_color_hover",
           "type" => "color",
           "selector" => "nav#main-menu a:hover",
           "attr" => "color"),

	array("name"  => "Main Menu Submenu Background Color",
		   "id"   => "menu_sub_back_color",
           "type" => "color",
           "selector" => "nav#main-menu .dropdown ul",
           "attr" => "background-color"),

	array("name"  => "Main Menu Submenu Background Color: Hover and Active State",
		   "id"   => "menu_sub_back_color_hover",
           "type" => "color",
           "selector" => "nav#main-menu li li a:hover",
           "attr" => "background-color"),

	array("name"  => "Main Menu Submenu Link Color",
		   "id"   => "menu_sub_link_color",
           "type" => "color",
           "selector" => "nav#main-menu li li a",
           "attr" => "color"),

	array("name"  => "Main Menu Submenu Link Color:hover",
		   "id"   => "menu_sub_link_color_hover",
           "type" => "color",
           "selector" => "nav#main-menu li li a:hover",
           "attr" => "color"),

 ),

"id7" => array(

	array("type"  => "preheader",
          "name"  => "Sidebar Top Ad"),
          
	array("name"  => "Enable ad in sidebar, before menu and widgets",
          "id"    => "banner_sidebar_top_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_sidebar_top_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_sidebar_top",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_sidebar_top_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_sidebar_top_alt",
          "type"  => "text"),
          
          
	array("type"  => "preheader",
          "name"  => "Sidebar Bottom Ad"),
          
	array("name"  => "Enable ad in sidebar, after menu and widgets",
          "id"    => "banner_sidebar_bottom_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_sidebar_bottom_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_sidebar_bottom",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_sidebar_bottom_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_sidebar_bottom_alt",
          "type"  => "text"),

)

/* end return */);