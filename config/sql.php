<?php

/**
 * @autor
 */
class Sql
{
  // Atributos necesarios para establecer la conexion
  private $dbname = 'funerariadb';
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';

  private $conexion = null;

  // *************************************************************************
  // Metodo que nos permite conectar a la base de datos mediante PDO
  function conect(){

    try {
      $this->conexion = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user,$this->pass);
      // echo "Conexion establecida <br>";

      // Esta consulta nos permite obtener los datos en formato utf8
      $this->select("SET NAMES 'utf8'");
      return $this->conexion;

    } catch (PDOException $e) {
      echo "Error al conectar con la base de datos";
      return false;
    }

  }

  // *************************************************************************
  // Metodo para guardar datos en la base de datos pasando un arreglo con los datos como parametro
  function insert($datos_insert, $tabla){
    /**
    * Esta funcion nos permitira hacer un insert en una tabla de la base de datos.
    *
    * Pasando como parametros unicamente el nombre de la tabla y un arreglo asociativo
    * el cual debera tener como indices los nombres de las columnas donde se insertaran
    * los datos y consigo su respectivo dato a insertar.
    *
    * Por ejemplo arreglo['nombreColumna'] = 'Dato a insertar'
    */

    // Variables que utilizaremos para crear nuestra consulta SQL
    $consulta = '';
    $tablas = '';
    $datos = '';

    // Primero comprobamos que se haya establesido una conexion
    if (!$this->conexion) {
    	header('Location: ../error.php');
    }

    // Recorremos el arreglo asociativo para obtener el nombre de las tablas y de los valores a insertar
    foreach ($datos_insert as $key => $value) {
      $tablas .= $key . ', ';
      $datos .= "'".$value . "', " ;
    }
    // echo $datos;

    // Creamos la estructura de nuestra consulta
    $consulta = 'INSERT INTO '.$tabla.' ( '.substr($tablas, 0,-2).' ) VALUES  ( '.substr($datos,0,-2).' )';
    $statement = $this->conexion->prepare($consulta);

    //echo $consulta;

    // Ejecutamos nuestra consulta
    $statement->execute();

  }

  // *************************************************************************
  // Metodo para obtener los datos pasando una consulta preparada previamente
  function select($consulta){

    // Primero comprobamos que se haya establesido una conexion
    if (!$this->conexion) {
      header('Location: ../error.php');
    }

    // Preparamos nuestra consulta
    $stmt = $this->conexion->prepare($consulta);
    $stmt->execute(); // Ejecutamos consulta sql
    $resultados = $stmt->fetchAll(); // Guardamos los valores obtenidos

    if (empty($resultados)) {
      return false; // Si no hay datos retornamos false
    }else {
      return $resultados; // Retornamos los datos optenidos
    }


  }

  // *************************************************************************
  // Metodo para actualizar datos en la base de datos pasando un arreglo con los datos como parametro
  function update($datos_update, $tabla, $id, $nombreid){

    /**
    * Este metodo funciona igual al de insert, solo cambia la estructura de la consulta
    */

    $consulta = '';
    $datos = '';

    // Comprobamos que se haya establecido la conexion
    if (!$this->conexion) {
      header('Location: ../error.php');
    }

    // generamos nuestra consulta con el arreglo pasado como parametro
    foreach ($datos_update as $key => $value) {
      $datos.= $key ." = '". $value ."', " ;
    }

    $consulta = 'UPDATE '.$tabla.' SET '.substr($datos, 0,-2).' WHERE '.$nombreid.' = ' . $id;
    echo($consulta);

    $stmt = $this->conexion->prepare($consulta);
    $stmt->execute();

  }

  // *************************************************************************
  // Cerramos la conexion
  function close(){
    $this->conexion = null;
  }
}

$SQL = new Sql;



?>
