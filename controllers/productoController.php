<?php
require_once 'models/producto.php';

class productoController
{

	public function index()
	{
		Utils::isIdentity();
		try {
			//code...
			$productos = new Producto();
			$producto = $productos->getList();
		} catch (Exception $e) {
			echo ($e->getMessage());
		}

		// renderizar vista
		require_once 'views/Home/index.php';
	}

	public function ver()
	{
		Utils::isIdentity();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$producto = new Producto();
			$producto->setId($id);

			$product = $producto->getOne();
		}
		require_once 'views/producto/ver.php';
	}

	public function gestion()
	{
		Utils::isAdmin();

		$producto = new Producto();
		$productos = $producto->getAll();

		require_once 'views/producto/index.php';
	}

	public function crear()
	{
		Utils::isAdmin();
		
		require_once 'views/producto/crear.php';
	}

	public function save()
	{
		Utils::isAdmin();
		if (isset($_POST)) {
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;

			if ($nombre && $precio && $stock) {
				$producto = new Producto();
				$producto->setNombre($nombre);
				$producto->setPrecio($precio);
				$producto->setStock($stock);

				// Guardar la imagen
				if (isset($_FILES['imagen'])) {
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

						if (!is_dir('uploads/images')) {
							mkdir('uploads/images', 0777, true);
						}

						$producto->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
					}
				}

				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$producto->setId($id);

					$save = $producto->edit();
				} else {
					$save = $producto->save();
				}

				if ($save) {
					$_SESSION['producto'] = "complete";
				} else {
					$_SESSION['producto'] = "failed";
				}
			} else {
				$_SESSION['producto'] = "failed";
			}
		} else {
			$_SESSION['producto'] = "failed";
		}
		header('Location:' . base_url . 'producto/gestion');
	}

	public function editar()
	{
		try {

			Utils::isAdmin();
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$edit = true;

				$producto = new Producto();
				$producto->setId($id);

				$pro = $producto->getOne();
				// var_dump($pro);

			}
			// header('Location:' . base_url . 'producto/gestion');
		} catch (Exception $e) {
			echo ('<textarea class="form-control" disabled >' . $e->getMessage() . '</textarea>');
		} finally {
			require_once 'views/producto/editar.php';
		}
	}

	public function eliminar()
	{
		Utils::isAdmin();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);

			$delete = $producto->delete();
			if ($delete) {
				$_SESSION['delete'] = 'complete';
			} else {
				$_SESSION['delete'] = 'failed';
			}
		} else {
			$_SESSION['delete'] = 'failed';
		}

		header('Location:' . base_url . 'producto/gestion');
	}
	// public function names()
	// {
	// 	$names = new Producto();
	// 	$name = $names->getAllName();
	// 	while ($item = $name->fetch_object()) {
	// 		$array[$item->Id] = $item->Nombre;
	// 		return json_encode($array);
	// 	}
	// }

}
