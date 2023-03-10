<?php
/**
 * Ajax Load More Enqueue scripts class.
 *
 * @package  AjaxLoadMore
 * @since    2.10.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'ALM_ENQUEUE' ) ) :

	/**
	 * Initiate the class.
	 */
	class ALM_ENQUEUE {

		/**
		 * Load ALM CSS.
		 *
		 * @param string $name The name of the CSS to enqueue.
		 * @param string $file The file path.
		 * @since 2.10.1
		 */
		public static function alm_enqueue_css( $name, $file ) {
			$css      = '';
			$css_path = '';
			$dir      = 'alm';
			$file_css = $name . '.css';

			// - Check theme for local ajax-load-more.css, if found, load that file
			if ( is_child_theme() ) {
				$css      = get_stylesheet_directory_uri() . '/' . $dir . '/' . $file_css;
				$css_path = get_stylesheet_directory() . '/' . $dir . '/' . $file_css;

				// if child theme does not have CSS, check the parent theme.
				if ( ! file_exists( $css_path ) ) {
					$css      = get_template_directory_uri() . '/' . $dir . '/' . $file_css;
					$css_path = get_template_directory() . '/' . $dir . '/' . $file_css;
				}
			} else {
				$css      = get_template_directory_uri() . '/' . $dir . '/' . $file_css;
				$css_path = get_template_directory() . '/' . $dir . '/' . $file_css;
			}

			// If path has been set.
			if ( $css_path !== '' ) {
				if ( file_exists( $css_path ) ) {
					$file = $css;
				}
			}

			// Enqueue the css.
			wp_enqueue_style( $name, $file ); // phpcs:ignore
		}

		/**
		 * Load ALM CSS Inline.
		 *
		 * @param  string $name     The name of the CSS to enqueue.
		 * @param  string $file     The file path.
		 * @param  string $url_path The URL to plugin directory.
		 * @return string           Style tag as raw HTML.
		 * @since 2.3.1
		 */
		public static function alm_inline_css( $name, $file, $url_path ) {
			$css          = '';
			$css_path     = '';
			$dir          = 'alm';
			$file_css     = $name . '.css';
			$contents     = '';
			$core_alm_css = true;

			// - Check theme for local ajax-load-more.css, if found, load that file
			if ( is_child_theme() ) {
				$css      = get_stylesheet_directory_uri() . '/' . $dir . '/' . $file_css;
				$css_path = get_stylesheet_directory() . '/' . $dir . '/' . $file_css;

				// if child theme does not have CSS, check the parent theme.
				if ( ! file_exists( $css_path ) ) {
					$css      = get_template_directory_uri() . '/' . $dir . '/' . $file_css;
					$css_path = get_template_directory() . '/' . $dir . '/' . $file_css;
				}
			} else {
				$css      = get_template_directory_uri() . '/' . $dir . '/' . $file_css;
				$css_path = get_template_directory() . '/' . $dir . '/' . $file_css;
			}

			// If path has been set.
			if ( $css_path !== '' ) {
				if ( file_exists( $css_path ) ) {
					$file         = $css_path;
					$core_alm_css = false;
				}
			}

			if ( file_exists( $file ) ) {
				$css_file = file_get_contents( $file ); // phpcs:ignore

				// If using core CSS, replace the `../..` path in the CSS file.
				if ( $core_alm_css ) {
					$new_img_path = $url_path . '/core';

					// Find and replace strings in CSS.
					$css_file = str_replace( '../..', $new_img_path, $css_file );
				}
				$contents = '<style type="text/css">' . $css_file . '</style>';

			}
			return $contents;
		}
	}
endif;
