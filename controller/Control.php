<?php 

include_once 'model/Registro.php';

class Control{

	public $modelo;

	public function __construct(){
		$this->modelo = new Registro();
	}

	public function index(){

		include_once 'view/inicio.php';

	}

	public function registro(){

		include_once 'view/registro.php';

	}

	public function create(){

		$id_marca = $_POST['marca'];
		$id_tipo = $_POST['tipo'];
		$id_clase = $_POST['clase'];
		$talla = $_POST['talla'];
		$descripcion = $_POST['descripcion'];

		$this->modelo->createRegistro($id_marca, $id_tipo, $id_clase, $talla, $descripcion);

		header('Location: index.php');

	}

	public function delete(){

		$id_registro = $_GET['id_registro'];

		$this->modelo->deleteRegistro($id_registro);

		header('Location: index.php');

	}

	public function modificar(){

		$id_registro = $_GET['id_registro'];

		if (isset($id_registro)) {
			$fila = $this->modelo->findById($id_registro);
		}

		include_once 'view/modificar.php';

	}

	public function update(){

		$id_registro = $_POST['id_registro'];
		$id_marca = $_POST['marca'];
		$id_tipo = $_POST['tipo'];
		$id_clase = $_POST['clase'];
		$talla = $_POST['talla'];
		$descripcion = $_POST['descripcion'];

		$this->modelo->updateRegistro($id_marca, $id_tipo, $id_clase, $talla, $descripcion, $id_registro);

		header('Location: index.php');

	}

}

 ?>