<?php
class buscar{
	private $id;
	private $placa;
	private $marca;
	private $motor;
	private $chasis;
	private $combustible;
	private $anio;
	private $color;
	private $foto;
	private $avaluo;


	private $fecha;
	private $agencia;
	private $anio2;
	private $con;
	
	function __construct($cn){
		$this->con = $cn;
	    //echo "EJECUTANDOSE EL CONSTRUCTOR VEHICULO<br><br>";
	}
	

	/*public function get_form($id=NULL){
		// Código agregado -- //
	if(($id == NULL) || ($id == 0) ) {
			$this->placa = NULL;
			$this->marca = NULL;
			$this->motor = NULL;
			$this->chasis = NULL;
			$this->combustible = NULL;
			$this->anio = NULL;
			$this->color = NULL;
			$this->foto = NULL;
			$this->avaluo =NULL;
			
			$flag = NULL;
			$op = "new";
			$bandera = 1;
	}else{
			$sql = "SELECT * FROM vehiculo WHERE id=$id;";
			$res = $this->con->query($sql);
			$row = $res->fetch_assoc();
            $num = $res->num_rows;
            $bandera = ($num==0) ? 0 : 1;
            
            if(!($bandera)){
                $mensaje = "tratar de actualizar el vehiculo con id= ".$id . "<br>";
                echo $this->_message_error($mensaje);
				
            }else{                
                
				
				echo "<br>REGISTRO A MODIFICAR: <br>";
					echo "<pre>";
						print_r($row);
					echo "</pre>";
			
		
             // ATRIBUTOS DE LA CLASE VEHICULO   
                $this->placa = $row['placa'];
                $this->marca = $row['marca'];
                $this->motor = $row['motor'];
                $this->chasis = $row['chasis'];
                $this->combustible = $row['combustible'];
                $this->anio = $row['anio'];
                $this->color = $row['color'];
                $this->foto = $row['foto'];
                $this->avaluo = $row['avaluo'];
				
                //$flag = "disabled";
				$flag = "enabled";
                $op = "act"; 
            }
	}
        
	if($bandera){
    
		$combustibles = ["Gasolina",
						 "Diesel",
						 "Eléctrico"
						 ];
		$html = '
		<form name="Form_vehiculo" method="POST" action="vehiculo.php" enctype="multipart/form-data">
		<input type="hidden" name="id" value="' . $id  . '">
		<input type="hidden" name="op" value="' . $op  . '">
			<table border="2" align="center">
				<tr>
					<th colspan="2">DATOS VEHÍCULO</th>
				</tr>
				<tr>
					<td>Placa:</td>
					<td><input type="text" size="6" name="placa" value="' . $this->placa . '"></td>
				</tr>
				<tr>
					<td>Marca:</td>
					<td>' . $this->_get_combo_db("marca","id","descripcion","marca",$this->marca) . '</td>
				</tr>
				<tr>
					<td>Motor:</td>
					<td><input type="text" size="15" name="motor" value="' . $this->motor . '"></td>
				</tr>	
				<tr>
					<td>Chasis:</td>
					<td><input type="text" size="15" name="chasis" value="' . $this->chasis . '"></td>
				</tr>
				<tr>
					<td>Combustible:</td>
					<td>' . $this->_get_radio($combustibles, "combustible",$this->combustible) . '</td>
				</tr>
				<tr>
					<td>Año:</td>
					<td>' . $this->_get_combo_anio("anio",1950,$this->anio) . '</td>
				</tr>
				<tr>
					<td>Color:</td>
					<td>' . $this->_get_combo_db("color","id","descripcion","color", $this->color) . '</td>
				</tr>
				<tr>
					<td>Foto:</td>
					<td><input type="file" name="foto" ' . $flag . '></td>
				</tr>
				<tr>
					<td>Avalúo:</td>
					<td><input type="text" size="8" name="avaluo" value="' . $this->avaluo . '" ' . $flag . '></td>
				</tr>
				<tr>
					<th colspan="2"><input type="submit" name="Guardar" value="GUARDAR"></th>
				</tr>												
			</table>';
		return $html;
		}
	}*/
	
	
	
/*public function get_list(){
    $d_new = "new/0";
    $d_new_final = base64_encode($d_new);
    $d_ind = "ind/0";
    $d_new_index = base64_encode($d_ind);

    $html = '
        <table border="1" align="center">
            <tr>
                <th colspan="8">Lista de Vehículos</th>
            </tr>
            <tr>
                <td colspan="8">
                    <form method="post" action="">
                        <label>Placa:</label>
                        <input type="text" name="placa">
                        <button type="submit">Buscar</button>
                    </form>
                </td>
            </tr>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Color</th>
                <th>Año</th>
                <th>Avalúo</th>
            </tr>';

    $sql = "SELECT v.id, v.placa, m.descripcion as marca, c.descripcion as color, v.anio, v.avaluo  
            FROM vehiculo v, color c, marca m 
            WHERE v.marca=m.id AND v.color=c.id";

    // Si se ha enviado el formulario, agregar filtro por placa
    if(isset($_POST['placa']) && $_POST['placa'] != ''){
        $placa = $this->con->real_escape_string($_POST['placa']);
        $sql .= " AND v.placa LIKE '%$placa%'";
    }

    $res = $this->con->query($sql);

    // VERIFICA si existe TUPLAS EN EJECUCION DEL Query
    $num = $res->num_rows;

    if($num != 0){
        while($row = $res->fetch_assoc()){
            // URL PARA BORRAR
            $d_del = "del/" . $row['id'];
            $d_del_final = base64_encode($d_del);

            // URL PARA ACTUALIZAR
            $d_act = "act/" . $row['id'];
            $d_act_final = base64_encode($d_act);

            // URL PARA EL DETALLE
            $d_det = "det/" . $row['id'];
            $d_det_final = base64_encode($d_det); 

            $html .= '
                <tr>
                    <td>' . $row['placa'] . '</td>
                    <td>' . $row['marca'] . '</td>
                    <td>' . $row['color'] . '</td>
                    <td>' . $row['anio'] . '</td>
                    <td>' . $row['avaluo'] . '</td>
                </tr>';
        }
    }else{
        $mensaje = "Tabla Vehiculo" . "<br>";
        echo $this->_message_BD_Vacia($mensaje);
        echo "<br><br><br>";
    }
		$html .= '</table>';
		return $html;
		
	}*/

	public function get_list(){
    $html = '';

    // Si se ha enviado el formulario, agregar filtro por placa
    if(isset($_POST['placa']) && $_POST['placa'] != ''){
        $d_new = "new/0";
        $d_new_final = base64_encode($d_new);
        $d_ind = "ind/0";
        $d_new_index = base64_encode($d_ind);

        $html .= '
            <table border="1" align="center">
                <tr>
                    <th colspan="8">Lista de Vehículos</th>
                </tr>
                <tr>
                    <td colspan="8">
                        <form method="post" action="">
                            <label>Placa:</label>
                            <input type="text" name="placa" value="' . $_POST['placa'] . '">
                            <button type="submit">Buscar</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Color</th>
                    <th>Año</th>
                    <th>Avalúo</th>
                </tr>';

        $sql = "SELECT v.id, v.placa, m.descripcion as marca, c.descripcion as color, v.anio, v.avaluo  
                FROM vehiculo v, color c, marca m 
                WHERE v.marca=m.id AND v.color=c.id AND v.placa LIKE '%" . $this->con->real_escape_string($_POST['placa']) . "%'";

        $res = $this->con->query($sql);

        $num = $res->num_rows;

        if($num != 0){
            while($row = $res->fetch_assoc()){
                $d_del = "del/" . $row['id'];
                $d_del_final = base64_encode($d_del);

                $d_act = "act/" . $row['id'];
                $d_act_final = base64_encode($d_act);

                $d_det = "det/" . $row['id'];
                $d_det_final = base64_encode($d_det); 

                $html .= '
                    <tr>
                        <td>' . $row['placa'] . '</td>
                        <td>' . $row['marca'] . '</td>
                        <td>' . $row['color'] . '</td>
                        <td>' . $row['anio'] . '</td>
                        <td>' . $row['avaluo'] . '</td>
                    </tr>';
            }
        }else{
            $mensaje = "Tabla Vehiculo" . "<br>";
            $html .= $this->_message_BD_Vacia($mensaje);
        }
        $html .= '</table><br><br><br>';
    }else{
        $html .= '
            <form method="post" action="">
                <label>Placa:</label>
                <input type="text" name="placa">
                <button type="submit">Buscar</button>
            </form>';
    }

    return $html;
}
	
//********************************************************************************************************
	/*
	 $tabla es la tabla de la base de datos
	 $valor es el nombre del campo que utilizaremos como valor del option
	 $etiqueta es nombre del campo que utilizaremos como etiqueta del option
	 $nombre es el nombre del campo tipo combo box (select)
	 * $defecto es el valor para que cargue el combo por defecto
	 */ 
	 
	 // _get_combo_db("marca","id","descripcion","marca",$this->marca)
	 // _get_combo_db("color","id","descripcion","color", $this->color)
	 
	 /*Aquí se agregó el parámetro:  $defecto*/
	private function _get_combo_db($tabla,$valor,$etiqueta,$nombre,$defecto=NULL){
		$html = '<select name="' . $nombre . '">';
		$sql = "SELECT $valor,$etiqueta FROM $tabla;";
		$res = $this->con->query($sql);
		//$num = $res->num_rows;
		
			
		while($row = $res->fetch_assoc()){
		
		/*
			echo "<br>VARIABLE ROW <br>";
					echo "<pre>";
						print_r($row);
					echo "</pre>";
		*/	
			$html .= ($defecto == $row[$valor])?'<option value="' . $row[$valor] . '" selected>' . $row[$etiqueta] . '</option>' . "\n" : '<option value="' . $row[$valor] . '">' . $row[$etiqueta] . '</option>' . "\n";
		}
		$html .= '</select>';
		return $html;
	}
	
	//_get_combo_anio("anio",1950,$this->anio)
	/*Aquí se agregó el parámetro:  $defecto*/
	private function _get_combo_anio($nombre,$anio_inicial,$defecto=NULL){
		$html = '<select name="' . $nombre . '">';
		$anio_actual = date('Y');
		for($i=$anio_inicial;$i<=$anio_actual;$i++){
			$html .= ($defecto == $i)? '<option value="' . $i . '" selected>' . $i . '</option>' . "\n":'<option value="' . $i . '">' . $i . '</option>' . "\n";
		}
		$html .= '</select>';
		return $html;
	}
	
	
	//_get_radio($combustibles, "combustible",$this->combustible) 
	/*Aquí se agregó el parámetro:  $defecto*/
	private function _get_radio($arreglo,$nombre,$defecto=NULL){
		$html = '
		<table border=0 align="left">';
		foreach($arreglo as $etiqueta){
			$html .= '
			<tr>
				<td>' . $etiqueta . '</td>
				<td>';
				$html .= ($defecto == $etiqueta)? '<input type="radio" value="' . $etiqueta . '" name="' . $nombre . '" checked/></td>':'<input type="radio" value="' . $etiqueta . '" name="' . $nombre . '"/></td>';
			
			$html .= '</tr>';
		}
		$html .= '</table>';
		return $html;
	}
	
	
//****************************************** NUEVO CODIGO *****************************************




	private function _get_name_file($nombre_original, $tamanio){
			$tmp = explode(".",$nombre_original);
			$numElm = count($tmp);
			$ext = $tmp[$numElm-1];
			$cadena = "";
					for($i=1;$i<=$tamanio;$i++){
						$c = rand(65, 122);
						if(($c >= 91) && ($c <=96)){
							$c = NULL;
								$i--;
						}else{
							$cadena .= chr($c);
						}
					}
	return $cadena . "." . $ext;
}



	
//***************************************************************************************	
	
	private function _calculo_matricula($avaluo){
		return number_format(($avaluo * 0.10),2);
	}
	


	public function get_list_matriculados(){
		$html = '
		<br>
		<table border="1" align="center" class="table table-striped table-dark" >
			<tr>
				<th colspan="8" class="text-center">Lista de Vehículos Matriculados</th>
			</tr>
			<tr class="text-center">
				<th>Fecha</th>
				<th>Vehiculo</th>
				<th>Agencia</th>
				<th>Año</th>
			</tr>';
		
		//$sql2 = "SELECT v.id, v.placa, m.vehiculo AS datos_vehiculo, a.id, a.descripcion, m.agencia AS datos_agencia FROM vehiculo v, matricula m, agencia a WHERE m.vehiculo=v.id AND m.agencia=a.id;";

		$sql = "SELECT * FROM matricula";
		$res = $this->con->query($sql);
		// Sin codificar <td><a href="index.php?op=del&id=' . $row['id'] . '">Borrar</a></td>
		while($row = $res->fetch_assoc()){
			//$d_matri = "matri/" . $row['id'];
			//$d_matri_final = base64_encode($d_matri);	
			$html .= '
				<tr class="text-center">
					<td>' . $row['fecha'] . '</td>
					<td>' . $row['vehiculo'] . '</td>
					<td>' . $row['agencia'] . '</td>
					<td>' . $row['anio'] . '</td>
					</tr>';
		}
		$html .= '  
		</table>
		<center>
		<button type="button" class="btn btn-primary"><a class="link-light" href="index.html">REGRESAR</a></button></center>';
		
		return $html;
		
	}
//***************************************************************************************************************************
	
	private function _message_error($tipo){
		$html = '
		<table border="0" align="center">
			<tr>
				<th>Error al ' . $tipo . 'Favor contactar a .................... </th>
			</tr>
			<tr>
				<th><a href="vehiculo.php">Regresar</a></th>
			</tr>
		</table>';
		return $html;
	}
	
	
	private function _message_BD_Vacia($tipo){
	   $html = '
		<table border="0" align="center">
			<tr>
				<th> NO existen registros en la ' . $tipo . 'Favor contactar a .................... </th>
			</tr>
	
		</table>';
		return $html;
	
	
	}
	
	private function _message_ok($tipo){
		$html = '
		<table border="0" align="center">
			<tr>
				<th>El registro se  ' . $tipo . ' correctamente</th>
			</tr>
			<tr>
				<th><a href="vehiculo.php">Regresar</a></th>
			</tr>
		</table>';
		return $html;
	}
//************************************************************************************************************************************************

 
}
?>

