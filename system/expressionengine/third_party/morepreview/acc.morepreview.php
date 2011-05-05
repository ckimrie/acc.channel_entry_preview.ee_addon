<?php


/**
 * Moresoda Channel Entries Preview Accessory
 *
 * @package default
 * @author Christopher Imrie
 */
class Morepreview_acc {

	var $name			= 'morePreview';
	var $id				= 'morepreview';
	var $version		= '1.0';
	var $description	= 'Allows you to preview new channel entries immediately after publishing. <br/><br/>Ensure you have set the <em>Live Look Template</em> in each Channel\'s settings to enable the preview window.';
	var $sections		= array();

	/**
	 * Constructor
	 */
	function __construct()
	{
		$this->EE =& get_instance();
		
		
		//Only initialize if we are on the view entry page
		if(	$this->EE->input->get('D') == "cp" && 	$this->EE->input->get('C') == "content_publish" &&	$this->EE->input->get('M') == "view_entry"){
			$this->init();
		}
		
		//Hide the Preview Channel Entries tab on all pages
		$this->hide_accessory_tab();
		
	}
	
	
	
	
	
	
	/**
	 * Initialize the accessory
	 *
	 * Loads the JS that does all the work
	 *
	 * @access	public
	 * @return	void
	 */
	function init()
	{	
		//Check the database to see if this entry has a live look template setup
		$this->EE->db->where('channel_id', $this->EE->input->get('channel_id'));
		$this->EE->db->where('live_look_template !=', 0);
		$this->EE->db->limit(1);
		$q = $this->EE->db->get('channels');
		
		//If there is one, load up the JS
		if($q->num_rows() > 0){
			$this->EE->cp->load_package_js('morepreview');
		}
		
	}
	
	
	
	/**
	 * Hide the accessory tab
	 *
	 * @return void
	 * @author Christopher Imrie
	 */
	public function hide_accessory_tab()
	{
		$this->EE->cp->load_package_js('hide_tab');
	}
	
	
	
	
	/**
	 * Set Sections
	 *
	 * Needed for this class to work, otherwise EE throws a hissy fit...
	 *
	 * @access	public
	 * @return	void
	 */
	function set_sections()
	{
		//DO NOTHING
	}
}
// END CLASS




















