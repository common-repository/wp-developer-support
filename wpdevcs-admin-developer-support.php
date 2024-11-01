<?php
/**
 * @link              https://prwirepro.com
 * @since             1.0.0
 * @package           Wpdevcs_Admin_Developer_Support
 *
 * @wordpress-plugin
 * Plugin Name:       WP Developer Support
 * Plugin URI:        https://prwirepro.com/plugin-information/
 * Description:       A simple plugin to easily access essential wp development support tools, code snippets, resources and shortcodes for your wordpress website or blog.
 * Version:           1.0.0
 * Author:            PR Wire Pro
 * Author URI:        https://prwirepro.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpdevcs-admin-developer-support
 * Domain Path:       /languages
 */

namespace Wpdevcs_Admin_Developer_Support;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define Constants
 */

define( __NAMESPACE__ . '\NS', __NAMESPACE__ . '\\' );

define( NS . 'PLUGIN_NAME', 'wpdevcs-admin-developer-support' );

define( NS . 'PLUGIN_VERSION', '1.0.0' );

define( NS . 'PLUGIN_NAME_DIR', plugin_dir_path( __FILE__ ) );

define( NS . 'PLUGIN_NAME_URL', plugin_dir_url( __FILE__ ) );

define( NS . 'PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

define( NS . 'PLUGIN_TEXT_DOMAIN', 'wpdevcs-admin-developer-support' );


/**
 * Autoload Classes
 */

require_once( PLUGIN_NAME_DIR . 'inc/libraries/autoloader.php' );

/**
 * Register Activation and Deactivation Hooks
 * This action is documented in inc/core/class-activator.php
 */

register_activation_hook( __FILE__, array( NS . 'Inc\Core\Activator', 'activate' ) );

/**
 * The code that runs during plugin deactivation.
 * This action is documented inc/core/class-deactivator.php
 */

register_deactivation_hook( __FILE__, array( NS . 'Inc\Core\Deactivator', 'deactivate' ) );


/**
 * Plugin Singleton Container
 *
 * Maintains a single copy of the plugin app object
 *
 * @since    1.0.0
 */
class Wpdevcs_Admin_Developer_Support {

	static $init;
	/**
	 * Loads the plugin
	 *
	 * @access    public
	 */
	public static function init() {

		if ( null == self::$init ) {
			self::$init = new Inc\Core\Init();
			self::$init->run();
		}

		return self::$init;
	}

}

/*
 * Begins execution of the plugin
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * Also returns copy of the app object so 3rd party developers
 * can interact with the plugin's hooks contained within.
 *
 */
function wpdevcs_admin_developer_support_init() {
		return Wpdevcs_Admin_Developer_Support::init();
}

$min_php = '5.6.0';

// Check the minimum required PHP version and run the plugin.
if ( version_compare( PHP_VERSION, $min_php, '>=' ) ) {
		wpdevcs_admin_developer_support_init();
}
