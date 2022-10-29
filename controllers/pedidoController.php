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
		if (isset($_SESSION['identity'])) {
			$usuario_id = $_SESSION['identity']->Id;
			$DineroRecibido = isset($_POST['Dinero']) ? $_POST['Dinero'] : false;

			$stats = Utils::statsCarrito();
			$costo = $stats['total'];

			if ($usuario_id && $DineroRecibido && $costo) {
				// Guardar datos en bd
				$pedido = new Pedido();
				$pedido->setUsuarioId($usuario_id);
				$pedido->setTotal($costo);
				$pedido->setDineroRecibido($DineroRecibido);

				$save = $pedido->save();

				// Guardar linea pedido
				$save_linea = $pedido->save_linea();

				if ($save && $save_linea) {
					$_SESSION['pedido'] = "complete";
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
		header("Location:" . base_url);
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
