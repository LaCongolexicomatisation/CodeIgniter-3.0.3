<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function connexion()
	{
		$this->load->model("Utilisateur",true);
		switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				$this->load->view('connexion');
				break;
			case 'POST':
				if($_POST['login']){
					$user=Utilisateur::getByLogin($_POST['login']);
					if($user){
						if($user->password() == $_POST['mdp']){
							$_SESSION['user']['login']=$user->login();
							$_SESSION['user']['rang']=$user->rang();
							header("Location:".base_url());
							exit;
							break;
						}else{
							$_SESSION['messagee']="<label><font color='red'> Mauvais mot de passe</font></label>";
						}
					}
					else{
						$_SESSION['messagee']="<label><font color='red'> Utilisateur innexistant</font></label>";
					}
					$this->load->view('connexion');
					unset($_SESSION['messagee']);
					break;
				}
				else{
					$_SESSION['messagee']="<label><font color='red'> Utilisateur innexistant</font></label>";
					$this->load->view('connexion');
					unset($_SESSION['messagee']);
					break;
				}
		}
	}

	public function deconnexion(){
		unset($_SESSION['user']);
		header("Location:".base_url());
		exit;
	}

}
