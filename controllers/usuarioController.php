<?php
require_once 'models/usuario.php';

class usuarioController
{

	public function index()
	{
		$users = new  Usuario();
		$user = $users->getAll();
		$root = $users->loginroot();
		require_once('views/Usuarios/login.php');
	}

	public function registro()
	{
		// Utils::isAdmin();
		$roles = new Usuario();
		$rol = $roles->getAllRol();

		require_once('views/Usuarios/registrar.php');
	}

	public function save()
	{
		try {

			if (isset($_POST) && isset($_SESSION['admin'])) {
				$id = $_SESSION['identity']->Id;
				$nombre = isset($_POST['Name']) ? $_POST['Name'] : false;
				$password = isset($_POST['password']) ? $_POST['password'] : false;
				$rol = isset($_POST['rol']) ? $_POST['rol'] : false;

				if ($nombre && $password) {
					$usuario = new Usuario();
					$usuario->setNombre($nombre);
					$usuario->setPassword($password);
					$usuario->setRol($rol);
					$usuario->setId($id);

					$save = $usuario->save();
					if ($save) {
						$_SESSION['register'] = "complete";
					} else {
						$_SESSION['register'] = "failed";
					}
				} else {
					$_SESSION['register'] = "failed";
				}
			}
		} catch (Exception $msg) {
			var_dump($msg->getMessage());

			$_SESSION['register'] = "failed";
			//throw $th;
		} finally {
			header("Location:" . base_url);
		}
	}

	public function login()
	{
			if (isset($_POST)) {
				$usuario = new Usuario();
				$usuario->setNombre($_POST['Name']);
				$usuario->setPassword($_POST['password']);

				$identity = $usuario->login();

				if ($identity && is_object($identity)) {
					$_SESSION['identity'] = $identity;

					if ($identity->IdRol == 1) {
						$_SESSION['admin'] = true;
					}
				}else{
					$_SESSION['error_login'] = 'Identificación fallida !!';
					
				}
			}else{
				
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
			
			header("Location:" . base_url);
	}

	public function loginroot()
	{
		try{

			if (isset($_POST)) {
				$usuario = new Usuario();
				$usuario->setNombre($_POST['Name']);
				$usuario->setPassword($_POST['password']);

				$identity = $usuario->loginroot();

				if ($identity && is_object($identity)) {
					$_SESSION['auth'] = $identity;
				}
			}
		}catch(ErrorException $msg){
			var_dump($msg->getMessage());
		}finally{
			header("Location:" . base_url.'producto/gestion');
		}
	}

	public function logout()
	{
		if (isset($_SESSION['identity'])) {
			unset($_SESSION['identity']);
		}

		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}

		header("Location:" . base_url);
	}
	public function cambiarSesion()
	{
		if (isset($_SESSION['identity'])) {
			unset($_SESSION['identity']);
		}

		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}

		header("Location:" . base_url . "usuario/index");
	}
} // fin clase