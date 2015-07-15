<?php
/* Brasa_Register_Form */
class Brasa_Register_Form{

	public $page_template = '';


	public function __construct(){
		add_action( 'template_redirect', array(&$this, 'do_check'), 999999999 );
	}
	private function do_register(){
		$args = array(
			'user_login' => $_POST['user'],
			'first_name' => $_POST['name'],
			'display_name' => $_POST['name'],
			'user_pass' => $_POST['password'],
			'user_email' => $_POST['email'],
			'user_password' => $_POST['password'],
			'role' => 'author'
		);
		$user_id = wp_insert_user( $args );
		if( !is_wp_error($user_id) ) {
			update_user_meta( $user_id, 'idade', $_POST['idade']);
			update_user_meta( $user_id, 'user_type', $_POST['user_type']);
			update_user_meta( $user_id, 'fone', $_POST['fone']);
			update_user_meta( $user_id, 'polo', $_POST['polo']);

			$args = array(
				'user_login' => $_POST['user'],
				'user_pass' => $_POST['password'],
				'user_password' => $_POST['password'],
			);
			wp_signon( $args, false );
			echo '<script>alert("Cadastro efetuado com sucesso!");</script>';
			echo '<script>window.location="'.home_url().'";</script>';
		}
	}

	public function do_check(){
		if(!isset($_POST['is_form_register']))
			return;
		if(get_user_by('login', $_POST['user'])){
			echo '<script>alert("Erro: Esse nome de usuário já está registrado");</script>';
			echo '<script>window.history.back();</script>';
			wp_die();
		}
		if(get_user_by('email', $_POST['email'])){
			echo '<script>alert("Erro: Esse nome de usuário já está registrado");</script>';
			echo '<script>window.history.back();</script>';
			wp_die();
		}
		$this->do_register();
	}
}
new Brasa_Register_Form();
?>
