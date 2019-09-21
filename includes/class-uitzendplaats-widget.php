<?php
class uzp_widget extends WP_Widget {
	/**
	 * The class used to connect to the API
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var	     Uitzendplaats_API    Used to connect to the API
	 */
	private $api;

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, __('Latest vacancies', 'uitzendplaats') );

		/**
		 * Wrapper used to connect with Curl
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'libraries/curl/curl.php';

		$curl = new Curl();

		/**
		 * The class responsible for the api
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-uitzendplaats-api.php';
		$this->api = new Uitzendplaats_API($curl);
	}

	function widget( $args, $instance ) {
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		// This is where you run the code and display the output
		$request_args = [
			'include' => array(),
			'page' => 1,
			'per_page' => 5,
		];
		$view_data = json_decode($this->api->vacancies($request_args));

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'public/templates/google.php' );

		echo $args['after_widget'];
	}
}
?>