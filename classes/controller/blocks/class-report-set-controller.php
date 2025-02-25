<?php
/**
 * Report Set Module (Homepage B Version 5th Screen, Top Part)
 *
 * @package P4EABKS
 * @since 0.1
 */

namespace P4EABKS\Controllers\Blocks;

if ( ! class_exists( 'Report_Set_Controller' ) ) {
	/**
	 * Class Report_Set_Controller
	 *
	 * @package P4EABKS\Controllers\Blocks
	 */
	class Report_Set_Controller extends Controller {

		/**
		 * The block name constant.
		 *
		 * @const string BLOCK_NAME
		 */
		const BLOCK_NAME = 'report_set';

		/**
		 * Shortcode UI setup for the noindexblock shortcode.
		 * It is called when the Shortcake action hook `register_shortcode_ui` is called.
		 */
		public function prepare_fields() {

			$fields = [
				[
					'label' => __( 'Section title', 'planet4-gpea-blocks-backend' ),
					'attr'  => 'title',
					'type'  => 'text',
					'meta'  => [
						'placeholder' => __( 'Section title', 'planet4-gpea-blocks-backend' ),
						'data-plugin' => 'planet4-gpea-blocks',
					],
				],
				[
					'label' => __( 'Title 1', 'planet4-gpea-blocks-backend' ),
					'attr'  => 'title_1',
					'type'  => 'text',
					'meta'  => [
						'placeholder' => __( 'Title 1', 'planet4-gpea-blocks-backend' ),
						'data-plugin' => 'planet4-gpea-blocks',
					],
				],
				[
					'label' => __( 'Paragraph 1', 'planet4-gpea-blocks-backend' ),
					'attr'  => 'paragraph_1',
					'type'  => 'textarea',
					'meta'  => [
						'placeholder' => __( 'Paragraph 1', 'planet4-gpea-blocks-backend' ),
						'data-plugin' => 'planet4-gpea-blocks',
					],
				],
				[
					'label' => __( 'Title 2', 'planet4-gpea-blocks-backend' ),
					'attr'  => 'title_2',
					'type'  => 'text',
					'meta'  => [
						'placeholder' => __( 'Title 2', 'planet4-gpea-blocks-backend' ),
						'data-plugin' => 'planet4-gpea-blocks',
					],
				],
				[
					'label' => __( 'Paragraph 2', 'planet4-gpea-blocks-backend' ),
					'attr'  => 'paragraph_2',
					'type'  => 'textarea',
					'meta'  => [
						'placeholder' => __( 'Paragraph 2', 'planet4-gpea-blocks-backend' ),
						'data-plugin' => 'planet4-gpea-blocks',
					],
				],
				[
					'label' => __( 'Button 1 link', 'planet4-gpea-blocks-backend' ),
					'attr'  => 'button_1_link',
					'type'  => 'url',
					'meta'  => [
						'placeholder' => __( 'Button 1 link', 'planet4-gpea-blocks-backend' ),
						'data-plugin' => 'planet4-gpea-blocks',
					],
				],
				[
					'label' => __( 'Button 1 label', 'planet4-gpea-blocks-backend' ),
					'description' => sprintf(__( 'Leave empty to use default: "%s".', 'planet4-gpea-blocks-backend' ), __( 'Annual report', 'planet4-gpea-blocks' )),
					'attr'  => 'button_1_text',
					'type'  => 'text',
					'meta'  => [
						'placeholder' => __( 'Button 1 label', 'planet4-gpea-blocks-backend' ),
						'data-plugin' => 'planet4-gpea-blocks',
					],
				],
				[
					'label' => __( 'Button 2 link', 'planet4-gpea-blocks-backend' ),
					'attr'  => 'button_2_link',
					'type'  => 'url',
					'meta'  => [
						'placeholder' => __( 'Button 2 link', 'planet4-gpea-blocks-backend' ),
						'data-plugin' => 'planet4-gpea-blocks',
					],
				],
				[
					'label' => __( 'Button 2 label', 'planet4-gpea-blocks-backend' ),
					'description' => sprintf(__( 'Leave empty to use default: "%s".', 'planet4-gpea-blocks-backend' ), __( 'See all reports', 'planet4-gpea-blocks' )),
					'attr'  => 'button_2_text',
					'type'  => 'text',
					'meta'  => [
						'placeholder' => __( 'Button 2 label', 'planet4-gpea-blocks-backend' ),
						'data-plugin' => 'planet4-gpea-blocks',
					],
				],
				[
					'label' => __( 'Report Cover', 'planet4-gpea-blocks-backend' ),
					'attr'        => 'book_img',
					'type'        => 'attachment',
					'libraryType' => array( 'image' ),
					'addButton'   => __( 'Select image', 'planet4-gpea-blocks-backend' ),
					'frameTitle'  => __( 'Select image', 'planet4-gpea-blocks-backend' ),
				],	
			];

			// Define the Shortcode UI arguments.
			$shortcode_ui_args = [
				'label'         => __( 'GPEA | Report Set', 'planet4-gpea-blocks-backend' ),
				'listItemImage' => '<img src="' . esc_url( plugins_url() . '/planet4-gpea-plugin-blocks/admin/img/report-set-block.jpg' ) . '" />',
				'attrs'         => $fields,
				'post_type'     => P4EABKS_ALLOWED_PAGETYPE,
			];

			shortcode_ui_register_for_shortcode( 'shortcake_' . self::BLOCK_NAME, $shortcode_ui_args );

		}

		/**
		 * Get all the data that will be needed to render the block correctly.
		 *
		 * @param array  $attributes This is the array of fields of this block.
		 * @param string $content This is the post content.
		 * @param string $shortcode_tag The shortcode tag of this block.
		 *
		 * @return array The data to be passed in the View.
		 */
		public function prepare_data( $attributes = '', $content = '', $shortcode_tag = 'shortcake_' . self::BLOCK_NAME ) : array {

			if(!is_array($attributes)) {
				$attributes = [];
			}

			if ( isset( $attributes['book_img'] ) ) {
				$attributes['book_img'] = wp_get_attachment_url( $attributes['book_img'] );
			}

			return [
				'static_fields' => $attributes,
				'default_button_1_label' => __( 'Annual report', 'planet4-gpea-blocks' ),
				'default_button_2_label' => __( 'See all reports', 'planet4-gpea-blocks' ),
			];

		}

		/**
		 * Callback for the shortcake_noindex shortcode.
		 * It renders the shortcode based on supplied attributes.
		 *
		 * @param array  $fields        Array of fields that are to be used in the template.
		 * @param string $content       The content of the post.
		 * @param string $shortcode_tag The shortcode tag (shortcake_blockname).
		 *
		 * @return string The complete html of the block
		 */
		public function prepare_template( $fields, $content, $shortcode_tag ) : string {

			$data = $this->prepare_data( $fields );

			// Shortcode callbacks must return content, hence, output buffering here.
			ob_start();
			$this->view->block( self::BLOCK_NAME, $data );
			return ob_get_clean();
		}
	}
}
