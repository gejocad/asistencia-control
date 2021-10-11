<?php 
session_start();
require_once "../modelos/Adelanto.php";

$asistencia=new Asistencia();

$idasistencia=isset($_POST["idasistencia"])? limpiarCadena($_POST["idasistencia"]):"";
$codigo_persona=isset($_POST["codigo_persona"])? limpiarCadena($_POST["codigo_persona"]):"";
$pdiario=isset($_POST["pdiario"])? limpiarCadena($_POST["pdiario"]):"";
$tipo=isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";


switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idasistencia)) {
			$rspta=$asistencia->insertar($codigo_persona,-($pdiario),$tipo);
			echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
		}else{
			 $rspta=$asistencia->editar($idasistencia,$codigo_persona,$pdiario,$tipo);
			echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
		}
		
	break;
	

	
	case 'listar':
		$rspta=$usuario->listar();
		//declaramos un array
		$data=Array();


		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-info btn-xs" onclick="mostrar_clave('.$reg->idusuario.')"><i class="fa fa-key"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-info btn-xs" onclick="mostrar_clave('.$reg->idusuario.')"><i class="fa fa-key"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->apellidos,
				"3"=>$reg->login,
				"4"=>$reg->email,
				"5"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px'>",
				"6"=>$reg->fechacreado,
				"7"=>($reg->estado)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
				);
		}

		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

	break;


}
?>