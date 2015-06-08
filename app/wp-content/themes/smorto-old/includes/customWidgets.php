<?php

add_action('widgets_init', 'loadWidgets');

function loadWidgets() {
	register_widget('customWidget');
}

class customWidget extends WP_Widget
{
	function customWidget()
	{
		$widget_ops = array('classname' => 'customWidget', 'description' => __('Custom Widget'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('customWidget', 'Custom Widget', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = $instance['title'];
		
		echo $before_widget . $before_title . $title . $after_title . $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	
	function form($instance)
	{
		$defaults = array('title' => 'Custom Widget Title');
		$instance = wp_parse_args((array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;"></input>
		</p>
	<?php 
	}
}

?>