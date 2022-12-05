<?php
require_once 'models/inventario.php';

class carritoInvController{
	public function indexMenu(){
		if(isset($_SESSION['carritoInv']) && count($_SESSION['carritoInv']) >= 1){
			$carrito = $_SESSION['carritoInv'];
		}else{
			$carrito = array();
		}
		require_once 'views/carrito/inventario.php';
	}

	public function add(){
		if(isset($_GET['id'])){
			$producto_id = $_GET['id'];
		}else{
			header('Location:'.base_url);
		}
		
		if(isset($_SESSION['carritoInv'])){
			$counter = 0;
			foreach($_SESSION['carritoInv'] as $indice => $elemento){
				if($elemento['id_producto'] == $producto_id){
					$_SESSION['carritoInv'][$indice]['unidades']++;
					$counter++;
				}
			}	
		}
		try {
			//code...
			if(!isset($counter) || $counter == 0){
				// Conseguir producto
			$producto = new Inventario();
			$producto->setId($producto_id);
			$producto = $producto->getOne();

			// Añadir al carrito
			if(is_object($producto)){
				$_SESSION['carritoInv'][] = array(
					"id_producto" => $producto->Id,
					"unidades" => 1,
					"producto" => $producto
				);
			}
		}
		}catch (ErrorException $th) {
			var_dump($th->getMessage());
		}
		
		// header("Location:".base_url."carritoInv/indexMenu");
	}
	
	public function delete(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			unset($_SESSION['carritoInv'][$index]);
		}
		header("Location:".base_url."Inventario/index");
	}
	
	public function up(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			$_SESSION['carritoInv'][$index]['unidades']++;
		}
		header("Location:".base_url."Inventario/index");
	}
	
	public function down(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			$_SESSION['carritoInv'][$index]['unidades']--;
			
			if($_SESSION['carritoInv'][$index]['unidades'] == 0){
				unset($_SESSION['carritoInv'][$index]);
			}
		}
		header("Location:".base_url."Inventario/index");
	}
	
	public function delete_all(){
		unset($_SESSION['carritoInv']);
		header("Location:".base_url."Inventario/index");
	}
	
}