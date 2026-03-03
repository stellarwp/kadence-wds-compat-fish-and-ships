<?php
/**
 * Plugin Name:       Kadence Delivery Slots [Fish and Ships]
 * Plugin URI:        https://github.com/stellarwp/kadence-woo-delivery-slots/?utm_source=iconicwp&utm_medium=plugin&utm_campaign=iconic-wds-compat-fish-and-ships
 * Description:       Compatibility between Kadence Delivery Slots and Fish and Ships by wpcentrics.
 * Author:            Kadence
 * Author URI:        https://www.kadencewp.com/
 * Text Domain:       iconic-compat-35291
 * Domain Path:       /languages
 * Version:           0.1.0
 * GitHub Plugin URI: stellarwp/kadence-woo-compat-template
 */

/**
 * Change format of the shipping method ID.
 *
 * @param array $shipping_method_options Shipping methods.
 *
 * @return array
 */
function iconic_compat_fish_n_ships_update_shipping_method_id( $shipping_method_options ) {
	$updated_shipping_method = array();

	foreach ( $shipping_method_options as $method_key => $method_name ) {
		if ( false !== strpos( $method_key, 'wc_fish_n_ships:' ) ) {
			$method_key = str_replace( 'wc_fish_n_ships:', 'fish_n_ships:', $method_key );
		}

		$updated_shipping_method[ $method_key ] = $method_name;
	}

	return $updated_shipping_method;
}

add_filter( 'iconic_wds_shipping_method_options', 'iconic_compat_fish_n_ships_update_shipping_method_id', 10 );
