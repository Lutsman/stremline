<?php

class streamline_Smart_Slider_Widget extends Cherry_Abstract_Widget {

	/**
	 * Constructor
	 *
	 * @since  1.0.0
	 */
	public function __construct() {
		$this->widget_cssclass = 'cherry widget_smart_slider';
		$this->widget_description = esc_html__( 'Display smart slider on your site.', 'streamline' );
		$this->widget_id = 'widget_smart_slider';
		$this->widget_name = esc_html__( 'Smart Slider Widget', 'streamline' );
		$this->settings = array(
			'title' => array(
				'type'  => 'text',
				'value' => esc_html__( 'Smart Slider', 'streamline' ),
				'label' => esc_html__( 'Title', 'streamline' ),
			),
			'terms_type' => array(
				'type'				=> 'radio',
				'value'				=> 'category',
				'options'			=> array(
					'category' => array(
						'label'		=> esc_html__( 'Category', 'streamline' ),
					),
					'post_tag' => array(
						'label'		=> esc_html__( 'Tag', 'streamline' ),
					),
				),
				'label'				=> esc_html__( 'Choose taxonomy type', 'streamline' ),
			),
			'categories' => array(
				'type' => 'select',
				'size' => 1,
				'value' => '',
				'options_callback' => array( $this, 'get_terms_list', array( 'category', 'slug' ) ),
				'options' => false,
				'label' => esc_html__( 'Select category', 'streamline' ),
				'multiple' => true,
				'placeholder' => esc_html__( 'Select category', 'streamline' ),
			),
			'tags' => array(
				'type' => 'select',
				'size' => 1,
				'value' => '',
				'options_callback' => array( $this, 'get_terms_list', array( 'post_tag', 'slug' ) ),
				'options' => false,
				'label' => esc_html__( 'Select tags', 'streamline' ),
				'multiple' => true,
				'placeholder' => esc_html__( 'Select tags', 'streamline' ),
			),
			'posts_per_page' => array(
				'type' => 'stepper',
				'value' => 3,
				'max_value' => 50,
				'min_value' => 1,
				'label'  => esc_html__( 'Posts count', 'streamline' ),
			),
			'post_title' => array(
				'type' => 'switcher',
				'value' => 'true',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Display title', 'streamline' ),
			),
			'content' => array(
				'type' => 'switcher',
				'value' => 'false',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Display content', 'streamline' ),
			),
			'more_button' => array(
				'type' => 'switcher',
				'value' => 'true',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Display more button', 'streamline' ),
			),
			'more_button_text' => array(
				'type'  => 'text',
				'value' => esc_html__( 'Read more', 'streamline' ),
				'label' => esc_html__( 'More button text', 'streamline' ),
			),
			'trim_words' => array(
				'type' => 'slider',
				'value' => 15,
				'max_value' => 55,
				'min_value' => 1,
				'step_value' => 1,
				'label'  => esc_html__( 'Content words trimmed count', 'streamline' ),
			),
			'width' => array(
				'type'  => 'text',
				'value' => '100%',
				'label' => esc_html__( 'Slider width', 'streamline' ),
			),
			'height' => array(
				'type' => 'text',
				'value' => '800',
				'label' => esc_html__( 'Slider height', 'streamline' ),
			),
			'orientation' => array(
				'type' => 'select',
				'size' => 1,
				'value' => 'horizontal',
				'options' => array(
					'horizontal' => esc_html__( 'Horizontal', 'streamline' ),
					'vertical' => esc_html__( 'Vertical', 'streamline' ),
				),
				'label' => esc_html__( 'Slider orientation', 'streamline' ),
			),
			'slide_distance' => array(
				'type' => 'slider',
				'value' => 10,
				'max_value' => 100,
				'min_value' => 0,
				'label'  => esc_html__( 'Slide distance(px)', 'streamline' ),
			),
			'slide_duration' => array(
				'type' => 'slider',
				'value' => 500,
				'max_value' => 3000,
				'min_value' => 100,
				'step_value' => 100,
				'label'  => esc_html__( 'Slide duration(ms)', 'streamline' ),
			),
			'slide_fade' => array(
				'type' => 'switcher',
				'value' => 'false',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Use fade effect?', 'streamline' ),
			),
			'navigation' => array(
				'type' => 'switcher',
				'value' => 'true',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Use navigation?', 'streamline' ),
			),
			'fade_navigation' => array(
				'type' => 'switcher',
				'value' => 'true',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Indicates whether the arrows will fade in only on hover', 'streamline' ),
			),
			'pagination' => array(
				'type' => 'switcher',
				'value' => 'true',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Use pagination?', 'streamline' ),
			),
			'autoplay' => array(
				'type' => 'switcher',
				'value' => 'true',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Use autoplay?', 'streamline' ),
			),
			'fullScreen' => array(
				'type' => 'switcher',
				'value' => 'true',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Display fullScreen button?', 'streamline' ),
			),
			'shuffle' => array(
				'type' => 'switcher',
				'value' => 'false',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Indicates if the slides will be shuffled', 'streamline' ),
			),
			'loop' => array(
				'type' => 'switcher',
				'value' => 'true',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Use infinite scrolling?', 'streamline' ),
			),
			'thumbnails' => array(
				'type' => 'switcher',
				'value' => 'false',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Display thumbnails?', 'streamline' ),
			),
			'thumbnails_arrows' => array(
				'type' => 'switcher',
				'value' => 'true',
				'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
				'label' => esc_html__( 'Display thumbnails arrows?', 'streamline' ),
			),
			'thumbnails_position' => array(
				'type' => 'select',
				'size' => 1,
				'value' => 'bottom',
				'options' => array(
					'top' => esc_html__( 'Top', 'streamline' ),
					'bottom' => esc_html__( 'Bottom', 'streamline' ),
					'right' => esc_html__( 'Right', 'streamline' ),
					'left' => esc_html__( 'Left', 'streamline' ),
				),
				'label' => esc_html__( 'Sets the position of the thumbnail scroller', 'streamline' ),
			),
		);

		parent::__construct();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 9 );
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

		if ( $this->get_cached_widget( $args ) ) {
			return;
		}

		ob_start();

		$this->setup_widget_data( $args, $instance );
		$this->widget_start( $args, $instance );

		$categories_array = ( isset( $this->instance['categories'] ) ) ? $this->instance['categories'] : array();
		$tags_array = ( isset( $this->instance['tags'] ) ) ? $this->instance['tags'] : array();

		$tax_query = array();

		if ( 'category' == $this->instance['terms_type'] ) {
			if ( ( is_array( $categories_array ) && ! empty( $categories_array ) ) ) {
				array_push( $tax_query, array(
					'taxonomy'	=> 'category',
					'field'		=> 'slug',
					'terms'		=> $categories_array,
				));
			}
		} else {
			if ( ( is_array( $tags_array ) && ! empty( $tags_array ) ) ) {
				array_push( $tax_query, array(
					'taxonomy'	=> 'post_tag',
					'field'		=> 'slug',
					'terms'		=> $tags_array,
				));
			}
		}

		// The Query.
		$posts_query = $this->get_query_slider_items( array(
			'posts_per_page'	=> $this->instance['posts_per_page'],
			'tax_query'			=> $tax_query,
		) );

		$html = '';
		if ( $posts_query ) {
			$html = $this->render_slider( $posts_query );
		}

		echo $html;

		$this->widget_end( $args );
		$this->reset_widget_data();
		wp_reset_postdata();

		echo $this->cache_widget( $args, ob_get_clean() );
	}

	/**
	 * Smart Slider rendering
	 *
	 * @since  1.0.0
	 * @return string
	 */
	public function render_slider( $posts_query ) {

		$uniq_id = 'slider-pro-' . uniqid();
		$slider_html_attr = 'data-id="' . $uniq_id . '"';
		$slider_html_attr .= ' data-width="' . $this->instance['width'] . '"';
		$slider_html_attr .= ' data-height="' . $this->instance['height'] . '"';
		$slider_html_attr .= ' data-orientation="' . $this->instance['orientation'] . '"';
		$slider_html_attr .= ' data-slide-distance="' . $this->instance['slide_distance'] . '"';
		$slider_html_attr .= ' data-slide-duration="' . $this->instance['slide_duration'] . '"';
		$slider_html_attr .= ' data-slide-fade="' . $this->instance['slide_fade'] . '"';
		$slider_html_attr .= ' data-navigation="' . $this->instance['navigation'] . '"';
		$slider_html_attr .= ' data-fade-navigation="' . $this->instance['fade_navigation'] . '"';
		$slider_html_attr .= ' data-pagination="' . $this->instance['pagination'] . '"';
		$slider_html_attr .= ' data-autoplay="' . $this->instance['autoplay'] . '"';
		$slider_html_attr .= ' data-fullScreen="' . $this->instance['fullScreen'] . '"';
		$slider_html_attr .= ' data-shuffle="' . $this->instance['shuffle'] . '"';
		$slider_html_attr .= ' data-loop="' . $this->instance['loop'] . '"';
		$slider_html_attr .= ' data-thumbnails="' . $this->instance['thumbnails'] . '"';
		$slider_html_attr .= ' data-thumbnails-arrows="' . $this->instance['thumbnails_arrows'] . '"';
		$slider_html_attr .= ' data-thumbnails-position="' . $this->instance['thumbnails_position'] . '"';
		$slider_html_attr .= ' data-thumbnails-width="240"';
		$slider_html_attr .= ' data-thumbnails-height="100"';

		$html = '<div class="streamline-smartslider" ' . $slider_html_attr . '>';
			$html .= '<div id="' . $uniq_id . '" class="streamline-smartslider__instance slider-pro">';
				$html .= '<div class="streamline-smartslider__slides sp-slides">';
					$html .= $this->get_slider_loop( $posts_query );
				$html .= '</div>';

				if ( 'true' == $this->instance['thumbnails'] ) {
					$html .= '<div class="streamline-smartslider__thumbnails sp-thumbnails">';
						$html .= $this->get_slider_thumbnails( $posts_query );
					$html .= '</div>';
				}
			$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	/**
	 * Get slider items.
	 *
	 * @since  1.0.0
	 * @param  array|string $query_args Arguments to be passed to the query.
	 * @return array|bool         Array if true, boolean if false.
	 */
	public function get_query_slider_items( $query_args = array() ) {

		$defaults_query_args = apply_filters( 'streamline_smart_slider_default_query_args', array(
			'post_type'      => 'post',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'posts_per_page' => -1,
			'offset'         => 0,
			'tax_query'      => array(),
		) );

		$query_args = wp_parse_args( $query_args, $defaults_query_args );
		$query_args = array_intersect_key( $query_args, $defaults_query_args );

		// The Query.
		$posts_query = new WP_Query( $query_args );
		$this->posts_query = $posts_query;

		if ( ! is_wp_error( $posts_query ) ) {
			return $posts_query;
		} else {
			return false;
		}
	}

	/**
	 * Get slider items.
	 *
	 * @since  1.0.0
	 * @param  array $posts_query      List of WP_Post objects.
	 * @return string
	 */
	public function get_slider_loop( $posts_query ) {

		/**
		 * Title layer settings. More info https://github.com/bqworks/slider-pro/blob/master/docs/modules.md
		 *
		 * @var array
		 */
		$title_settings = apply_filters( 'streamline_smart_slider_title_settings', array(
			'class'				=> 'sp-title sp-layer',
			'width'				=> '90%',
			'horizontal'		=> '5%',
			'vertical'			=> '38%',
			'show_transition'	=> 'left',
			'show_duration'		=> 500,
			'show_delay'		=> 500,
			'hide_transition'	=> 'left',
			'hide_duration'		=> 500,
			'hide_delay'		=> 700,
		) );

		$title_attr = $this->generate_layer_attrline( $title_settings );

		/**
		 * Content layer settings. More info https://github.com/bqworks/slider-pro/blob/master/docs/modules.md
		 *
		 * @var array
		 */
		$content_settings = apply_filters( 'streamline_smart_slider_content_settings', array(
			'class'				=> 'sp-content sp-layer',
			'width'				=> '90%',
			'horizontal'		=> '5%',
			'vertical'			=> '51%',
			'show_transition'	=> 'left',
			'show_duration'		=> 500,
			'show_delay'		=> 800,
			'hide_transition'	=> 'left',
			'hide_duration'		=> 500,
			'hide_delay'		=> 400,
		) );

		$content_attr = $this->generate_layer_attrline( $content_settings );

		/**
		 * More button layer settings. More info https://github.com/bqworks/slider-pro/blob/master/docs/modules.md
		 *
		 * @var array
		 */
		$more_settings = apply_filters( 'streamline_smart_slider_more_button_settings', array(
			'class'				=> 'sp-more sp-layer',
			'width'				=> '90%',
			'horizontal'		=> '5%',
			'vertical'			=> '57%',
			'show_transition'	=> 'left',
			'show_duration'		=> 500,
			'show_delay'		=> 1100,
			'hide_transition'	=> 'left',
			'hide_duration'		=> 500,
			'hide_delay'		=> 100,
		) );

		$more_attr = $this->generate_layer_attrline( $more_settings );

		$html = '';
			if ( $posts_query->have_posts() ) {

				while ( $posts_query->have_posts() ) : $posts_query->the_post();
					$post_id    = $posts_query->post->ID;
					$date       = get_the_date();
					$post_type  = get_post_type( $post_id );
					$permalink  = get_permalink();
					$title      = get_the_title( $post_id );

					$thumb_id = get_post_thumbnail_id();
					$format = get_post_format( $post_id );
					$format = ( empty( $format ) ) ? 'post-format-standart' : 'post-format-' . $format ;

					$placeholder_args = apply_filters( 'streamline_smart_slider_placeholder_args',
						array(
							'width'			=> 1600,
							'height'		=> $this->instance['height'],
							'class'			=> 'placeholder',
						)
					);

					$image = $this->get_image( $post_id, 'full', $placeholder_args );

					$html .= '<div class="sp-slide">';
						$html .= $image;

						$trimed_content = $this->get_trimed_content( get_the_content(), (int) $this->instance['trim_words'] );

						if ( 'true' == $this->instance['post_title'] ) {
							$html .= sprintf( '<h2 %1$s><a href="' . $permalink . '">%2$s</a></h2>', $title_attr, $title );
						}
						if ( 'true' == $this->instance['content'] ) {
							$html .= sprintf( '<p %1$s>%2$s</p>', $content_attr, $trimed_content );
						}
						if ( 'true' == $this->instance['more_button'] ) {
							$html .= sprintf( '<div %1$s><a class="btn" href="' . $permalink . '">%2$s</a></div>', $more_attr, esc_html( $this->instance['more_button_text'] ) );
						}

					$html .= '</div>';

				endwhile;
			} else {
				echo '<h4>' . esc_html__( 'Posts not found', 'streamline' ) . '</h4>';
			}

		// Reset the query.
		wp_reset_postdata();

		return $html;
	}

	/**
	 * Get thumbnails images list.
	 *
	 * @since  1.0.0
	 * @param  object $posts_query   Result post query.
	 * @return string $html
	 */
	public function get_slider_thumbnails( $posts_query ) {
		$html = '';

		if ( $posts_query->have_posts() ) {
			while ( $posts_query->have_posts() ) : $posts_query->the_post();
				$post_id = $posts_query->post->ID;
				$thumb_id = get_post_thumbnail_id();

				// Get img URL
				$placeholder_args = array(
					'width'			=> 240,
					'height'		=> 100,
					'class'			=> 'placeholder',
				);


				$thumbnail_size = apply_filters( 'streamline_smart_slider_thumbnail_size', 'streamline-thumb-240-100' );
				$image = $this->get_image( $post_id, $thumbnail_size, $placeholder_args );

				$html .= '<div class="sp-thumbnail">';
					$html .= $image;
				$html .= '</div>';

			endwhile;
		}

		// Reset the query.
		wp_reset_postdata();

		return $html;
	}

	/**
	 * Get blog user list array
	 *
	 * @since  1.0.0
	 * @return array
	 */
	public function get_terms_list( $tax = 'category', $key = 'slug' ) {

		if ( 'id' === $key ) {
			foreach ( (array) get_terms( $tax, array( 'hide_empty' => false ) ) as $term ) {
				$terms[ $term->term_id ] = $term->name;
			}
		} elseif ( 'slug' === $key ) {
			$all_terms = (array) get_terms( $tax, array( 'hide_empty' => false ) );
			foreach ( $all_terms as $term ) {
				$terms[ $term->slug ] = $term->name;
			}
		}

		return $terms;
	}

	/**
	 * Get post attached image.
	 *
	 * @since  1.0.0
	 * @param  int          $id               Image id.
	 * @param  string|array $size             Image size.
	 * @param  array        $placeholder_attr Placeholder settings.
	 * @param  boolean      $only_url         Only url status.
	 * @return string                         renered img tag
	 */
	public function get_image( $id, $size, $placeholder_attr, $only_url = false ) {

		// place holder defaults attr
		$default_placeholder_attr = apply_filters( 'streamline_smart_slider_placeholder_default_args',
			array(
				'width'			=> 900,
				'height'		=> 500,
				'background'	=> 'eef4fa',
				'foreground'	=> '298ffc',
				'title'			=> '',
				'class'			=> '',
			)
		);

		$placeholder_attr = wp_parse_args( $placeholder_attr, $default_placeholder_attr );

		$image = '';

		// Check the attached image, if not attached - function replaces on the placeholder.
		if ( has_post_thumbnail( $id ) ) {
			$thumbnail_id = get_post_thumbnail_id( intval( $id ) );
			$attachment_image = wp_get_attachment_image_src( $thumbnail_id, $size );

			if ( $only_url ) {
				return $attachment_image[0];
			}

			$image_html_attrs = 'class="sp-image" src="" data-src="' . $attachment_image[0] . '"';
			$image = sprintf( '<img %s alt="">', $image_html_attrs );
		} else {
			$placeholder_link = 'http://fakeimg.pl/' . $placeholder_attr['width'] . 'x' . $placeholder_attr['height'] . '/'. $placeholder_attr['background'] .'/'. $placeholder_attr['foreground'] . '/?text=' . $placeholder_attr['title'] . '';
			$image = '<img class="sp-image ' . $placeholder_attr['class'] . '" src="' . $placeholder_link . '" alt="" title="' . $placeholder_attr['title'] . '">';
		}

		return $image;
	}

	/**
	 * Get trimmed content
	 *
	 * @since  1.0.0
	 * @param  string  $content        Post content
	 * @param  integer $excerpt_length Post content excerptlength
	 * @return string
	 */
	public function get_trimed_content( $content = '', $excerpt_length = 55 ) {
		$trimed_content = strip_shortcodes( $content );
		$trimed_content = apply_filters( 'the_content', $trimed_content );
		$trimed_content = str_replace(']]>', ']]&gt;', $trimed_content );
		$trimed_content = wp_trim_words( $trimed_content, $excerpt_length );

		return $trimed_content;
	}

	/**
	 * Slider layer attributes line generator
	 *
	 * @since  1.0.0
	 * @param  array  $settings Attributes line settings.
	 * @return [type]           [description]
	 */
	public function generate_layer_attrline( $settings = array() ) {
		if( !empty( $settings ) && is_array( $settings ) ){
			$attr_line = 'class="' . $settings['class'] . '"';
			$attr_line .= ' data-width="' . $settings['width'] . '"';
			$attr_line .= ' data-horizontal="' . $settings['horizontal'] . '"';
			$attr_line .= ' data-vertical="' . $settings['vertical'] . '"';
			$attr_line .= ' data-show-transition="' . $settings['show_transition'] . '"';
			$attr_line .= ' data-show-duration="' . $settings['show_duration'] . '"';
			$attr_line .= ' data-show-delay="' . $settings['show_delay'] . '"';
			$attr_line .= ' data-hide-transition="' . $settings['hide_transition'] . '"';
			$attr_line .= ' data-hide-duration="' . $settings['hide_duration'] . '"';
			$attr_line .= ' data-hide-delay="' . $settings['hide_delay'] . '"';
		}

		return $attr_line;
	}

	/**
	 * Enqueue javascript and stylesheet
	 *
	 * @since  4.0.0
	 */
	public function enqueue_assets() {
		wp_enqueue_script( 'jquery-slider-pro' );
		wp_enqueue_style( 'jquery-slider-pro' );
	}
}

add_action( 'widgets_init', 'streamline_register_smart_slider_widgets' );
function streamline_register_smart_slider_widgets() {
	register_widget( 'streamline_Smart_Slider_Widget' );
}