<?php

class Inventario{
	private $Id;
	private $Nombre;
	private $Costo;
	private $Stock;
	private $Imagen;
	private $Fecha;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->Id;
	}

	

	function getNombre() {
		return $this->Nombre;
	}

	

	function getCosto() {
		return $this->Costo;
	}

	function getStock() {
		return $this->Stock;
	}

	function getFecha() {
		return $this->Fecha;
	}

	function getImagen() {
		return $this->Imagen;
	}

	function setId($Id) {
		$this->Id = $Id;
	}

	function setNombre($Nombre) {
		$this->Nombre = $this->db->real_escape_string($Nombre);
	}

	function setCosto($Costo) {
		$this->Costo = $this->db->real_escape_string($Costo);
	}

	function setStock($Stock) {
		$this->Stock = $this->db->real_escape_string($Stock);
	}

	function setFecha($Fecha) {
		$this->Fecha = $Fecha;
	}

	function setImagen($Imagen) {
		$this->Imagen = $Imagen;
	}

	public function getAll(){
		$productos = $this->db->query("SELECT * FROM inventario ORDER BY id asc");
		return $productos;
	}
	
	public function getOne(){
		$producto = $this->db->query("SELECT * FROM inventario WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO inventario VALUES(NULL, '{$this->getNombre()}', {$this->getCosto()}, {$this->getStock()}, '{$this->getImagen()}', null);";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function edit(){
		$sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', costo={$this->getCosto()}, stock={$this->getStock()}, categoria_id={$this->getCategoria_id()}  ";
		
		if($this->getImagen() != null){
			$sql .= ", imagen='{$this->getImagen()}'";
		}
		
		$sql .= " WHERE id={$this->Id};";
		
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function delete(){
		$sql = "DELETE FROM productos WHERE id={$this->Id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	
}