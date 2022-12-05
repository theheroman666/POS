<?php

class Producto
{
	private $id;
	private $nombre;
	private $precio;
	private $stock;
	private $imagen;
	private $fecha;

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



	function getPrecio()
	{
		return $this->precio;
	}

	function getStock()
	{
		return $this->stock;
	}

	function getFecha()
	{
		return $this->fecha;
	}

	function getImagen()
	{
		return $this->imagen;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setNombre($nombre)
	{
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setPrecio($precio)
	{
		$this->precio = $this->db->real_escape_string($precio);
	}

	function setStock($stock)
	{
		$this->stock = $this->db->real_escape_string($stock);
	}

	function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	function setImagen($imagen)
	{
		$this->imagen = $imagen;
	}

	public function getAll()
	{
		$productos = $this->db->query("SELECT productos.Id, productos.Nombre, productos.Precio, productos.Imagen, productos.Stock 
		FROM productos ORDER BY id ASC");
		return $productos;
	}
	public function getList()
	{
		$productos = $this->db->query("SELECT productos.Id, productos.Nombre, productos.Precio, productos.Imagen, productos.Stock 
		FROM productos ");
		return $productos;
	}

	public function getOne()
	{
			$producto = $this->db->query("SELECT productos.Id, productos.Nombre, productos.Precio, productos.Imagen, productos.Stock 
			FROM productos 
			WHERE productos.Id = {$this->getId()}");
			return $producto->fetch_object();
	}

	public function save()
	{
		$sql = "INSERT INTO productos 
		VALUES(NULL, 
		'{$this->getNombre()}', 
		{$this->getPrecio()}, 
		'{$this->getImagen()}', 
		{$this->getStock()}, 
		null);";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
	public function saveProducto()
	{
		$sql = "INSERT INTO productos 
		VALUES(NULL, {$this->getNombre()});";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function edit()
	{
		$sql = "UPDATE productos 
		SET 
		Nombre={$this->getNombre()}, 
		Precio={$this->getPrecio()}, 
		Stock={$this->getStock()}";

		if ($this->getImagen() != null) {
			$sql .= ", imagen='{$this->getImagen()}'";
		}

		$sql .= " WHERE id={$this->id};";


		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function delete()
	{
		$sql = "DELETE FROM productos WHERE id={$this->id}";
		$delete = $this->db->query($sql);

		$result = false;
		if ($delete) {
			$result = true;
		}
		return $result;
	}

}
