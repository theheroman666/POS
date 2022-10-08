<?php
require_once 'models/usuario.php';

class usuarioController{
	
	public function index(){
		require_once('views/Usuarios/login.php');
	}
	
	public function registro(){
		$roles = new Usuario();
		$rol = $roles->getAllRol();

		require_once('views/Usuarios/registrar.php');
	}
	
	public function save(){
		if(isset($_POST)){
			
			$nombre = isset($_POST['Name']) ? $_POST['Name'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$rol = isset($_POST['rol']) ? $_POST['rol'] : false;
			
			if($nombre && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setPassword($password);
				$usuario->setRol($rol);

				$save = $usuario->save();
				if($save){
					$_SESSION['register'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}
		header("Location:".base_url);
	}
	
	public function login(){
		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setNombre($_POST['Name']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->login();
			
			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
				
				if($identity->IdRol == 1){
					$_SESSION['admin'] = true;
				}
				
			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
		}
		header("Location:".base_url);
	}
	
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		header("Location:".base_url);
	}
	
} // fin clase