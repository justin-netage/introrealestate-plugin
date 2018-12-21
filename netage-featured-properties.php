<?php 

/* 
 *
 *  Plugin Name: Featured Properties
 *  PLugin URI: http://netage.co.za
 *  Description: A custom plugin designed to set featured properties on introrealestate.
 *  Version: 1.0
 *  Author: Justin Hammond
 *  Author URI: http://netage.co.za
 *  License: GPL2 
 * 
 */

 /**
  *  Add a link to our plugin in the admin menu
  *  under 'Settings > Featured Properties
  */

  /**
   *  Assign global variables
   */

  $plugin_url = WP_PLUGIN_URL . '/netage-featured-properties';
  $options = array();
  $display_json = false;

  function netage_featured_properties_menu() {
      /**
       *  Use the add_options_page function
       *  add_options_page( $page_title, $menu_title, $capability, $menue-slug, $function )
       * 
       */

       add_options_page(
           'Netage Featured Properties Plugin',
           'Featured Properties',
           'manage_options',
           'netage-featured-properties',
           'netage_featured_properties_options_page'
       );

  }

  add_action( 'admin_menu', 'netage_featured_properties_menu');

  function netage_featured_properties_options_page() {
      if ( !current_user_can( 'manage_options' )) {
          wp_die( 'You dont have sufficient permission to access this page.' );
      }

      global $wpdb;

      $results = $wpdb->get_results( "SELECT name, id, property_address FROM wp_property" );

      $current_featured_properties = $wpdb->get_results( "SELECT wp_property.id, wp_property.name, wp_property.property_address
      FROM `wp_property`
      INNER JOIN wp_featured_properties ON wp_property.id=wp_featured_properties.property_id;" );

      $property_with_images = $wpdb->get_results( "SELECT wp_property.id, wp_property.name, wp_property.property_address, wp_property_images.imagepath FROM `wp_property` INNER JOIN wp_property_images ON wp_property.id=wp_property_images.property_id INNER JOIN wp_featured_properties ON wp_property.id=wp_featured_properties.property_id GROUP BY wp_property.id;");

      if( isset( $_POST['featured_properties_form_submitted'] ) ) {
        $hidden_field = esc_html($_POST['featured_properties_form_submitted']);

        if( $hidden_field == 'Y') {

            $new_featured_properties = $_POST['properties_ids'];
            $table_name = $wpdb->prefix . "featured_properties";
            $time_added = time();

            if($new_featured_properties) {
              $wpdb->query('TRUNCATE TABLE ' . $table_name);

              foreach($new_featured_properties as $key=>$property_id) {
                if($property_id) {
                  $sql = "INSERT INTO $table_name ( `time`, `property_id`, `carousel_position` )
                  VALUES ($time_added, $property_id, $key);";
                  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                  dbDelta( $sql );
                }
       
              }

            }
            
        }


      }      
      require( 'inc/options-page-wrapper.php' );
  }

  
  /**
   *  Shortcode for slider to display featured properties
   */

  function netage_featured_properties_shortcode($atts, $content = null) {
    
    global $wpdb;

    $property_with_images = $wpdb->get_results( "SELECT wp_property.id, wp_property.name, wp_property.listed_price,
                                                        wp_property_suburbs.name AS suburb, wp_property_area.name as area,
                                                        wp_property.property_address, wp_property_images.imagepath, wp_property.number_of_bedrooms,
                                                        wp_property.number_of_bathrooms, wp_property.seoname
                                                  FROM `wp_property` 
                                                  INNER JOIN wp_property_suburbs ON wp_property.suburb_id=wp_property_suburbs.id
                                                  INNER JOIN wp_property_area ON wp_property.area_id=wp_property_area.id
                                                  INNER JOIN wp_property_images ON wp_property.id=wp_property_images.property_id 
                                                  INNER JOIN wp_featured_properties ON wp_property.id=wp_featured_properties.property_id 
                                                  GROUP BY wp_property.id;");

    ob_start();

    require('inc/properties-carousel.php');

    $content = ob_get_clean();

    return $content;

  } 

  add_shortcode( 'display_featured_properties', 'netage_featured_properties_shortcode');

  function netage_featured_properties_styles() {
    wp_enqueue_style( 'netage_featured_properties_styles_1', plugins_url( 'netage-featured-properties/assets/select2-4.0.6-rc.1/dist/css/select2.min.css' ) );

  }

  add_action( 'admin_head', 'netage_featured_properties_styles' );

  function netage_featured_properties_page_scripts() {
    // wp_enqueue_script( 'netage_featured_properties_scripts_4', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'netage_featured_properties_scripts_3', plugins_url( 'netage-featured-properties/assets/js/netage-featured-properties-public.js' ), array('jquery'), '', true );
    wp_enqueue_script( 'netage_featured_properties_scripts_2', plugins_url( 'netage-featured-properties/assets/slick-1.8.1/slick/slick.min.js' ), array('jquery'), '', true );

  }

  add_action('wp_footer', 'netage_featured_properties_page_scripts');

  function netage_featured_properties_page_styles() {
    wp_enqueue_style( 'netage_featured_properties_styles_2', plugins_url( 'netage-featured-properties/assets/slick-1.8.1/slick/slick-theme.css' ) );
    wp_enqueue_style( 'netage_featured_properties_style_3', plugins_url( 'netage-featured-properties/assets/slick-1.8.1/slick/slick.css' ) );
    wp_enqueue_style( 'netage_featured_properties_style_5', plugins_url( 'netage-featured-properties/assets/css/netage-featured-properties-public.css' ) );

  }

  add_action('wp_head', 'netage_featured_properties_page_styles');

  function netage_featured_properties_scripts() {
    wp_enqueue_script( 'netage_featured_properties_scripts_1', plugins_url( 'netage-featured-properties/assets/select2-4.0.6-rc.1/dist/js/select2.min.js' ), array('jquery'), '', true );

  }

  add_action( 'admin_head', 'netage_featured_properties_scripts');

  function netage_featured_properties_external_scripts() {
      wp_enqueue_script( 'netage_featured_properties_external_scripts', plugins_url( 'netage-featured-properties/assets/js/netgage-featured-properties.js'), array('jquery'), '', true );
  }

  add_action( 'admin_footer', 'netage_featured_properties_external_scripts' );

 /**
  *   When plugin is activated create table for featured properties if it does not exist.
  */

  function featured_properties_activate() {

    global $wpdb;

    $table_name = $wpdb->prefix . "featured_properties";

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      property_id mediumint(9) NOT NULL,
      carousel_position mediumint(9) NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

  }

  register_activation_hook( __FILE__, 'featured_properties_activate' );

/**
 *   When the plugin is deactivated, drop the table from the database.
 */

  function featured_properties_deactivate() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'featured_properties';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);
    delete_option("my_plugin_db_version");
  }

  register_deactivation_hook( __FILE__, 'featured_properties_deactivate' );

?>