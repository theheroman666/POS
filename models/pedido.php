<?php

class Pedido
{
	private $Id;
	private $UsuarioId;
	private $Total;
	private $DineroRecibido;
	private $Fecha;

	private $db;

	public function __construct()
	{
		$this->db = Database::connect();
	}

	public function getId()
	{
		return $this->Id;
	}

	public function getUsuarioId()
	{
		return $this->UsuarioId;
	}

	public function getTotal()
	{
		return $this->Total;
	}

	public function getDineroRecibido()
	{
		return $this->DineroRecibido;
	}

	public function getFecha()
	{
		return $this->Fecha;
	}

	//Setters
	public function setId($Id)
	{
		return $this->Id = $Id;
	}

	public function setUsuarioId($UsuarioId)
	{
		return $this->UsuarioId = $UsuarioId;
	}

	public function setTotal($Total)
	{
		return $this->Total = $Total;
	}

	public function setDineroRecibido($DineroRecibido)
	{
		return $this->DineroRecibido = $DineroRecibido;
	}

	public function setFecha($Fecha)
	{
		return $this->Fecha = $Fecha;
	}
	public function getAll()
	{
		$productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
		return $productos;
	}

	public function getOne()
	{
		$producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}

	// public function getOneByUser(){
	// 	$sql = "SELECT p.id, p.coste FROM pedidos p "
	// 			//. "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
	// 			. "WHERE p.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC LIMIT 1";

	// 	$pedido = $this->db->query($sql);

	// 	return $pedido->fetch_object();
	// }

	public function getAllByUser()
	{
		$sql = "SELECT p.* FROM pedidos p "
			. "WHERE p.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC";

		$pedido = $this->db->query($sql);

		return $pedido;
	}


	public function getProductosByPedido($id)
	{
		//		$sql = "SELECT * FROM productos WHERE id IN "
		//				. "(SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id})";

		$sql = "SELECT pr.*, lp.unidades FROM productos pr "
			. "INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
			. "WHERE lp.pedido_id={$id}";

		$productos = $this->db->query($sql);

		return $productos;
	}

	public function save()
	{
		$sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuarioId()}, {$this->getTotal()}, {$this->getDineroRecibido()},NULL);";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function save_linea()
	{
		$sql = "SELECT LAST_INSERT_ID() as 'pedido';";
		$query = $this->db->query($sql);
		$pedido_id = $query->fetch_object()->pedido;

		foreach ($_SESSION['carrito'] as $elemento) {
			$producto = $elemento['producto'];

			$insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']}, NULL)";
			$save = $this->db->query($insert);
		}

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	// public function edit(){
	// 	$sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
	// 	$sql .= " WHERE id={$this->getId()};";

	// 	$save = $this->db->query($sql);

	// 	$result = false;
	// 	if($save){
	// 		$result = true;
	// 	}
	// 	return $result;
	// }
}
