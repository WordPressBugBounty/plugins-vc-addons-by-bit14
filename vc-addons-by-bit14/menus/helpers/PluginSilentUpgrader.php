<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WP_Error;
use WP_Upgrader;
use WP_Filesystem_Base;

/** \WP_Upgrader class */
require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

/** \Plugin_Upgrader class */
require_once(ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php');

/**
 * Class PBWB_PluginSilentUpgrader.
 *
 * Overrides Plugin_Upgrader::install() to fire a custom action on successful install.
 *
 * @internal Please do not use this class outside of core plugin development. May be removed at any time.
 */
class PBWB_PluginSilentUpgrader extends Plugin_Upgrader {

	/**
	 * Install a plugin package.
	 *
	 * @param string $package The full local path or URI of the package.
	 * @param array  $args    Optional. Other arguments for installing a plugin package. Default empty array.
	 *
	 * @return bool|\WP_Error True if the installation was successful, false or a WP_Error otherwise.
	 */
	public function install( $package, $args = array() ) {

		$result = parent::install( $package, $args );
		if ( true === $result ) {
			do_action( 'pb_plugin_installed', $package );
		}

		return $result;
	}
}
