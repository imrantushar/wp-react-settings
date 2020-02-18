<?php
namespace WPRS\INC\RESTAPI;


class Endpoint {
    /**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     0.8.1
	 */
	private function __construct() {
		$this->plugin_slug = WP_REACT_SETTINGS_SLUG;
	}

    /**
     * Set up WordPress hooks and filters
     *
     * @return void
     */
    public function do_hooks() {
        add_action( 'rest_api_init', array( $this, 'register_routes' ) );
    }

	/**
	 * Return an instance of this class.
	 *
	 * @since     0.8.1
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
			self::$instance->do_hooks();
		}

		return self::$instance;
	}

    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes() {
        $version = '1';
        $namespace = $this->plugin_slug . '/v' . $version;
        $endpoint = '/wprs/';

        register_rest_route( $namespace, $endpoint, array(
            array(
                'methods'               => \WP_REST_Server::READABLE,
                'callback'              => array( $this, 'get_wprs' ),
                'permission_callback'   => array( $this, 'wprs_permissions_check' ),
                'args'                  => array(),
            ),
        ) );

        register_rest_route( $namespace, $endpoint, array(
            array(
                'methods'               => \WP_REST_Server::CREATABLE,
                'callback'              => array( $this, 'update_wprs' ),
                'permission_callback'   => array( $this, 'wprs_permissions_check' ),
                'args'                  => array(),
            ),
        ) );

        register_rest_route( $namespace, $endpoint, array(
            array(
                'methods'               => \WP_REST_Server::EDITABLE,
                'callback'              => array( $this, 'update_wprs' ),
                'permission_callback'   => array( $this, 'wprs_permissions_check' ),
                'args'                  => array(),
            ),
        ) );

        register_rest_route( $namespace, $endpoint, array(
            array(
                'methods'               => \WP_REST_Server::DELETABLE,
                'callback'              => array( $this, 'delete_wprs' ),
                'permission_callback'   => array( $this, 'wprs_permissions_check' ),
                'args'                  => array(),
            ),
        ) );

    }

    /**
     * Get wprs
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function get_wprs( $request ) {
        $wprs_option = get_option( 'wprs_simple_setting' );

        // Don't return false if there is no option
        if ( ! $wprs_option ) {
            return new \WP_REST_Response( array(
                'success' => true,
                'value' => ''
            ), 200 );
        }

        return new \WP_REST_Response( array(
            'success' => true,
            'value' => $wprs_option
        ), 200 );
    }

    /**
     * Create OR Update wprs
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function update_wprs( $request ) {
        $updated = update_option( 'wprs_simple_setting', $request->get_param( 'wprsSetting' ) );

        return new \WP_REST_Response( array(
            'success'   => $updated,
            'value'     => $request->get_param( 'wprsSetting' )
        ), 200 );
    }

    /**
     * Delete wprs
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function delete_wprs( $request ) {
        $deleted = delete_option( 'wprs_simple_setting' );

        return new \WP_REST_Response( array(
            'success'   => $deleted,
            'value'     => ''
        ), 200 );
    }

    /**
     * Check if a given request has access to update a setting
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool
     */
    public function wprs_permissions_check( $request ) {
        return current_user_can( 'manage_options' );
    }
}
