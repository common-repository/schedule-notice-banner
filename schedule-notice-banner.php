<?php
/**
 * Plugin Name: Schedule Notice Banner
 * Description: Schedule Notice Banner is a WordPress plugin that allows users to schedule the display of banners before or under the navigation area of their website. Users can set expiry date for the banner.
 * Author: Toyin Alagbe
 * Version: 1.0
 *Author URI: Https://sourcestudiosng.com
 *
 */

if(!defined('ABSPATH'))
{
    exit();
}
require_once(plugin_dir_path(__FILE__).'/includes/loadscripts.php');
require_once(plugin_dir_path(__FILE__).'/includes/schedule-notice-banner-display-content.php');

if(is_admin())
{
    require_once(plugin_dir_path(__FILE__).'/includes/schedule-notice-banner-settings.php');

}
