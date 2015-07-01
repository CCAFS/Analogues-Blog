<?php

/**
 * WPZOOM Framework Options Manager
 *
 * @category WPZOOM
 */
class option {
    public static $options;
    public static $evoOptions;
    
    public static $prefix = "wpzoom_";

    public static function init() {
        self::loadOptions();
    }

    public static function set($name, $value) {
        update_option(self::$prefix . $name, $value);
        self::$options[$name] = $value;

        return $value;
    }
    
    public static function get($name, $echo = false) {
        $result = null;
    
        if (isset(self::$options[$name])) {
            $result = self::$options[$name];
        }
        
        if (!$result) {
            $result = get_option(self::$prefix . $name);
        }
        if (!$result) {
            return;
        }

        if (!$echo) {
            return $result;
        }

        echo $result;
    }
    
    public static function delete($name) {
        $args = func_get_args();
        $num = count($args);
        
        if ($num == 1) {
            return (delete_option(self::$prefix . $args[0]) ? TRUE : FALSE);
        } elseif (count($args) > 1) {
            foreach ($args as $option) {
                if (!delete_option(self::$prefix . $option))
                    return FALSE;
            }
            return TRUE;
        }
        return FALSE;
    }
    
    private static function loadOptions() {
        self::$options = self::getOptions();
    }
    
    public static function getOptions() {
        $themeOptions = include(FUNC_INC . "/theme/options.php");
        $wpzoomOptions = include(WPZOOM_INC . "/options.php");
        
        self::$evoOptions = array_merge_recursive($themeOptions, $wpzoomOptions);
        
        foreach(self::$evoOptions as $name => $options) {
            $name = explode("id", $name);
            if (isset($name[1]) && $name[1] != "") {
                $rOptions[] = $options;
            }
        }

        $i = 1;
        foreach ($rOptions as $column) {
            foreach ($column as $row) {
                if ($row['type'] == 'preheader') continue;
                $id = $row['id'];
                if (get_option(self::$prefix . $id) === false) {
                    if (!isset($row['std'])) { $std = ''; } else { $std = $row['std']; }
                    $globalOptions[$id] = $std;
                } else {
                    $globalOptions[$id] = get_option(self::$prefix . $id);
                }
            }
        }
        
        return $globalOptions;
    }
    
    public static function setupOptions($xoptions, $decode = false) {
        if ($decode) {
            $xoptions = unserialize(stripslashes(base64_decode($xoptions)));
        }

        $themeOptions = include(FUNC_INC . "/theme/options.php");
        $wpzoomOptions = include(WPZOOM_INC . "/options.php");
        
        self::$evoOptions = array_merge_recursive($themeOptions, $wpzoomOptions);
        
        foreach(self::$evoOptions as $name => $options) {
            $name = explode("id", $name);
            if (isset($name[1]) && $name[1] != "") {
                $rOptions[] = $options;
            }
        }
        
        $i = 1;
        foreach ($rOptions as $column) {
            foreach ($column as $row) {
                if ($row['type'] == 'preheader') continue;
                $id = $row['id'];
                
                self::set($id, $xoptions[$id]);
            }
        }

    }
    
    public static function reset() {
        global $wpdb;
        
        $query = "DELETE FROM $wpdb->options WHERE option_name LIKE '" . option::$prefix . "%'";
        $wpdb->query($query);
        
        if (isset($_GET['page'])) {
            $send = $_GET['page'];
            header("Location: admin.php?page=$send");
        }
    }
    
    public static function getWidgetOptions() {
        	global $wpdb;
        
        	$q = "SELECT * FROM $wpdb->options WHERE option_name LIKE 'widget_%'";
        	$q = $wpdb->get_results($q);
        
        	$widgetOptions = array();
        
        	foreach($q as $option):
        		$widgetOptions[$option->option_name] = maybe_unserialize($option->option_value);
        	endforeach;
        
        	//Get sidebar widgets locations
        	$widgetOptions['sidebars_widgets'] = get_option('sidebars_widgets');
        
        	return $widgetOptions;
    }
    
    public static function setupWidgetOptions($xoptions, $decode = false) {
        if ($decode) {
            $xoptions = unserialize(stripslashes(base64_decode($xoptions)));
        }
        
        if (!is_array($xoptions)) {
            return false;
        }
        
        foreach($xoptions as $id => $option) {
            update_option($id, $option);
		}
    }
}