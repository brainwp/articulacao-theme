<?php
/* Brasa_User_Permissions */
class Brasa_User_Permissions{

	public $page_template = '';


	public function __construct(){

		add_action( 'get_header', array(&$this, 'remove_user'), 999999999 );
	}
	private function get_user_role() {
		global $current_user;

		$user_roles = $current_user->roles;
		$user_role = array_shift($user_roles);

		return $user_role;
	}
	public function set_cap_to_allow($caps = array()){
		$this->caps = $caps;
	}
	public function set_redirect_url($url){
		$this->redirect_url = $url;
	}
	public function remove_user(){
		if(is_admin())
			return;
		global $pagenow;
		if(in_array($this->get_user_role(), $this->caps))
			return;
		if(is_page_template($this->page_template))
			return;
		if($pagenow && $pagenow == 'wp-login.php')
			return;
		if(is_page())
			return;
		if(!empty($this->redirect_url)){
			wp_redirect($this->redirect_url);
		}
		else{
			wp_redirect(home_url());
		}
	}
}
?>
