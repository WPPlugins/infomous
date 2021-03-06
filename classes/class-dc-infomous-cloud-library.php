<?php
class DC_Infomous_Cloud_Library {
  
  public $lib_path;
  
  public $lib_url;
  
  public $php_lib_path;
  
  public $php_lib_url;
  
  public $jquery_lib_path;
  
  public $jquery_lib_url;

	public function __construct() {
	  global $DC_Infomous_Cloud;
	  
	  $this->lib_path = $DC_Infomous_Cloud->plugin_path . 'lib/';

    $this->lib_url = $DC_Infomous_Cloud->plugin_url . 'lib/';
    
    $this->php_lib_path = $this->lib_path . 'php/';
    
    $this->php_lib_url = $this->lib_url . 'php/';
    
    $this->jquery_lib_path = $this->lib_path . 'jquery/';
    
    $this->jquery_lib_url = $this->lib_url . 'jquery/';
	}
	
	/**
	 * PHP WP fields Library
	 */
	public function load_wp_fields() {
	  global $DC_Infomous_Cloud;
	  if ( ! class_exists( 'DC_WP_Fields' ) )
	    require_once ($this->php_lib_path . 'class-dc-wp-fields.php');
	  $DC_WP_Fields = new DC_WP_Fields(); 
	  return $DC_WP_Fields;
	}
	
	/**
	 * Jquery qTip library
	 */
	public function load_qtip_lib() {
	  global $DC_Infomous_Cloud;
	  wp_enqueue_script('qtip_js', $this->jquery_lib_url . 'qtip/qtip.js', array('jquery'), $DC_Infomous_Cloud->version, true);
		wp_enqueue_style('qtip_css',  $this->jquery_lib_url . 'qtip/qtip.css', array(), $DC_Infomous_Cloud->version);
	}
	
	/**
	 * WP Media library
	 */
	public function load_upload_lib() {
	  global $DC_Infomous_Cloud;
	  wp_enqueue_media();
	  wp_enqueue_script('upload_js', $this->jquery_lib_url . 'upload/media-upload.js', array('jquery'), $DC_Infomous_Cloud->version, true);
	  wp_enqueue_style('upload_css',  $this->jquery_lib_url . 'upload/media-upload.css', array(), $DC_Infomous_Cloud->version);
	}
	
	/**
	 * WP ColorPicker library
	 */
	public function load_colorpicker_lib() {
	  global $DC_Infomous_Cloud;
	  wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'colorpicker_init', $this->jquery_lib_url . 'colorpicker/colorpicker.js', array( 'jquery', 'wp-color-picker' ), $DC_Infomous_Cloud->version, true );
    wp_enqueue_style( 'wp-color-picker' );
	}
}
