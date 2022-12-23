<?php
/**
 * Theme bootstrap
 *
 * @package Yuki Magazine
 */

if ( ! function_exists( 'yuki_magazine_light_color_scheme' ) ) {
	/**
	 * Add light theme color scheme
	 *
	 * @param $palettes
	 *
	 * @return mixed
	 */
	function yuki_magazine_light_color_scheme( $palettes ) {
		array_unshift( $palettes, [
			'yuki-light-primary-color'  => '#22c55e',
			'yuki-light-primary-active' => '#16a34a',
			'yuki-light-accent-color'   => '#3f3f46',
			'yuki-light-accent-active'  => '#18181b',
			'yuki-light-base-300'       => '#d4d4d8',
			'yuki-light-base-200'       => '#e4e4e7',
			'yuki-light-base-100'       => '#f4f4f5',
			'yuki-light-base-color'     => '#ffffff',
		] );

		return $palettes;
	}
}
add_filter( 'yuki_light_color_palettes', 'yuki_magazine_light_color_scheme' );

if ( ! function_exists( 'yuki_magazine_dark_color_scheme' ) ) {
	/**
	 * Add dark theme color scheme
	 *
	 * @param $palettes
	 *
	 * @return mixed
	 */
	function yuki_magazine_dark_color_scheme( $palettes ) {
		array_unshift( $palettes, [
			'yuki-dark-primary-color'  => '#22c55e',
			'yuki-dark-primary-active' => '#16a34a',
			'yuki-dark-accent-color'   => '#a3a9a3',
			'yuki-dark-accent-active'  => '#f3f4f6',
			'yuki-dark-base-300'       => '#52525b',
			'yuki-dark-base-200'       => '#3f3f46',
			'yuki-dark-base-100'       => '#27272a',
			'yuki-dark-base-color'     => '#18181b',
		] );

		return $palettes;
	}
}
add_filter( 'yuki_dark_color_palettes', 'yuki_magazine_dark_color_scheme' );

if ( ! function_exists( 'yuki_magazine_homepage_content_spacing' ) ) {
	/**
	 * Change default content spacing for homepage
	 *
	 * @return string
	 */
	function yuki_magazine_homepage_content_spacing() {
		return '24px';
	}
}
add_filter( 'yuki_homepage_content_spacing_default_value', 'yuki_magazine_homepage_content_spacing' );

if ( ! function_exists( 'yuki_magazine_homepage_heading' ) ) {
	/**
	 * Generate heading element
	 *
	 * @param $title
	 * @param $sub_title
	 * @param $settings
	 *
	 * @return array
	 */
	function yuki_magazine_homepage_heading( $title, $sub_title = '', $settings = [] ) {
		return [
			'id'       => 'heading',
			'settings' => wp_parse_args( $settings, [
				'title'            => $title,
				'sub-title'        => $sub_title,
				'alignment'        => 'left',
				'title-typography' => [
					'family'        => 'inherit',
					'fontSize'      => [
						'desktop' => '1.5rem',
						'tablet'  => '1.25rem',
						'mobile'  => '1rem'
					],
					'variant'       => '600',
					'lineHeight'    => '1.5',
					'textTransform' => 'capitalize',
				],
				'spacing'          => [
					'top'    => '0px',
					'bottom' => '0px',
					'left'   => '0px',
					'right'  => '0px',
					'linked' => false,
				]
			] )
		];
	}
}

if ( ! function_exists( 'yuki_magazine_homepage_design' ) ) {
	/**
	 * Override default homepage design
	 *
	 * @return array
	 */
	function yuki_magazine_homepage_design() {
		return [
			// Magazine Grid
			[
				'settings' => [
					'margin' => [
						'linked' => false,
						'left'   => '0px',
						'right'  => '0px',
						'top'    => '0px',
						'bottom' => '24px',
					],
				],
				'columns'  => [
					[
						'elements' => [
							[
								'id'       => 'magazine-grid',
								'settings' => [
									'grid-layout'      => 'style1',
									'container-height' => '450px',
								]
							],
						],
						'settings' => [],
					],
				],
			],
			// Posts Grid
			[
				'settings' => [
					'margin' => [
						'linked' => false,
						'left'   => '0px',
						'right'  => '0px',
						'top'    => '0px',
						'bottom' => '24px',
					],
				],
				'columns'  => [
					[
						'elements' => [
							yuki_magazine_homepage_heading( __( 'Most Recent', 'yuki-magazine' ) ),
							[
								'id'       => 'posts-grid',
								'settings' => [
									'posts-count'                     => 6,
									'grid-columns'                    => [
										'desktop' => 3,
										'tablet'  => 2,
										'mobile'  => 1,
									],
									'yuki_el_tax_style_cats'          => 'badge',
									'yuki_el_tax_badge_bg_color_cats' => [
										'initial' => 'var(--yuki-primary-color)',
										'hover'   => 'var(--yuki-primary-active)',
									],
									'yuki_el_thumbnail_height'        => '180px',
									'structure'                       => [
										[ 'id' => 'thumbnail', 'visible' => true ],
										[ 'id' => 'categories', 'visible' => true ],
										[ 'id' => 'title', 'visible' => true ],
										[ 'id' => 'excerpt', 'visible' => true ],
										[ 'id' => 'metas', 'visible' => true ],
									],
								]
							],
						],
						'settings' => [],
					],
				],
			],
			// Magazine Grid #2
			[
				'settings' => [
					'margin' => [
						'linked' => false,
						'left'   => '0px',
						'right'  => '0px',
						'top'    => '0px',
						'bottom' => '24px',
					],
				],
				'columns'  => [
					[
						'elements' => [
							[
								'id'       => 'magazine-grid',
								'settings' => [
									'grid-layout'      => 'style3',
									'container-height' => '360px',
								]
							],
						],
						'settings' => [],
					],
				],
			],
			// Posts Grid + Sidebar
			[
				'settings' => [],
				'columns'  => [
					[
						'elements' => [
							yuki_magazine_homepage_heading( __( 'Recommended', 'yuki-magazine' ), __( 'Top pic for you', 'yuki-magazine' ), [
								'spacing' => [
									'top'    => '0px',
									'right'  => '0px',
									'bottom' => '12px',
									'left'   => '0px',
									'linked' => false
								]
							] ),
						],
						'settings' => [],
					],
					[
						'elements' => [
							[
								'id'       => 'posts-grid',
								'settings' => [
									'posts-count'                     => 6,
									'grid-columns'                    => [
										'desktop' => 2,
										'tablet'  => 2,
										'mobile'  => 1,
									],
									'yuki_el_thumbnail_height'        => '180px',
									'yuki_el_tax_style_cats'          => 'badge',
									'yuki_el_tax_badge_bg_color_cats' => [
										'initial' => 'var(--yuki-primary-color)',
										'hover'   => 'var(--yuki-primary-active)',
									],
									'structure'                       => [
										[ 'id' => 'thumbnail', 'visible' => true ],
										[ 'id' => 'categories', 'visible' => true ],
										[ 'id' => 'title', 'visible' => true ],
										[ 'id' => 'excerpt', 'visible' => true ],
										[ 'id' => 'metas', 'visible' => true ],
									],
								]
							],
						],
						'settings' => [
							'width' => [ 'desktop' => '70%', 'tablet' => '100%', 'mobile' => '100%' ],
						],
					],
					[
						'elements' => [
							[
								'id'       => 'posts-slider',
								'settings' => [
									'container-height'         => '360px',
									'autoplay'                 => 'yes',
									'navigation'               => 'no',
									'yuki_el_title_typography' => [
										'family'     => 'inherit',
										'fontSize'   => [
											'desktop' => '1.25rem',
											'tablet'  => '1.15rem',
											'mobile'  => '1rem'
										],
										'variant'    => '700',
										'lineHeight' => '1.5em'
									],
								],
							],
							[
								'id'       => 'frontpage-widgets-1',
								'settings' => [],
							]
						],
						'settings' => [
							'width' => [ 'desktop' => '30%', 'tablet' => '100%', 'mobile' => '100%' ],
						],
					]
				]
			],
			// Stretch Sliders
			[
				'settings' => [ 'stretch' => 'yes' ],
				'columns'  => [
					[
						'elements' => [
							[
								'id'       => 'posts-slider',
								'settings' => [
									'container-height'         => '360px',
									'autoplay'                 => 'yes',
									'navigation'               => 'yes',
									'slides-to-show'           => [
										'desktop' => 3,
										'tablet'  => 3,
										'mobile'  => 1,
									],
									'yuki_el_title_typography' => [
										'family'     => 'inherit',
										'fontSize'   => [
											'desktop' => '1.25rem',
											'tablet'  => '1.15rem',
											'mobile'  => '1rem'
										],
										'variant'    => '700',
										'lineHeight' => '1.5em'
									],
								],
							]
						],
						'settings' => [],
					]
				],
			],
		];
	}
}
add_filter( 'yuki_homepage_builder_default_value', 'yuki_magazine_homepage_design' );

if ( ! function_exists( 'yuki_magazine_post_featured_image_fallback' ) ) {
	/**
	 * Set default post featured image
	 *
	 * @return string[]
	 */
	function yuki_magazine_post_featured_image_fallback() {
		return [
			'url' => get_stylesheet_directory_uri() . '/assets/featured-image.jpg',
		];
	}
}
add_filter( 'yuki_post_featured_image_fallback_default_value', 'yuki_magazine_post_featured_image_fallback' );

if ( ! function_exists( 'yuki_magazine_featured_image_background_overlay' ) ) {
	function yuki_magazine_featured_image_background_overlay() {
		return [
			'type'     => 'gradient',
			'gradient' => 'linear-gradient(180deg,rgba(24,24,27,0.26) 0%,rgba(24,24,27,0.73) 100%)',
			'color'    => 'var(--yuki-accent-active)',
		];
	}
}
add_filter( 'yuki_post_featured_image_background_overlay_default_value', 'yuki_magazine_featured_image_background_overlay' );
