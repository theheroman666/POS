<?php

require 'ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class Pedido
{
	private $Id;
	private $UsuarioId;
	private $Total;
	private $DineroRecibido;
	private $Factura;
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

	public function getFactura()
	{
		return $this->Factura;
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

	function setFactura($Factura)
	{
		$this->Factura = $this->db->real_escape_string($Factura);
	}

	public function setFecha($Fecha)
	{
		return $this->Fecha = $Fecha;
	}
	public function getAll()
	{
		$productos = $this->db->query("SELECT usuarios.Nombre, pedidos.Id,pedidos.Total, 
		pedidos.DineroRecibido, pedidos.Factura, pedidos.Fecha, 
		date_format(Fecha, \"%d-%m-%Y %H:%i:%s\") as Fecha 
		FROM pedidos 
		INNER JOIN usuarios on pedidos.UsuarioId = usuarios.Id");
		return $productos;
	}

	public function getOne()
	{
		$producto = $this->db->query("SELECT * FROM pedidos WHERE Id = {$this->getId()}");
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
			. "WHERE p.UsuarioId = {$this->getUsuarioId()} ORDER BY id DESC";

		$pedido = $this->db->query($sql);

		return $pedido;
	}


	public function getProductosByPedido($id)
	{
		//		$sql = "SELECT * FROM productos WHERE id IN "
		//				. "(SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id})";

		$sql = "SELECT productos.Id, productos.Nombre,productos.Precio, 
		orden.Unidades, pedidos.Total, pedidos.DineroRecibido, orden.PedidoId as 'IdO' FROM orden 
		INNER JOIN pedidos on orden.PedidoId = pedidos.Id 
		INNER JOIN productos on orden.ProductoId = productos.Id where orden.PedidoId = {$id};";

		$productos = $this->db->query($sql);
		return $productos;
	}

	public function save()
	{
		$sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuarioId()}, {$this->getTotal()}, {$this->getDineroRecibido()}, '{$this->getFactura()}',NULL);";
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

			$insert = "INSERT INTO orden VALUES(NULL, {$pedido_id}, {$producto->Id}, {$elemento['unidades']}, NULL)";
			$save = $this->db->query($insert);
			$this->db->query("UPDATE productos SET productos.Stock = productos.Stock - {$elemento['unidades']} where productos.Id = '{$producto->Id}';");
		
		}
		Utils::deleteSession('carrito');

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function delete()
	{
		$sql = "DELETE FROM pedidos WHERE Id={$this->Id}";
		$delete = $this->db->query($sql);

		$result = false;
		if ($delete) {
			$result = true;
		}
		return $result;
	}

	public function imprimir(){
		$sql = "SELECT LAST_INSERT_ID() as 'pedido';";
		$query = $this->db->query($sql);
		$pedido_id = $query->fetch_object()->pedido;

		$sqls = $this->db->query("SELECT productos.Id, productos.Nombre,productos.Precio, 
		orden.Unidades, pedidos.Total, pedidos.DineroRecibido, orden.PedidoId as 'IdO' FROM orden 
		INNER JOIN pedidos on orden.PedidoId = pedidos.Id 
		INNER JOIN productos on orden.ProductoId = productos.Id  WHERE orden.PedidoId = {$pedido_id} ");
		$nombre_impresora = "Generic  Text Only";

			$connector = new WindowsPrintConnector($nombre_impresora);
			$printer = new Printer($connector);
			$result = false;

			try{

				$printer->setJustification(Printer::JUSTIFY_CENTER);
				
			$printer->setTextSize(2, 2);
			$printer->text("Ticket con PHP");

			$printer->setTextSize(2, 1);
			$printer->feed(5);
			// foreach(){

			// }
			$printer->setJustification(Printer::JUSTIFY_LEFT);
			while ($items = $sqls->fetch_object()) {

				$printer->text($items->Nombre);
				$printer->text($items->Precio);
			
			}

			$printer->feed(3);

			$printer->cut();

			$printer->pulse();

			$printer->close();
			return $result = true;
		}catch(ErrorException $msg){
			return $result;
		}
		
	}
}
