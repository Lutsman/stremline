<?php
/**
 * @package		streamline
 * @subpackage	Widget Class
 * @author		<[email address]>Cherry Team <cherryframework@gmail.com>
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

if ( !class_exists( 'streamline_Image_Grid_Widget' ) ) {

	/**
	 * Image Grid Widget
	 */
	class streamline_Image_Grid_Widget extends Cherry_Abstract_Widget {

		/**
		 * Image grid widget constructor
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			$this->widget_name			= esc_html__( 'Image Grid Widget', 'streamline' );
			$this->widget_description	= esc_html__( 'This widget displays images from post.', 'streamline' );
			$this->widget_id			= 'widget-image-grid';
			$this->widget_cssclass		= 'widget-image-grid';

			$this->settings				= array(
				'title'	=> array(
					'type'				=> 'text',
					'value'				=> '',
					'label'				=> esc_html__( 'Widget title', 'streamline' ),
				),
				'terms_type' => array(
					'type'				=> 'radio',
					'value'				=> 'category_name',
					'options'			=> array(
						'category_name' => array(
							'label'		=> esc_html__( 'Category', 'streamline' ),
						),
						'tag' => array(
							'label'		=> esc_html__( 'Tag', 'streamline' ),
						),
					),
					'label'				=> esc_html__( 'Choose taxonomy type', 'streamline' ),
				),
				'category_name' => array(
					'type'				=> 'select',
					'multiple'			=> true,
					'value'				=> '',
					'options'			=> false,
					'options_callback'	=> array( $this, 'get_terms_list', array('category') ),
					'label'				=> esc_html__( 'Select categories to show', 'streamline' ),
				),
				'tag' => array(
					'type'				=> 'select',
					'multiple'			=> true,
					'value'				=> '',
					'options'			=> false,
					'options_callback'	=> array( $this, 'get_terms_list', array('post_tag') ),
					'label'				=> esc_html__( 'Select tags to show', 'streamline' ),
				),
				'post_sort' => array(
					'type'				=> 'select',
					'value'				=> 'date',
					'options'		=> array(
						'date' 				=> esc_html__( 'Publish Date', 'streamline' ),
						'title'				=> esc_html__( 'Post Title', 'streamline' ),
						'comment_count'		=> esc_html__( 'Comment Count', 'streamline' ),
					),
					'label'				=> esc_html__( 'Post sorted', 'streamline' ),
				),
				'post_number' => array(
					'type'				=> 'stepper',
					'value'				=> '5',
					'max_value'			=> '100',
					'min_value'			=> '1',
					'step_value'		=> '1',
					'label'				=> esc_html__( 'Posts number', 'streamline' ),
				),
				'post_offset' => array(
					'type'				=> 'stepper',
					'value'				=> '0',
					'max_value'			=> '10000',
					'min_value'			=> '0',
					'step_value'		=> '1',
					'label'				=> esc_html__( 'Offset post', 'streamline' ),
				),
				'title_length' => array(
					'type'				=> 'stepper',
					'value'				=> '10',
					'max_value'			=> '500',
					'min_value'			=> '0',
					'step_value'		=> '1',
					'label'				=> esc_html__( 'Title words length ( Set 0 to hide title. )', 'streamline' ),
				),
				'columns_number' => array(
					'type'				=> 'stepper',
					'value'				=> '3',
					'max_value'			=> '4',
					'min_value'			=> '1',
					'step_value'		=> '1',
					'label'				=> esc_html__( 'Columns number', 'streamline' ),
				),
				'items_padding' => array(
					'type'				=> 'stepper',
					'value'				=> '5',
					'max_value'			=> '50',
					'min_value'			=> '0',
					'step_value'		=> '1',
					'label'				=> esc_html__( 'Items padding ( size in pixels )', 'streamline' ),
				),
			);

			$this->get_terms_list();

			parent::__construct();

		}

		/**
		 * Retur post terms
		 *
		 * @since  1.0.0
		 * @return terms array
		 */
		public function get_terms_list ( $tax = 'category' ) {
			$output_terms = array();
			$terms = get_terms( $tax, array(
				'hide_empty'	=> 0,
				'hierarchical'	=> 0,
			));

			if ( $terms ){
				foreach ( $terms as $term ) {
					$output_terms[ $term->slug ] = $term->name;
				}
			}

			return $output_terms;
		}

		/**
		 * Get post title
		 *
		 * @since  1.0.0
		 * @return string
		 */
		public function get_post_title( $post, $instance ) {
			$title = '' ;

			if( '0' !== $instance['title_length'] ){
				$title = wp_trim_words( $post->post_title, $instance['title_length'], esc_html__( ' ...', 'streamline' ) );
			}

			return $title;
		}

		/**
		 * Get post permalink
		 *
		 * @since  1.0.0
		 * @return string
		 */
		public function get_post_permalink() {
			return esc_url( get_the_permalink() );
		}

		/**
		 * Get post permalink
		 *
		 * @since  1.0.0
		 * @return string
		 */
		public function get_post_date() {
			$post_format = get_option( 'date_format' );
			$time = get_the_time( $post_format );

			return '<time class="entry-date published" datetime="' . get_the_time( 'Y-m-d\TH:i:sP' ) . '">' . $time . '</time>';
		}

		/**
		 * Get post image
		 *
 		 * @since  1.0.0
		 * @return string
		 */
		public function get_post_image( $post, $image_size ) {
			$image = get_the_post_thumbnail( $post->ID, $image_size );

			if( !$image ){
				global $_wp_additional_image_sizes;
				$size = $_wp_additional_image_sizes[ $image_size ];

				// Place holder defaults attr
				$placeholder_attr = apply_filters( 'streamline_image_grid_widget_placeholder_default_args',
					array(
						'width'			=> $size['width'],
						'height'		=> $size['height'],
						'background'	=> '000',
						'foreground'	=> 'fff',
						'title'			=> $size['width'] . 'x' . $size['height'],
					)
				);

				$placeholder_link = 'http://fakeimg.pl/' . $placeholder_attr['width'] . 'x' . $placeholder_attr['height'] . '/'. $placeholder_attr['background'] .'/'. $placeholder_attr['foreground'] . '/?text=' . $placeholder_attr['title'] . '';
				$image = '<img class="wp-post-image" src="' . $placeholder_link . '" alt="" title="' . $post->post_title . '">';
			}

			return $image;
		}

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 *
		 * @since  1.0.0
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			global $post;

			$args = apply_filters( 'streamline_image_grid_widget_args', $args );

			if ( $this->get_cached_widget( $args ) ) {
				return;
			}

			$template = locate_template( '/inc/widgets/tm-image-grid-widget/views/tm-image-grid-view.php', false, false );
			
			if ( empty( $template ) ) {
				return;
			}

			ob_start();

			$this->setup_widget_data( $args, $instance );
			$this->widget_start( $args, $instance );

			$terms_type     = $instance['terms_type'];
			$title_length   = $instance['title_length'];
			$columns_number = $instance['columns_number'];
			$items_padding  = $instance['items_padding'];
			$post_offset    = $instance['post_offset'];
			$post_sort      = $instance['post_sort'];
			$post_number    = $instance['post_number'];

			if ( array_key_exists( $terms_type, $instance ) ) {
				$post_taxonomy = $instance[ $terms_type ];

				if( $post_taxonomy ){
					$post_args = array(
						'post_type'		=> 'post',
						'offset'		=> $post_offset,
						'orderby'		=> $post_sort,
						'order'			=> apply_filters( 'streamline_order_image_grid_widget', 'DESC' ),//ASC
						'numberposts'	=> ( int ) $post_number,
					);
					$post_args[ $terms_type ] = implode( ',', $post_taxonomy );

					$posts = get_posts( $post_args );
				}
			}

			if ( isset( $posts ) && $posts ) {
				$columns_class = 4 < $columns_number ? 3 : ( int ) ( 12 / $columns_number ) ;
				$row_inline_style = '';
				$inline_style = '';

				if( '0' !== $items_padding ){
					$row_inline_style = 'style="margin-left:-' . $items_padding . 'px"';
					$inline_style = 'style="margin: 0 0 ' . $items_padding . 'px ' . $items_padding . 'px;"';
				}

				echo apply_filters( 'streamline_image_grid_widget_before', '<div class="row image_grid_widget-main columns-number-' . $columns_number . '" ' . $row_inline_style . '>' );

				foreach ( $posts as $post ) {
					setup_postdata( $post );

					$image = $this->get_post_image( $post, apply_filters( 'streamline_image_grid_widget_size', 'streamline-thumb-536-411' ) );
					$permalink = $this->get_post_permalink();
					$title = $this->get_post_title( $post, $instance );
					$date = $this->get_post_date();
					$date = sprintf( _x( '%s ago', '%s = human-readable time difference', 'streamline' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );


					$view_dir = locate_template( 'inc/widgets/tm-image-grid-widget/views/tm-image-grid-view.php' );
					if ( $view_dir ){
						require( $view_dir );
					}

				}

				echo apply_filters( 'streamline_image_grid_widget_after', '</div>' );
			}

			$this->widget_end( $args );
			$this->reset_widget_data();
			wp_reset_postdata();

			echo $this->cache_widget( $args, ob_get_clean() );
		}
	}

	add_action( 'widgets_init', 'streamline_register_image_grid_widget' );
	function streamline_register_image_grid_widget() {
		register_widget( 'streamline_Image_Grid_Widget' );
	}

}