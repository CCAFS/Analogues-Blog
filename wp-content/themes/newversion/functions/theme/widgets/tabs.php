<?php 

wp_register_script('tabber-minimized', get_bloginfo('template_url') . '/js/tabber-minimized.js');

function check_wpztabs_widget() {
     if( is_active_widget(false, false, 'tabbed-widget', true ) ) {
       // enqueue the script
       wp_enqueue_script('tabber-minimized');
    }
}
add_action( 'init', 'check_wpztabs_widget' );

function tabber_tabs_temp_hide(){
	echo '<script type="text/javascript">document.write(\'<style type="text/css">.tabber{display:none;}</style>\');</script>';
}

function is_tabber_tabs_area_active( $index ){
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if ($widgetcolums[$index]) return true;

	return false;
}

// Let's build a widget
class tabbed_widget extends WP_Widget {

	function tabbed_widget() {
		$widget_ops = array( 'classname' => 'tabbertabs', 'description' => __('Drag me to the Sidebar') );
		$control_ops = array( 'width' => 230, 'height' => 300, 'id_base' => 'tabbed-widget' );
		$this->WP_Widget( 'tabbed-widget', __('WPZOOM: Tabs'), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		
		
    	$style = $instance['style']; // get the widget style from settings
		
		echo "\n\t\t\t" . $before_widget;
		
		// Show the Tabs
		echo '<div class="tabber">'; // set the class with style
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('tabber_tabs') )
		echo '</div>';		
		echo '</div>';		
		
		echo "\n\t\t\t" . $after_widget;
 	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['style'] = $new_instance['style'];
		
		return $instance;
	}

	function form( $instance ) {

		//Defaults
		$defaults = array( 'title' => __('Tabber', 'wpzoom'), 'style' => 'style1' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<div style="float:left;width:98%;"></div>
		<p>
		<?php _e('Place your widgets in the <strong>WPZOOM: Tabs Widget Area</strong> and have them show up here.')?>
		</p>
		 
		<div style="clear:both;">&nbsp;</div>
	<?php
	}
} 

function tabber_tabs_load_widget() { register_widget( 'tabbed_widget' ); }
?>