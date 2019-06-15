<?php
	include('../../conexion/conexion.php');


	$i = 0;
	$empresa = $_REQUEST['empresa'];
	$nit = $_REQUEST['nit'];
	$equipo = $_REQUEST['equipo'];
	$lugar = $_REQUEST['lugar'];
	$fecha = $_REQUEST['fecha'];
	$tag = $_REQUEST['tag'];
	$cadena_desencriptada = decrypt($tag,"automatizacion y trasmision de potencia"); 
	
	if(strcmp($cadena_desencriptada,"Administrator") !== 0){
	
		echo "<script language='javascript'>window.location='http://www.giravan.com/'</script>";
		
	}
	
	//Guardamos el PDF
	$archivo=$_FILES["archivo"]["name"];
	$source1=$_FILES["archivo"]["tmp_name"];
	
	$directorio = '../../archivos/'.$empresa.'/'.$equipo.'/'.$fecha;
	if(!file_exists($directorio)){
				mkdir($directorio, 0777, true) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
	$dir=opendir($directorio);  //Abrimos el directorio de destino
	$target_path = $directorio.'/archivo.pdf';  //Indicamos la ruta de destino, así como el nombre del archivo
	echo $target_path;
	move_uploaded_file($source1, $target_path);
	
	
		//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["photos"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["photos"]["name"][$key]) {
			$filename = $_FILES["photos"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["photos"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../../imagenes/'.$empresa.'/'.$equipo.'/'.$fecha.'/';  //Declaramos un  variable con la ruta donde guardaremos los archivos
			$i += 1;
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777, true) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio);  //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$i.'.jpg';  //Indicamos la ruta de destino, así como el nombre del archivo
			move_uploaded_file($source, $target_path);
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			//if(move_uploaded_file($source, $target_path)) {	
				//echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				//} else {	
				//echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			//}
			closedir($dir); //Cerramos el directorio de destino
		}
	}
	
	function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}
	
	
if(isset($_POST['boton'])){
	$Insertarempresa= $enlace -> query("INSERT INTO empresas(razonsocial,nit) SELECT '".$empresa."','".$nit."' FROM dual WHERE NOT EXISTS (SELECT nit FROM empresas WHERE nit = '".$nit."' LIMIT 1)");
										
	$Insertarequipo= $enlace -> query("insert into certificacion (nit,lugar,equipo,fecha,numfotos) values ('".$nit."','".$lugar."','".$equipo."','".$fecha."',".$i.")");
}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrador Certificaciones</title>
<link rel="shortcut icon" href="../../imagenes/favicon.ico">

<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
  .modal-header, .close {
      background-color: #4388CB;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  .upload {
	display: none;
  }
  .uploader {
	border: 1px solid #ccc;
	width: 96%;
	position: relative;
	height: 30px;
	display: flex;
  }
  .uploader1 {
	border: 1px solid #ccc;
	width: 96%;
	position: center;
	height: 67px;
	display: flex;
  }
  .uploader .input-value{
	  border: 1px solid solid #ccc;
	width: 96%;
	padding: 5px;
	height: 30px ;
	line-height: 25px;
	font-family: sans-serif;
	font-size: 16px;
  }
   .uploader1 .input-value{
	  border: 1px solid solid #ccc;
	width: 96%;
	padding: 5px;
	height: 30px ;
	line-height: 25px;
	font-family: sans-serif;
	font-size: 16px;
  }
  .uploader label {
	cursor: pointer;
	margin: 0;
	width: 30px;
	height: 29px;
	position: absolute;
	right: 0;
	top: 0;
	background: #4488C9 url('../../imagenes/folder.png') no-repeat center 10px;
  }
  .uploader1 label {
	padding: 0px;
	cursor: pointer;
	margin: 0;
	width: 30px;
	height: 29px;
	right: 0;
	top: 0;
	background: #4488C9 url('../../imagenes/folder.png') no-repeat center 10px;
  }
   

.menubusq li {
	color:#000;
	display: block;
	text-align: none;
	hidden: hidden;
	
}

.menubusq li a:hover{
	hidden: hidden;
	background: #FF5500;
	color:#FFFFFF;
}

.menubusq .icono{
	float: right;
	margin-left:10px;
}

.menubusq ul {
	display:none;
	padding: 0;
}
.menubusq {
	padding: 0;
}

.menubusq ul li a {
	background: #B7B9C1;
}

.menubusq .activado > a {
	background: #265986;
	color: #FFFFFF; 
}

.menubusq .activado > ul {
	display:block;
}

.menubusq .activado .seleccionado > a {
	background: #CCE6CC;
	
}  
  </style>
</head>
<body>
<form id="nigga"  action="#" method="post" enctype="multipart/form-data">
		<div  style=" width: 70%; border-radius:5px;min-height: 20px;
		margin: 8% 15% 10% 15%;
		padding: 13px;
		background-color: #f5f5f5;
		border: 1px solid #e3e3e3;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		box-shadow: inset 0 1px 1px rgba(0,0,0,.05)">
		<table align="center" width="100%">
		<tr><td COLSPAN="1" width="25%" ></td> <td COLSPAN="4" width="50%" align = "center" style=" padding-left:5px;"  ><p style="position: inherit; width:100%; text-align: center; margin-top:2%;"><img src='../../imagenes/giravanlogo-001.png'  width='75%'></p></td><td COLSPAN="1" width="25%" ></td></tr>
		
		<tr align="center" style="background: #4488C9;  margin:13px; -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
			<td COLSPAN="6" align = "left" style=" padding-left:50px;"  ><h3 class="titulo" style="color:white;">INFORMACIÓN</h3></td>
		</tr>
		<tr>
		<td COLSPAN="6" height="20px" ></td>
		</tr>
		<tr  >
			<td COLSPAN="1" width="25%" ></td>
			<td COLSPAN="1" class="datospedidos" style=" padding-left:5px;" ><h4>Razón Social: </h4> </td><td COLSPAN="1" width="25%" style=" padding-left:5px;" > <input type="text" style="width:96%; height:30px; background:#f5f5f5; border: 1px solid #ccc; font-family: sans-serif;" id ="empresa" name = "empresa" ></td>
			<td COLSPAN="1"  class="datospedidos" style=" padding-left:5px;" ><h4>NIT: </h4></td><td COLSPAN="1" width="25%"  style=" padding-left:5px;" > <input type="text" id ="nit" style="width:96%; height:30px; background:#f5f5f5; border: 1px solid #ccc; font-family: sans-serif;" name = "nit" ></td>
			<td COLSPAN="1" width="25%" ></td>
		</tr>
		<tr >
			<td COLSPAN="1" width="25%" ></td>
			<td COLSPAN="1"  class="datospedidos" style=" padding-left:5px;" ><h4>Lugar: </h4> </td><td COLSPAN="1" width="25%" style=" padding-left:5px;" > <input type="text"  id ="lugar" style="width:96%; height:30px; background:#f5f5f5; border: 1px solid #ccc; font-family: sans-serif;"  name = "lugar" ></td>
			<td COLSPAN="1"  class="datospedidos" style=" padding-left:5px;" ><h4>Equipo: </h4></td><td COLSPAN="1" width="25%" style=" padding-left:5px;" > <input type="text"  id ="equipo" style="width:96%; height:30px; background:#f5f5f5; border: 1px solid #ccc; font-family: sans-serif;" name = "equipo" ></td>
			<td COLSPAN="1" width="25%" ></td>
		</tr>
		<tr >
			<td COLSPAN="1" width="25%" ></td>
			<td COLSPAN="1"  class="datospedidos" style=" padding-left:5px;" ><h4>Fecha: </h4> </td><td COLSPAN="1" width="25%" style=" padding-left:5px;" > <input type="date"  id ="fecha" name = "fecha" style="width:96%; height:30px; background:#f5f5f5; border: 1px solid #ccc; font-family: sans-serif;" max="<?php echo date("Y-m-d");?>" min="<?php $fecha = date('Y-m-j');
																					$nuevafecha = strtotime ( '-2 month' , strtotime ( $fecha ) ) ;
																					$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
																					echo $nuevafecha;?>" value="<?php echo date("Y-m-d");?>" ></td>
			<td COLSPAN="1" class="datospedidos" style=" padding-left:5px;" ><h4>Fotografias: </h4></td><td COLSPAN="1" rowspan="2" width="25%" style=" padding-left:5px;" >
			<div class="uploader1"> 
			<div id="inputval1" style="width:100%; height:60px; background:#f5f5f5;	font-family: sans-serif; top: 0; padding: 0px 0px 0px 2px;" class="input-value"><output id="list" style="padding:0px;"></output></div>
			<label  for="photos"></label>
			<input name="photos[]" style="display: none;" class="photos" type="file" id="photos" multiple="">
			</div></td>
			<td COLSPAN="1" width="25%" ></td>
		</tr>
		<tr >
			<td COLSPAN="1" width="25%" ></td>
			<td COLSPAN="1" class="datospedidos" style=" padding-left:5px;" ><h4>Informe: </h4> </td><td  COLSPAN="1" width="25%" style=" padding-left:5px;" >
			<div class="uploader"> 
			<div id="inputval" class="input-value"></div>
			<label  for="archivo"></label>
			<input type="file" class="archivo" style="display: none;" id="archivo" name="archivo" >
			</div></td>
			<td COLSPAN="1"  class="datospedidos" style=" padding-left:5px;" ></td><td COLSPAN="1" width="25%" style=" padding-left:5px;" ></td>
			<td COLSPAN="1" width="25%" ></td>
		</tr>
		
		<tr>
			<td COLSPAN="1" width="25%"></td>
			<td COLSPAN="4" width="50%" style="text-align:center; padding: 5px;"><input type="submit" class="botones" align="center" name="boton" value="Guardar información"></td>
			<td COLSPAN="1" width="25%"></td>
		</tr>
		<tr>
		</tr>
	</table>
	</div>
	<hr/>
	
	</form>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('.menubusq li:has(ul)').click(function(e){
		e.preventDefaul();
		
		if ($(this).hasClass('activado')){
			$(this).removeClass('activado');
			$(this).children('ul').slideUp();
		}else{
			$('.menubusq li ul').slideUp();
			$('.menubusq li').removeClass('activado');
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
			
		}
	});
	
	
});

$('#archivo').on('change',function(){
   $('#inputval').text( $(this).val());
 });

 function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li class="seleccionado" >', escape(f.name), '</li>');
    }
    document.getElementById('list').innerHTML = '<ul class= "menubusq" > <li class="activado" ><ul style="overflow:auto;height:auto; min-height:20px; max-height:62px;">' + output.join('') + '</ul> </li> </ul>';
  }

  document.getElementById('photos').addEventListener('change', handleFileSelect, false);
</script>