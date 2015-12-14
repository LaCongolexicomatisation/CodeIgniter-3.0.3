<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_mmessage');
	}

	public function connexion()
	{
		$this->load->model("model_Utilisateur",true);
		switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				$this->load->view('connexion');
				break;
			case 'POST':
				if($_POST['login']){
					$user=model_Utilisateur::getByLogin($_POST['login']);
					if($user){
						if($user->password()==$_POST['mdp']){
							$_SESSION['login']=$user->login();
							$_SESSION['rang']=$user->rang();
							redirect(base_url());
							break;
						}else{
							$_SESSION['erreur']="<label><font color='red'> Mauvais mot de passe</font></label>";
						}
					}
					else{
						$_SESSION['erreur']="<label><font color='red'> Utilisateur innexistant</font></label>";
					}
					$this->load->view('connexion');
					unset($_SESSION['erreur']);
					break;
				}
				else{
					$_SESSION['erreur']="<label><font color='red'> Utilisateur innexistant</font></label>";
					$this->load->view('connexion');
					unset($_SESSION['erreur']);
					break;
				}
		}
	}

	public function deconnexion(){
		unset($_SESSION['login']);
		unset($_SESSION['rang']);
		redirect(base_url());
	}

}
