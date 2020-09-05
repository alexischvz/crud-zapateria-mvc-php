<?php 

class Registro{

	public $cnx; // variable conexion para llamar al metodo que nos conecta a la db

	// en el constructor guardamos la instancia de la clase conexion en la variable "cnx"
	// automaticamente siempre se hara la intancia sin necesidad de hacerla en cada funcion
	public function __construct(){

		try {

			$this->cnx = Conexion::getConexion();

		} catch (Exception $e) {

			die($e->getMessage());

		}

	}

	// creamos una funcion para crear los registros, se mandan argumentos con los nombres de los campos
	// de la tabla en donde se guardan los registros
	public function createRegistro($id_marca, $id_tipo, $id_clase, $talla, $descripcion){

		try {

			$query = "insert into registro(id_marca, id_tipo, id_clase, talla, descripcion) values(:id_marca, :id_tipo, :id_clase, :talla, :descripcion)";

			$statement = $this->cnx->prepare($query);
			$statement->bindParam(":id_marca", $id_marca);
			$statement->bindParam(":id_tipo", $id_tipo);
			$statement->bindParam(":id_clase", $id_clase);
			$statement->bindParam(":talla", $talla);
			$statement->bindParam(":descripcion", $descripcion);

			$statement->execute();
			
		} catch (Exception $e) {

			die($e->getMessage());
			
		}

	}

	// creamos una funcion que nos lea los datos de la tabla principal para mostrarlo en una tabla
	public function readRegistro(){

		try {
			
			$query = "select r.id_registro, m.marca, t.tipo, c.clase, r.talla, r.descripcion from registro r inner join marca m on m.id_marca = r.id_marca inner join tipo t on t.id_tipo = r.id_tipo inner join clase c on c.id_clase = r.id_clase order by r.id_registro";

			$statement = $this->cnx->prepare($query);
			$statement->execute();

			return $statement->fetchAll(PDO::FETCH_OBJ);

		} catch (Exception $e) {

			die($e->getMessage());

		}

	}

	public function deleteRegistro($id_registro){

		try {

			$query = "delete from registro where id_registro = :id_registro";
			$statement = $this->cnx->prepare($query);
			$statement->bindParam(":id_registro", $id_registro);

			$statement->execute();
			
		} catch (Exception $e) {

			die($e->getMessage());
			
		}

	}

	public function updateRegistro($id_marca, $id_tipo, $id_clase, $talla, $descripcion, $id_registro){

		try {

			$query = "update registro set id_marca = :id_marca, id_tipo = :id_tipo, id_clase = :id_clase, talla = :talla, descripcion = :descripcion where id_registro = :id_registro";

			$statement = $this->cnx->prepare($query);
			$statement->bindParam(":id_marca", $id_marca);
			$statement->bindParam(":id_tipo", $id_tipo);
			$statement->bindParam(":id_clase", $id_clase);
			$statement->bindParam(":talla", $talla);
			$statement->bindParam(":descripcion", $descripcion);
			$statement->bindParam(":id_registro", $id_registro);

			$statement->execute();
			
		} catch (Exception $e) {

			die($e->getMessage());
			
		}

	}

	public function findById($id_registro){

		try {

			$query = "select * from registro where id_registro = :id_registro";
			$statement = $this->cnx->prepare($query);
			$statement->bindParam(":id_registro", $id_registro);
			$statement->execute();

			return $statement->fetch(PDO::FETCH_OBJ);
			
		} catch (Exception $e) {

			die($e->getMessage());
			
		}

	}

	// **********************************************************************************

	// creamos una funcion que lea los datos de la tabla "marca" para llenar en un select
	public function readMarca(){

		try {
			
			$query = "select * from marca";
			$statement = $this->cnx->prepare($query);
			$statement->execute();

			return $statement->fetchAll(PDO::FETCH_OBJ);

		} catch (Exception $e) {

			die($e->getMessage());

		}

	}

	// creamos una funcion que lea los datos de la tabla "tipo" para llenar en un select
	public function readTipo(){

		try {

			$query = "select * from tipo";
			$statement = $this->cnx->prepare($query);
			$statement->execute();

			return $statement->fetchAll(PDO::FETCH_OBJ);
			
		} catch (Exception $e) {

			die($e->getMessage());

		}

	}

	// creamos una funcion que lea los datos de la tabla "clase" para llenar en un select
	public function readClase(){

		try {

			$query = "select * from clase";
			$statement = $this->cnx->prepare($query);
			$statement->execute();

			return $statement->fetchAll(PDO::FETCH_OBJ);
			
		} catch (Exception $e) {

			die($e->getMessage());
			
		}

	}

}

 ?>