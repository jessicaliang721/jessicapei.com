<?php
/**
 * GitHub Updater
 *
 * @package   GitHub_Updater
 * @author    Andy Fragen
 * @author    Mikael Lindqvist
 * @license   GPL-2.0+
 * @link      https://github.com/afragen/github-updater
 */

namespace Fragen\GitHub_Updater;

/*
 * Exit if called directly.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

/**
 * Class Rest_Upgrader_Skin
 *
 * Extends WP_Upgrader_Skin and collects outputed messages for later
 * processing, rather than printing them out.
 *
 * @package Fragen\GitHub_Updater
 */
class Rest_Upgrader_Skin extends \WP_Upgrader_Skin {

	public $messages = array();
	public $error;

	/**
	 * Overrides the feedback method.
	 * Adds the feedback string to the messages array.
	 */
	public function feedback( $string ) {
		if ( isset( $this->upgrader->strings[ $string ] ) ) {
			$string = $this->upgrader->strings[ $string ];
		}

		if ( strpos( $string, '%' ) !== false ) {
			$args = func_get_args();
			$args = array_splice( $args, 1 );
			if ( $args ) {
				$args   = array_map( 'strip_tags', $args );
				$args   = array_map( 'esc_html', $args );
				$string = vsprintf( $string, $args );
			}
		}
		if ( empty( $string ) ) {
			return;
		}

		$this->messages[] = $string;
	}

	/**
	 * Set the error flag to true, then let the base class handle the rest.
	 */
	public function error( $errors ) {
		$this->error = true;
		parent::error( $errors );
	}

	/**
	 * Do nothing.
	 */
	public function decrement_update_count() {}

	/**
	 * Do nothing.
	 */
	public function header() {}

	/**
	 * Do nothing.
	 */
	public function footer() {}
}
