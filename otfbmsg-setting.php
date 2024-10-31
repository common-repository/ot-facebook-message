<?php

if (!current_user_can('manage_options')) {
    die('The account you\'re logged in to doesn\'t have permission to access this page.');
}



?>
<span class="version"><?php echo otfbmsg_e('Version: %s', esc_html(OTFBMSG_PLUGIN_VERSION)); ?></span>
<div class="otfbmsg-setting container-fluid">
	<div class="otfbmsg-facebook"><?php echo otfbmsg_e('OT Facebook Message'); ?></div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#setting" aria-controls="setting" role="tab" data-toggle="tab"><?php echo otfbmsg_e('Setting'); ?></a>
        </li>
        <li role="presentation">
            <a href="#shortcode" aria-controls="shortcode" role="tab" data-toggle="tab"><?php echo otfbmsg_e('Shortcode'); ?></a>
        </li>
    </ul>
    <div class="tab-content">
    	<div role="tabpanel" class="tab-pane active" id="setting">
         	<form action="options.php" method="POST">
		        <?php settings_fields('otfbmsg-settings-group'); ?>
		        <?php do_settings_sections('otfbmsg-plugin'); ?>
		        <?php submit_button(); ?>
	      	</form>
        </div>
        <div role="tabpanel" class="tab-pane" id="shortcode">
    		<h5><?php echo otfbmsg_e('How to add shortcode'); ?></h5>
			<p><?php echo otfbmsg_e('You can add this shortcode'); ?> <strong>[otfb-message]</strong> <?php echo otfbmsg_e('to file wp-content/themes/{your theme}/footer.php'); ?>.</p>
		</div>
	</div>
</div>