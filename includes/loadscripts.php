<?php
function schedule_notice_banner_add_scripts()
{
    wp_enqueue_script('banner_scripts',plugin_dir_url(__FILE__).'../scripts/admin.js', array('jquery'));
    wp_enqueue_style('banner_image_style',plugin_dir_url(__FILE__).'../styles/style.css',array(),null);
}

add_action('wp_enqueue_scripts','schedule_notice_banner_add_scripts');


function load_admin_scripts()
{
    if(is_admin())
    {
        wp_enqueue_media ();
        wp_enqueue_script('schedule_banner_script',plugin_dir_url(__FILE__).'../scripts/admin.js');
        wp_enqueue_script('schedule_validation_script',plugin_dir_url(__FILE__).'../scripts/validate.min.js');
        wp_enqueue_script('schedule_banner',plugin_dir_url(__FILE__).'../scripts/jquery.simple-dtpicker.js');
        wp_enqueue_style('date_picker_style',plugin_dir_url(__FILE__).'../styles/jquery.simple-dtpicker.css');
    }
}
add_action('admin_enqueue_scripts','load_admin_scripts');
