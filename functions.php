<?php
add_action( 'admin_init', 'otfbmsg_admin_init' );
function otfbmsg_admin_init() {
  
  	register_setting( 'otfbmsg-settings-group', 'otfbmsg-plugin-settings' );
  	add_settings_section( 'section-1', __( 'Your Facebook Account', 'otfbmsg' ), 'otfbmsg_section_1_callback', 'otfbmsg-plugin' );
  	add_settings_section( 'section-2', __( 'Allow your customers to message', 'otfbmsg' ), 'otfbmsg_section_2_callback', 'otfbmsg-plugin' );
  	add_settings_section( 'section-3', __( 'Tab text settings', 'otfbmsg' ), 'otfbmsg_section_3_callback', 'otfbmsg-plugin' );
  	add_settings_section( 'section-4', __( 'Change Tab Image', 'otfbmsg' ), 'otfbmsg_section_4_callback', 'otfbmsg-plugin' );
	
  	add_settings_field( 'otfbmsg_fanpage', __( 'Your Facebook Fanpage', 'otfbmsg' ), 'otfbmsg_fanpage_callback', 'otfbmsg-plugin', 'section-1' );
  	add_settings_field( 'otfbmsg_boxcolor', __( 'Box color', 'otfbmsg' ), 'otfbmsg_boxcolor_callback', 'otfbmsg-plugin', 'section-1' );
  	add_settings_field( 'otfbmsg_position', __( 'Position', 'otfbmsg' ), 'otfbmsg_position_callback', 'otfbmsg-plugin', 'section-1' );

	add_settings_field( 'otfbmsg_layout', __( 'Select a layout', 'otfbmsg' ), 'otfbmsg_layout_callback', 'otfbmsg-plugin', 'section-2' );  	

  	add_settings_field( 'otfbmsg_texticon', __( 'Select a text icon', 'otfbmsg' ), 'otfbmsg_texticon_callback', 'otfbmsg-plugin', 'section-3' );
  	add_settings_field( 'otfbmsg_tabtext', __( 'Text', 'otfbmsg' ), 'otfbmsg_tabtext_callback', 'otfbmsg-plugin', 'section-3' );
  	add_settings_field( 'otfbmsg_fontsize', __( 'Font size(px)', 'otfbmsg' ), 'otfbmsg_fontsize_callback', 'otfbmsg-plugin', 'section-3' );
  	add_settings_field( 'otfbmsg_bgcolor', __( 'Background Color', 'otfbmsg' ), 'otfbmsg_bgcolor_callback', 'otfbmsg-plugin', 'section-3' );
  	add_settings_field( 'otfbmsg_textcolor', __( 'Text color', 'otfbmsg' ), 'otfbmsg_textcolor_callback', 'otfbmsg-plugin', 'section-3' );
  	add_settings_field( 'otfbmsg_otstyle', __( 'Select a style', 'otfbmsg' ), 'otfbmsg_otstyle_callback', 'otfbmsg-plugin', 'section-3' );

  	add_settings_field( 'otfbmsg_otimage', __( 'Choose image', 'otfbmsg' ), 'otfbmsg_otimage_callback', 'otfbmsg-plugin', 'section-4' );
  	add_settings_field( 'otfbmsg_imagesize', __( 'Choose image size(px)', 'otfbmsg' ), 'otfbmsg_imagesize_callback', 'otfbmsg-plugin', 'section-4' );
}

function otfbmsg_section_1_callback() {
	
}
function otfbmsg_section_2_callback() {
	
}
function otfbmsg_section_3_callback() {
	
}
function otfbmsg_section_4_callback() {
	
}

/*
* THE FIELDS
* */
function otfbmsg_fanpage_callback() {
	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_fanpage";
	$value = esc_attr( $settings[$field] );
	
	echo "<input type='text' size='40' name='otfbmsg-plugin-settings[$field]' value='$value' />";
}
function otfbmsg_boxcolor_callback() {
	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_boxcolor";
	if(esc_attr( $settings[$field] )) {
		$value = esc_attr( $settings[$field] );	
	} else {
		$value = '#39c7f4';
	}
	
	echo "<input type='text' size='40' name='otfbmsg-plugin-settings[$field]' value='$value' />";
}
function otfbmsg_position_callback() {	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_position";
	$value = esc_attr( $settings[$field] ); ?>
	 
	<select name='otfbmsg-plugin-settings[<?php echo $field ?>]' id='otfbmsg-plugin-settings[<?php echo $field ?>]'>
		<option value="bottom-right" <?php selected( $value, 'bottom-right' ); ?>><?php echo otfbmsg_e('Bottom right'); ?></option>
		<option value="bottom-left" <?php selected( $value, 'bottom-left' ); ?>><?php echo otfbmsg_e('Bottom left'); ?></option>
		<option value="center-left" <?php selected( $value, 'center-left' ); ?>><?php echo otfbmsg_e('Center left'); ?></option>
		<option value="center-right" <?php selected( $value, 'center-right' ); ?>><?php echo otfbmsg_e('Center right'); ?></option>
	</select>
	<?php
}
function otfbmsg_layout_callback() {	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_layout";
	$value = esc_attr( $settings[$field] ); ?>
	 
	<select name='otfbmsg-plugin-settings[<?php echo $field ?>]' id='otfbmsg-plugin-settings[<?php echo $field ?>]'>
		<option value="tab-text" <?php selected( $value, 'tab-text' ); ?>><?php echo otfbmsg_e('Tab text'); ?></option>
		<option value="tab-img" <?php selected( $value, 'tab-img' ); ?>><?php echo otfbmsg_e('Tab image'); ?></option>
	</select>
	<?php
}
function otfbmsg_texticon_callback() {	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_texticon";
	$value = esc_attr( $settings[$field] ); ?>
	 
	<select name='otfbmsg-plugin-settings[<?php echo $field ?>]' id='otfbmsg-plugin-settings[<?php echo $field ?>]'>
		<option value="icon-facebook-2-icon" <?php selected( $value, 'icon-facebook-2-icon' ); ?>><?php echo otfbmsg_e('Icon Facebook'); ?></option>
		<option value="icon-facebook-messenger-icon-01" <?php selected( $value, 'icon-facebook-messenger-icon-01' ); ?>><?php echo otfbmsg_e('Icon Facebook Messenger 1'); ?></option>
		<option value="icon-facebook-messenger-icon-02" <?php selected( $value, 'icon-facebook-messenger-icon-02' ); ?>><?php echo otfbmsg_e('Icon Facebook Messenger 2'); ?></option>
		<option value="icon-facebook-messenger-icon-03" <?php selected( $value, 'icon-facebook-messenger-icon-03' ); ?>><?php echo otfbmsg_e('Icon Facebook Messenger 3'); ?></option>
		<option value="icon-facebook-messenger-icon-04" <?php selected( $value, 'icon-facebook-messenger-icon-04' ); ?>><?php echo otfbmsg_e('Icon Facebook Messenger 4'); ?></option>
	</select>
	<?php
}
function otfbmsg_tabtext_callback() {
	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_tabtext";
	if(esc_attr( $settings[$field] )) {
		$value = esc_attr( $settings[$field] );
	} else {
		$value = __( 'Send us a message', 'otfbmsg' );
	}
	
	echo "<input type='text' size='40' name='otfbmsg-plugin-settings[$field]' value='$value' />";
}
function otfbmsg_fontsize_callback() {
	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_fontsize";
	if(esc_attr( $settings[$field] )) {
		$value = esc_attr( $settings[$field] );
	} else {
		$value = '14';
	}
	
	echo "<input type='number' size='40' name='otfbmsg-plugin-settings[$field]' value='$value' />";
}
function otfbmsg_bgcolor_callback() {
	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_bgcolor";
	if(esc_attr( $settings[$field] )) {
		$value = esc_attr( $settings[$field] );	
	} else {
		$value = '#39c7f4';
	}
	
	echo "<input type='text' size='40' name='otfbmsg-plugin-settings[$field]' value='$value' />";
}
function otfbmsg_textcolor_callback() {
	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_textcolor";
	if(esc_attr( $settings[$field] )) {
		$value = esc_attr( $settings[$field] );	
	} else {
		$value = '#FFFFFF';
	}
	
	echo "<input type='text' size='40' name='otfbmsg-plugin-settings[$field]' value='$value' />";
}
function otfbmsg_otstyle_callback() {	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_otstyle";
	$value = esc_attr( $settings[$field] ); ?>
	 
	<select name='otfbmsg-plugin-settings[<?php echo $field ?>]' id='otfbmsg-plugin-settings[<?php echo $field ?>]'>
		<option value="gradient" <?php selected( $value, 'gradient' ); ?>><?php echo otfbmsg_e('Gradient'); ?></option>
		<option value="flat" <?php selected( $value, 'flat' ); ?>><?php echo otfbmsg_e('Flat'); ?></option>
	</select>
	<?php
}
function otfbmsg_otimage_callback() {
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_otimage";
	$value = esc_attr( $settings[$field] );
	if(function_exists( 'wp_enqueue_media' )){
	    wp_enqueue_media();
	}else{
	    wp_enqueue_style('thickbox');
	    wp_enqueue_script('media-upload');
	    wp_enqueue_script('thickbox');
	}
	if($value) { ?>
 		<img class="otimage" src="<?php echo $value ?>" height="50" width="50"/>
 	<?php } ?>
    <input class="otimage_url" type="text" name="otfbmsg-plugin-settings[<?php echo $field ?>]" value="<?php echo $settings[$field] ?>">
    <a href="#" class="otimage_upload">Upload</a>
	<script>
    jQuery(document).ready(function($) {
        $('.otimage_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.otimage').attr('src', attachment.url);
                $('.otimage_url').val(attachment.url);

            })
            .open();
        });
    });
	</script>
	
	<?php
}
function otfbmsg_imagesize_callback() {
	
	$settings = (array) get_option( 'otfbmsg-plugin-settings' );
	$field = "otfbmsg_imagesize";
	if(esc_attr( $settings[$field] )) {
		$value = esc_attr( $settings[$field] );
	} else {
		$value = '125';
	}
	
	echo "<input type='number' size='40' name='otfbmsg-plugin-settings[$field]' value='$value' />";
}