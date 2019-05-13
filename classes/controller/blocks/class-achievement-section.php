<?php

namespace P4NLBKS\Controllers\Blocks;

if ( ! class_exists( 'Achievement_Section_Controller' ) ) {
	/**
	 * @noinspection AutoloadingIssuesInspection
	 */

	/**
	 * Class Achievement_Section_Controller
	 *
	 * @package P4NLBKS\Controllers\Blocks
	 */
	class Achievement_Section_Controller extends Controller {

		/** @const string BLOCK_NAME */
		const BLOCK_NAME = 'achievement_section';

		/** @const string DEFAULT_LAYOUT */
		const DEFAULT_LAYOUT = 'default';

		/**
		 * Shortcode UI setup for the noindexblock shortcode.
		 * It is called when the Shortcake action hook `register_shortcode_ui` is called.
		 */
		public function prepare_fields() {

			$fields = [
				[
					'label' => __( 'Title', 'planet4-gpnl-blocks' ),
					'attr'	=> 'title',
					'type'	=> 'text',
					'meta'	=> [
						'placeholder' => __( 'Title', 'planet4-gpnl-blocks' ),
						'data-plugin' => 'planet4-gpnl-blocks',
					],
				],
				[
					'label' => __( 'Subtitle', 'planet4-gpnl-blocks' ),
					'attr'	=> 'subtitle',
					'type'	=> 'text',
					'meta'	=> [
						'placeholder' => __( 'Subtitle', 'planet4-gpnl-blocks' ),
						'data-plugin' => 'planet4-gpnl-blocks',
					],
				],
				[
					'label' => __( 'Description', 'planet4-gpnl-blocks' ),
					'attr'	=> 'description',
					'type'	=> 'textarea',
					'meta'	=> [
						'placeholder' => __( 'Description', 'planet4-gpnl-blocks' ),
						'data-plugin' => 'planet4-gpnl-blocks',
					],
				],
				[
					'label' => __( 'Background image', 'planet4-gpnl-blocks' ),
					'attr'		  => 'bg_img',
					'type'		  => 'attachment',
					'libraryType' => array( 'image' ),
					'addButton'	  => __( 'Select image', 'planet4-gpnl-blocks' ),
					'frameTitle'  => __( 'Select image', 'planet4-gpnl-blocks' ),
				],
			];

			// Define the Shortcode UI arguments.
			$shortcode_ui_args = [
				'label'			=> __( 'LATTE | Achievement Section', 'planet4-gpnl-blocks' ),
				'listItemImage' => '<img src="' . esc_url( plugins_url() . '/planet4-gpnl-plugin-blocks/admin/img/latte.png' ) . '" />',
				'attrs'			=> $fields,
				'post_type'		=> P4NLBKS_ALLOWED_PAGETYPE,
			];

			shortcode_ui_register_for_shortcode( 'shortcake_' . self::BLOCK_NAME, $shortcode_ui_args );

		}

		/**
		 * Get all the data that will be needed to render the block correctly.
		 *
		 * @param array	 $attributes This is the array of fields of this block.
		 * @param string $content This is the post content.
		 * @param string $shortcode_tag The shortcode tag of this block.
		 *
		 * @return array The data to be passed in the View.
		 */
		public function prepare_data( $attributes, $content = '', $shortcode_tag = 'shortcake_' . self::BLOCK_NAME ) : array {

			$formatted_posts = [];

			if( isset( $attributes[ 'bg_img' ] ) ) {
				$attributes[ 'bg_img' ] = wp_get_attachment_url( $attributes[ 'bg_img' ] );
			}

			$posts = get_posts( array(
				'order'		  => 'desc',
				'orderby'	  => 'date',
				'post_type'	  => 'post',
				'numberposts' => 4,
				'tax_query' => array(
					array(
						'taxonomy' => 'special_attribute',
						'field' => 'slug',
						'terms' => 'achievement',
					)
				)
			) );

			if( $posts ) {
				foreach( $posts as $post ) {
					$post = (array) $post;
					if ( has_post_thumbnail( $post['ID'] ) ) {
						$img_id = get_post_thumbnail_id( $post['ID'] );
						$img_data = wp_get_attachment_image_src( $img_id , 'medium_large' );
						$post['img_url'] = $img_data[0];
					}
					$formatted_posts[] = $post;
				}
			}

			$attributes['posts'] = $formatted_posts;

			$attributes['layout'] = isset( $attributes['layout'] ) ? $attributes['layout'] : self::DEFAULT_LAYOUT;

			return [
				'fields' => $attributes,
			];

		}

		/**
		 * Callback for the shortcake_noindex shortcode.
		 * It renders the shortcode based on supplied attributes.
		 *
		 * @param array	 $fields		Array of fields that are to be used in the template.
		 * @param string $content		The content of the post.
		 * @param string $shortcode_tag The shortcode tag (shortcake_blockname).
		 *
		 * @return string The complete html of the block
		 */
		public function prepare_template( $fields, $content, $shortcode_tag ) : string {

			$data = $this->prepare_data( $fields );

			// Shortcode callbacks must return content, hence, output buffering here.
			ob_start();

			$this->view->block( self::BLOCK_NAME, $data );
			// echo '<pre>' . print_r($data, true) . '</pre>';

			return ob_get_clean();
		}


	}
}
