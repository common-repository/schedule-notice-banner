<?php
function open_schedule_banner_menu()
{
    add_menu_page('Schedule Banner','Schedule Banner','manage_options','schedule_banner_menu','arthur_image_uploader','dashicons-images-alt2',20);
}
add_action('admin_menu','open_schedule_banner_menu');




add_action ( 'admin_enqueue_scripts', function () {
    if (is_admin ())
        wp_enqueue_media ();
    wp_enqueue_script('schedule_banner_script',plugins_url().'/schedule-notice-banner/scripts/admin.js');
});

function arthur_image_uploader( $name, $width="150px", $height="150px" ) {

    // Set variables
    $options = get_option( 'RssFeedIcon_settings' );
    $default_image = plugins_url('../img/no-image.jpg', __FILE__);

    if ( !empty( $options[$name] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options[$name], array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $options[$name];
    } else {
        $src = $default_image;
        $value = '';
    }

    // Print HTML field
    ?>
    <div class="wrap">
        <div class="upload">
            <h1>Hello</h1>
            <div class="upload">
                <div>
                    <input type="text" name="RssFeedIcon_settings[' <?php echo $name;?> ']" id="RssFeedIcon_settings['<?php echo $name;?> ']" value="<?php echo $value;?>" />
                    <button type="submit" class="upload_image_button button">Set  Image</button>
                    <button type="submit" class="remove_image_button button">&times;</button>
                </div>
            </div>
        </div>
        </div>
    <?php
}