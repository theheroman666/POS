<?php
require_once 'models/inventario.php';

class InventarioController{
	
	public function index(){
		Utils::isAdmin();
		$inventario = new Inventario();
		$productos = $inventario->getAll();
	
		// renderizar vista
		require_once 'views/Inventario/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		
			$producto = new Inventario();
			$producto->setId($id);
			
			$product = $producto->getOne();
			
		}
		require_once 'views/producto/ver.php';
	}
	
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/Inventario/agregar.php';
	}
	
	public function save(){
		Utils::isAdmin();
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			$Costo = isset($_POST['CostoM']) ? $_POST['CostoM'] : false;
			
			if($nombre && $stock){
				$producto = new Inventario();
				$producto->setNombre($nombre);
				$producto->setCosto($Costo);
				$producto->setStock($stock);
				
				// Guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$producto->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);
					
					$save = $producto->edit();
				}else{
					$save = $producto->save();
				}
				
				if($save){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
			}else{
				$_SESSION['producto'] = "failed";
			}
		}else{
			$_SESSION['producto'] = "failed";
		}
		header('Location:'.base_url.'producto/gestion');
	}
	
	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$producto = new Inventario();
			$producto->setId($id);
			
			$pro = $producto->getOne();
			
			require_once 'views/Inventario/editar.php';
			
		}else{
			header('Location:'.base_url.'producto/gestion');
		}
	}
	
	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Inventario();
			$producto->setId($id);
			
			$delete = $producto->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		header('Location:'.base_url.'producto/gestion');
	}
	
}