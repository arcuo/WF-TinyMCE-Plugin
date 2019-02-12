/**
 * Plugin Name: TinyMCE Contentblock starter
 * Plugin URI: 
 * Version: 1.0
 * Author: Benjamin Zachariae
 * Author URI: 
 * Description: WISEflow Doc Contentblock starter code button for TinyMCE Text editor (Not Visual editor).
 * License: 
 */

 class WF_Contentblock_Starter_Class {
     
    /**
    * Constructor. Called when the plugin is initialised.
    */
    function __construct() {
    	if ( is_admin() ) {
    		add_action( 'init', array(  $this, 'setup_tinymce_plugin' ) );
		}  
    }

    /**
	* Check if the current user can edit Posts or Pages
	* If so, add some filters so we can register our plugin
	*/
	function setup_tinymce_plugin() {
	 
		// Check if the logged in WordPress User can edit Posts or Pages
		// If not, don't register our TinyMCE plugin
		     
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
		            return;
		}
		 
		// Setup some filters
		add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_plugin' ) );
		add_filter( 'mce_buttons', array( &$this, 'add_tinymce_toolbar_button' ) );
	         
	}

	/**
	* Adds a TinyMCE plugin compatible JS file to the TinyMCE Editor instance
	*
	* @param array $plugin_array Array of registered TinyMCE Plugins
	* @return array Modified array of registered TinyMCE Plugins
	*/
	function add_tinymce_plugin( $plugin_array ) {
	 
	$plugin_array['custom_link_class'] = plugin_dir_url( __FILE__ ) . 'tinymce-custom-link-class.js';
	return $plugin_array;
	 
	}
 
}


 
$wf_contentblock_starter_class = new WF_Contentblock_Starter_Class;