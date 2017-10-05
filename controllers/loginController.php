<?php
class loginController extends controller {

	public function index() {
		$data = array();

		if (isset($_POST['submit'])) {
			$userEmail = $_POST['userEmail'];
			$userPass  = $_POST['userPass'];
		
			$user = new User();

			$user->setUserEmail($_POST['userEmail']);
			$user->setUserPass($_POST['userPass']);

			if($user->doLogin()) {
				header("Location: ".BASE);
				exit;
			} else {
				$data['error'] = 'E-mail e/ou senha errados.';
			}
		}
			
		$this->loadView('login', $data, '');
	}

	public function logout() {
		$user = new User();
		$user->logout();
		header("Location: ".BASE);
	}
}