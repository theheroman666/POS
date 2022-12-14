<?php
require_once 'models/pedido.php';

class pedidoController
{
	public function index()
	{
		Utils::isIdentity();
		$usuario_id = $_SESSION['identity']->Id;
		$pedido = new Pedido();

		// Sacar los pedidos del usuario
		$pedido->setUsuarioId($usuario_id);
		$pedidos = $pedido->getAll();

		require_once 'views/pedido/index.php';
	}
	public function hacer()
	{
		try {

			if (isset($_SESSION['identity']) && isset($_POST)) {
				$usuario_id = $_SESSION['identity']->Id;
				$DineroRecibido = isset($_POST['Dinero']) ? $_POST['Dinero'] : false;
				$Factura = isset($_POST['Factura']) ? $_POST['Factura'] : 'No';

				$stats = Utils::statsCarrito();
				$costo = $stats['total'];

				if ($usuario_id && $DineroRecibido && $costo) {
					// Guardar datos en bd
					$pedido = new Pedido();
					$pedido->setUsuarioId($usuario_id);
					$pedido->setTotal($costo);
					$pedido->setDineroRecibido($DineroRecibido);
					$pedido->setFactura($Factura);

					$save = $pedido->save();

					// Guardar linea pedido
					$save_linea = $pedido->save_linea();

					$pedido->imprimir();

					if ($save && $save_linea) {
						$_SESSION['pedido'] = "complete";
						header("Location:" . base_url);
					} else {
						$_SESSION['pedido'] = "failed";
					}
				} else {
					$_SESSION['pedido'] = "failed";
				}
			} else {
				// Redigir al index
				header("Location:" . base_url);
			}
		} catch (ErrorException $msg) {
			header("Location:" . base_url);
		} finally {
			header("Location:" . base_url);
		}
	}

	public function hacerInv()
	{
		try {

			if (isset($_SESSION['admin']) && isset($_POST)) {
				$usuario_id = $_SESSION['identity']->Id;
				$contenido = isset($_POST['cont']) ? $_POST['cont'] : false;
				$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 'No';
				$Dinero = isset($_POST['costo']) ? $_POST['costo'] : 'No';
				

				$stats = Utils::statsCarrito();
				$costo = $stats['total'];

				if ($usuario_id && $contenido && $costo) {
					for ($i = 0; $i < count($contenido); $i++){

						// Guardar datos en bd
						$pedido = new Pedido();
					$pedido->setUsuarioId($usuario_id);
					$pedido->setCantidad($cantidad);
					$pedido->setContenido($contenido);
					$pedido->setDineroRecibido($Dinero);
					$pedido->setTotal($costo);

					$save = $pedido->saveInv();

					// Guardar linea pedido
					$save_linea = $pedido->save_lineaInv();

					if ($save && $save_linea) {
						$_SESSION['pedido'] = "complete";
						header("Location:" . base_url);
					} else {
						$_SESSION['pedido'] = "failed";
					}
				}
				} else {
					$_SESSION['pedido'] = "failed";
				}
			// } else {
			// 	// Redigir al index
			// 	// header("Location:" . base_url);
			}
		} catch (ErrorException $msg) {
			// header("Location:" . base_url);
			var_dump($msg->getMessage());
		} finally {
			// header("Location:" . base_url);
		}
	}

	public function detalle()
	{
		Utils::isIdentity();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			// Sacar el pedido
			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido = $pedido->getOne();

			// Sacar los poductos
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->getProductosByPedido($id);

			require_once 'views/pedido/detalle.php';
		} else {
			header('Location:' . base_url . 'pedido/index');
		}
	}

	public function gestion()
	{
		Utils::isAdmin();
		$gestion = true;

		$pedido = new Pedido();
		$pedidos = $pedido->getAll();

		require_once 'views/pedido/mis_pedidos.php';
	}

	public function eliminar()
	{
		Utils::isAdmin();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$producto = new Pedido();
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

		header('Location:' . base_url . 'pedido/index');
	}
}
