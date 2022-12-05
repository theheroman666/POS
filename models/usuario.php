<?php

class Usuario
{
	private $id;
	private $nombre;
	private $password;
	private $rol;
	private $db;

	public function __construct()
	{
		$this->db = Database::connect();
	}

	function getId()
	{
		return $this->id;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function getPassword()
	{
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 10]);
	}

	function getRol()
	{
		return $this->rol;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setNombre($nombre)
	{
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setPassword($password)
	{
		$this->password = $password;
	}

	function setRol($rol)
	{
		$this->rol = $rol;
	}

	public function save()
	{
		$sql = "INSERT INTO usuarios VALUES(NULL, {$this->getRol()}, '{$this->getNombre()}', '{$this->getPassword()}', {$this->getId()},null, null);";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function login()
	{
		$result = false;
		$name = $this->getNombre();
		$password = $this->password;

		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE Nombre = '$name'";
		$login = $this->db->query($sql);


		if ($login && $login->num_rows == 1) {
			$usuario = $login->fetch_object();

			// Verificar la contraseña
			$verify = password_verify($password, $usuario->Password);

			if ($verify) {
				$result = $usuario;
			}
		}

		return $result;
	}
	public function loginroot()
	{
		$result = false;
		$name = $this->getNombre();
		$password = $this->password;

		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE Nombre = '$name'";
		$login = $this->db->query($sql);


		if ($login && $login->num_rows == 1) {
			$usuario = $login->fetch_object();

			// Verificar la contraseña
			$verify = password_verify($password, $usuario->Password);

			if ($verify) {
				$result = $usuario;
			}
		}

		return $result;
	}

	public function getAllRol()
	{
		$productos = $this->db->query("SELECT * FROM roles ORDER BY id ASC");
		return $productos;
	}

	public function getAll()
	{
		$users = $this->db->query("SELECT id, nombre FROM usuarios ");
		return $users;
	}
}
