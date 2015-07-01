<?php

add_action('admin_menu', 'adminDashboard::init');

class adminDashboard {

    /**
     * Initialize wp-admin options page
     */
    public static function init() {
        self::process();
        self::addWPMenu();
        medialibUploader::init();
    }
    
    /**
     * Pre-processor
     *
     * Pre process wp-admin requests and take care to save/update or to reset options
     */
    private static function process() {
        if (isset($_GET['page']) && $_GET['page'] == 'wpzoom_options' && isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == 'reset') {
                option::reset();
            }
        }
        
        if (is_admin() && isset($_GET['page']) && $_GET['page'] == 'wpzoom_options') {
            add_action('admin_head', 'adminDashboard::head');
            add_action('admin_init', 'adminDashboard::headInit');
            add_action('admin_footer', 'adminDashboard::activate');
        }
    }
    
    public static function activate() {
			if (option::get('wpzoom_activated') != 'yes') {
				$newTime = time();
				option::set('wpzoom_activated', 'yes');
				option::set('wpzoom_activated_time', $newTime);
				require_once(WPZOOM_INC . '/components/welcome.php');
			} else {
				$oldTime = option::get('wpzoom_activated_time');
				$newTime = time();
				if (($newTime - $oldTime) > 2592000) {
					option::set('wpzoom_activated_time', $newTime);
					require_once(WPZOOM_INC . '/components/welcome.php');
				}
			}
    }

    public static function head() {
        echo '<link rel="stylesheet" type="text/css" media="screen" href="' . wpzoom::$assetsPath . '/options.css" />';
    }
    
    public static function headInit() {
        wp_enqueue_script('tabs', wpzoom::$assetsPath . '/js/zoomAdmin.js', array('jquery', 'thickbox'));
    }
    
    public static function admin() {
        require_once(WPZOOM_INC . '/pages/admin.php');
    }
    
    public static function news() {
        require_once(WPZOOM_INC . '/pages/news.php');
    }
    
    public static function themes() {
        require_once(WPZOOM_INC . '/pages/themes.php');
    }
    
    public static function update() {
        require_once(WPZOOM_INC . '/pages/update.php');
    }

    /**
     * WPZOOM custom menu for wp-admin
     */
    private static function addWPMenu() {
        add_object_page ( 'Page Title', 'WPZOOM', 'manage_options','wpzoom_options', 'adminDashboard::admin', wpzoom::$assetsPath . '/images/shortcode-icon.png');
        
        add_submenu_page('wpzoom_options', 'WPZOOM',            'Theme Options',     'manage_options', 'wpzoom_options','adminDashboard::admin');
        add_submenu_page('wpzoom_options', 'Update Framework', 'Update Framework', 'manage_options', 'wpzoom_update', 'adminDashboard::update');
        // add_submenu_page('wpzoom_options', 'WPZOOM News',       'WPZOOM News',       'manage_options', 'wpzoom_news',   'adminDashboard::news');
        add_submenu_page('wpzoom_options', 'New Themes',     'New Themes',     'manage_options', 'wpzoom_themes', 'adminDashboard::themes');
    }
    
    /**
     * Menu for theme/framework options page
     */
    public static function menu() {
        $menu = option::$evoOptions['menu'];
        $out = '<ul class="tabs">';

        foreach ($menu as $item) {
            $class = strtolower(str_replace(" ", "_", preg_replace("/[^a-zA-Z0-9\s]/", "", $item['name'])));
            
            $out.= '<li class="' . $class . ' wz-parent" id="wzm-' . $class . '"><a href="#tab' . $item['id'] . '">' . $item['name'] . '</a><span></span><em></em>';
            $out.= '<ul>';
            foreach (option::$evoOptions['id' . $item['id']] as $submenu) {
                if ($submenu['type'] == 'preheader') {
                    $name = $submenu['name'];
                    
                    $stitle = 'wpz_' . substr(md5($name), 0, 8);    
                    
                    $out.= '<li class="sub"><a href="#' . $stitle . '">' . $name . '</a></li>';
                }    
            }
            $out.= '</ul>';
            $out.= '</li>';
        }
        
        $out.= '</ul>';
        
        echo $out;
    }
    
    public static function content() { 
        $options = option::$evoOptions;

        $rOptions = array();
        $out = "";
        foreach($options as $name => $foptions) {
            $name = explode("id", $name);
            if (isset($name[1]) && $name[1] != "") {
                $rOptions[$name[1]] = $foptions;
            }
        }
        foreach ($rOptions as $rid => $column) {
        ?>
            <div id="tab<?php echo $rid; ?>" class="tab_content">
                
                <?php 
                $out = "";
                $sidebar = "";
                $first = true;
                foreach ($column as $row) {
                    
                    $name = $row['name'];
                    $type = $row['type'];
                    if ($type != 'preheader') {
                        $id = isset($row['id']) ? $row['id'] : '';
                        $std = isset($row['std']) ? $row['std'] : '';
                        $desc = isset($row['desc']) ? $row['desc'] : '';
                        $value = (option::get($id) != "" && !is_array(option::get($id))) ? stripslashes(option::get($id)) : $std;
                    }
                    
                    if ($row['type'] != 'preheader') {
                        $out.= '<div class="wpz_option_container clear">';
                    }
                    
                    switch ($row['type']) {
                        case 'preheader':
                            if (!$first) {
                                $out.= "</div>";
                            }
                            $first = false;
                            $stitle = 'wpz_' . substr(md5($name), 0, 8);
                            $out.= "<div class=\"sub\" id=\"$stitle\">";
                            $out.= "<h4>$name</h4>";
                            $out.= "<div class=\"cleaner\">&nbsp;</div>";
                            break;
                        
                        case 'separator':
                            $out.= '<div class="sep">&nbsp;</div>';
                            break;
                        
                        case 'cleaner':
                            $out.= '<div class="cleaner">&nbsp;</div>';
                        
                        case 'text':
                            $out.= "<label for=\"$id\">$name</label>";
                            $out.= "<input name=\"$id\" id=\"$id\" type=\"$type\" value=\"$value\" />";
                            $out.= "<p>$desc</p>";
                            break;
                        
                        case 'textarea':
                            $out.= "<label>$name</label>";
                            if ($id == 'misc_export') {
                                $value = base64_encode(serialize(option::getOptions()));
                            } elseif ($id == 'misc_export_widgets') {
                                $value = base64_encode(serialize(option::getWidgetOptions()));
                            } elseif ($id == 'misc_import' || $id == 'misc_import_widgets') {
                                //$value = '';
                            }
                            $out.= "<textarea id=\"$id\" name=\"$id\" type=\"$type\" colls=\"\" rows=\"\">$value</textarea>";
                            $out.= "<p>$desc</p>";
                            break;
                        
                        case 'select':
                            $out.= "<label>$name</label>";
                            $out.= "<select name=\"$id\" id=\"$id\">";
                            foreach ($row['options'] as $option) {
                                $selected = false;
                                if (option::get($id) == $option) { $selected = true; } else
                                if ($option == $std) { $selected = true; }
                                $out.= '<option' . ($selected ? ' selected="selected"' : '') . '>' . $option;
                                $out.= '</option>';
                            }
                            $out.= "</select>";
                            $out.= "<p>$desc</p>";
                            break;
                        
                        case 'select-category':
                            unset($catids,$catnames);
							$categoriesParents = ui::getCategories();
                            if (count($categoriesParents) > 0) {
                                foreach ( $categoriesParents as $key => $value ) {
                                	$catids[] = $key;
                                	$catnames[] = $value;
                                }
                            }
                            $out.= "<label>$name</label>";
                            $out.= "<select name=\"$id\">";
                            
							$out.= "<option value=\"0\"";
							$out.= (option::get($id) == 0) ? ' selected="selected"' : '';
							$out.= '> - select a category -';
							$out.= "</option>";
							
							foreach ($catids as $key => $val) {
                                $out.= "<option value=\"$val\"";
                                $out.= (option::get($id) == $val) ? ' selected="selected"' : '';
                                $out.= '>' . $catnames[$key];
                                $out.= "</option>";
                            }
                            $out.= "</select>";
                            $out.= "<p>$desc</p>";
                            break;
                        
                        case 'select-category-multi':
                            unset($catids,$catnames);
							$categoriesParents = ui::getCategories();
                            if (count($categoriesParents) > 0) {
                                foreach ( $categoriesParents as $key => $value ) {
                                	$catids[] = $key;
                                	$catnames[] = $value;
                                }
                            }
                            $activeoptions = is_array(option::get($id)) ? option::get($id) : array();
                            $out.= "<label>$name</label>";
                            $out.= "<select id=\"s_$id\" multiple=\"true\" name=\"" . $id . "[]\" style=\"height: 150px\">";

							$out.= "<option value=\"0\"";
							$out.= (in_array(0, $activeoptions)) ? ' selected="selected"' : '';
							$out.= '> - select a category -';
							$out.= "</option>";

                            if (count($catids) > 0) {
								foreach ($catids as $key => $val) {
	                                $out.= "<option value=\"$val\"";
	                                if (in_array($val, $activeoptions)) {
	                                    $out.= ' selected="selected"';
	                                }
	                                $out.= ">" . $catnames[$key];
	                                $out.= '</option>';
	                            }
                            }
                            $out.= "</select>";
                            $out.= "<p>$desc</p>";
                            break;

                        case 'select-page':
							$pages = get_pages();

							$out.= "<label>$name</label>";
							$out.= "<select name=\"$id\">";

							$out.= '<option value="0"';
							$out.= (option::get($id) == 0) ? ' selected="selected"' : '';
							$out.= '> - select a page -';
							$out.= "</option>";

							foreach ($pages as $page) {
								$out.= "<option value=\"{$page->ID}\"";
								$out.= (option::get($id) == $page->ID) ? ' selected="selected"' : '';
								$out.= '>' . get_the_title($page->ID);
								$out.= "</option>";
							}

							$out.= "</select>";
							$out.= "<p>$desc</p>";
							break;

                        case 'select-tag-multi':
                            unset($catids,$catnames);
							$categoriesParents = get_categories('taxonomy=post_tag');;
                            
                            $catids = array();
                            $catnames = array();
                            
							if (count($categoriesParents) > 0) {
                                foreach ( $categoriesParents as $cat ) {
                                	$catids[] = $cat->term_id;
                                	$catnames[] = $cat->category_nicename;
                                }
                            }
                            $activeoptions = is_array(option::get($id)) ? option::get($id) : array();
                            $out.= "<label>$name</label>";
                            $out.= "<select id=\"s_$id\" multiple=\"true\" name=\"" . $id . "[]\" style=\"height: 150px\">";
                            
                            $out.= "<option value=\"0\"";
							$out.= (in_array(0, $activeoptions)) ? ' selected="selected"' : '';
							$out.= '> - select a tag -';
							$out.= "</option>";
                            
                            if (count($catids) > 0) {
								foreach ($catids as $key => $val) {
	                                $out.= "<option value=\"$val\"";
	                                if (in_array($val, $activeoptions)) {
	                                    $out.= ' selected="selected"';
	                                }
	                                $out.= ">" . $catnames[$key];
	                                $out.= '</option>';
	                            }
                            }
                            $out.= "</select>";
                            $out.= "<p>$desc</p>";
                            break;

                        case 'select-layout':

							$z = 0;
							$out.= "<label>$name</label>";
                            foreach ($row['options'] as $key => $val) {
                            	$z++;
                                $out.= "<input id=\"$key\" type=\"radio\" class=\"RadioClass\" name=\"$id\" value=\"$key\"";
                                if (option::get($id) == $key) {
                                	$out .= ' selected="selected"';
								}
                                $out.= ' />';
                                $out.= "<label for=\"$key\" class=\"RadioLabelClass";
                                if (option::get($id) == $key) {
                                	$out .= ' RadioSelected';
								}
								$out.= "\">";
								$out.= "<img src=\"".wpzoom::$wpzoomPath."/assets/images/layout-$key.png\" alt=\"\" title=\"$val\" class=\"layout-select\" /></label>";
                            }
                            $out.= "<p>$desc</p>";
                            
                            break;

                        case 'checkbox':
                            $out.= '<div class="checkbox">';
                             $out.= "<input type=\"checkbox\" class=\"checkbox\" name=\"$id\" id=\"$id\" ";
                            if (option::get($id) == "on") {
                                $out.= ' checked="checked"';
                            } elseif (!option::get($id) && $std == "on") {
                                $out.= ' checked="checked"';
                            }
                            $out.= " />";
							$out.= "<label for=\"$id\">$name</label>";
							$out.= "<p>$desc</p>";
                            $out.= "</div>";
                            break;
                        
                        case 'upload':
                            $val = option::get($id) ? option::get($id) : $std;
                            $out.= "<label>$name</label>";
                            $out.= medialibUploader::action($id, $val, $desc);
                            break;
                        
                        case 'color':
                            $val = option::get($id) ? option::get($id) : '';
                            $out.= "<label>$name</label>";
                            $out.= '<div class="colorSelector"><div></div></div><input name="'.$id.'" id="'.$id.'" class="txt input-text input-colourpicker" type="text" value="'.$val.'"></input>';
                            $out.= "<p>$desc</p>";
                            break;
                        
                        case 'button':
                            $out.= "<button class=\"button-secondary\" id=\"$id\">$name</button>";
							$out.= "<p>$desc</p>";

                            break;
                    }
                    
                    if ($row['type'] != 'preheader') {
                        $out.= '<div class="cleaner"></div></div>';
                    }
                }
                $out.= "</div>";
                ?>
                <div class="zoomForms">
                    <?php echo $out; ?>
                </div><!-- end .zoomForms -->
                <div class="clear"></div>
            </div>
        <?php
        }
        
    }
}