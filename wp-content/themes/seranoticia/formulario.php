<?php
/*
este formulario utiliza la clase PHPMailer para el envio y proceso.
Es solo un ejemplo de una posible implementacion de PHPMailer
La clase se puede descargar desde http://phpmailer.sourceforge.net/
Junto con mas ejemplos y documentacion.
*/

/*
NOTA: 
este archivo debe estar acompañado de una carpeta
con el nombre "archivos" en donde se copiaran los
archivos. Esta carpeta debe tener chmod 777. 
*/
//CONFIGURACION 
$maximo_tamano= '1000240000'; 														//tamaño maximo de los archivos. 100000 equivale a 100kb.
$direccion_envio= 'guajardourzua@gmail.com'; 		//la direccion a la que se enviara el email.
$url=  "/contactos/"; //la URL donde esta publicado el formulario. SIN la barra al final

//FIN CONFIGURACION
?>


<?PHP
//proceso del formulario
// si existe "enviar"...
if (isset ($_POST['enviar'])) {

 
  
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$twitter=$_POST['twitter']; 
$ubicacion = $_POST['ubicacion'];
$comentario=$_POST['comentario'];
 
if ($nombre!='' && $email!='' && $comentario!='' ) {//verifico si estan todos los campos necesarios
// vamos a hacer uso de la clase phpmailer, 
$error_archivo_flag=0;
$cantidad_archivos = count($_FILES['archivo']['tmp_name']);
$aleatorio = rand(); 
for($i=0;$i<$cantidad_archivos;$i++){
	 	/*
	Archivo 1 : Avatar;
	*/
	//Datos 
	$ruta_archivo = $_FILES["archivo"]["tmp_name"][$i];  
	$tam_archivo = $_FILES["archivo"]["size"][$i]; 
	$tipo_archivo    = $_FILES["archivo"]["type"][$i]; 
	$nombre_archivo  = $_FILES["archivo"]["name"][$i]; 
	
	//ELEGIR id para nombres y carpetas 
	 if(isset($_FILES['archivo']['tmp_name'][$i])){

		 //Comprobar Tamaño y Extensión
		 ///////////////////////////////////////
		 if($i==0){/*AVATAR*/
			 switch ($tipo_archivo) {
				case "image/pjpeg":
				$ext_avater="jpg";
				break;
				case "image/jpeg":
				$ext_avater="jpg";
				break;
				case "image/png":
				$ext_avater="png";
				break;
				default:
				$ext_avater="error";
				break;
			}
		 
			if ($ext_avater=="error") {
				$error_archivo .="<br />- No ha seleccionado 'Imagen' o el Formato es incorrecto";
				$error_archivo_flag=1;
			}
			if ($tam_archivo > $maximo_tamano) {
				$error_archivo .="<br />- El tama&ntilde;o del archivo 'Imagen' supera el m&aacute;ximo permitido ( ".$maximo_tamano." )";
			    $error_archivo_flag=1;
			}
			
				$nombreoriginal= explode ('.', $nombre_archivo); 
				$nuevonombre_avatar="imagen".'-'.$nombre.'-'.$aleatorio.'.'.$ext_avater;
				
		 }
		 //revisar flag, so estan todos en cero, copiar al servidor
	 
	
	}
	else{//SI LA VARIABLE ES NULL  / Error captura que no ha seleccionado archivo, verificar!
		$mensaje .='<div id="ERROR">No se han seleccionado Imagen<br /></div>';
		$messages[] = 'No se han seleccionado Imagen';
		$error_archivo_flag=1;	
	}
	
}

 if($error_archivo_flag==0){
 
 	//crear Directorio nuevo
 	$directorio_nuevo = $nombre.'_'.$aleatorio;
 	$dir_raiz = $_SERVER['DOCUMENT_ROOT']."/FotoDenuncia";

	//mkdir($dir_raiz.'/Fotodenuncia/'.$directorio_nuevo);
	//Subir los 3 Archivos
 	copy($_FILES['archivo']['tmp_name'][0],$dir_raiz.'/'.$nuevonombre_avatar);

	//Crear HTML's
	
	require("class.phpmailer.php");

	$mail = new PHPMailer();
	//recogemos las variables y configuramos PHPMailer
	$mail->From     = $_POST['email'];
	$mail->FromName = $_POST['nombre'];
	$mail->AddAddress($direccion_envio); 
	$mail->Subject = "Contacto desde el Formulario";
	$mail->AddReplyTo($_POST['email'],$_POST['nombre']);
	$mail->IsHTML(true);                              
	$comentario=$_POST['comentario'];
	
	
	//Contenido al editor
	$contenido = '<html><body>';
	$contenido .= '<h2>Nueva FotoDenuncia</h2>';
	$contenido .= '<p>Enviado el '.  date("d M Y").'</p>';
	$contenido .= '<hr />';
	$contenido .= '<p>Nombre: <strong>'.$nombre.'</strong>';
	$contenido .= '<p>Email: <strong>'.$email.'</strong>';
	$contenido .= '<p>Twitter: <strong>'.$twitter.'</strong>';
	$contenido .= '<p>Comentario: <strong>'.$comentario.'</strong>';
	$contenido .= '<p><strong>_________________________________________________</strong>';

	
	$mail->Body    = $contenido;
	$mail->AddAttachment($dir_raiz.'/'.$nuevonombre_avatar.'', $nuevonombre_avatar);  // optional name
	// si todos los campos fueron completados enviamos el mail
	
	$mail->Send();
	
	
	//Email al Usuario 
	$contenido_respuesta = '<html><body>';
	$contenido_respuesta = '<a href="http://www.seranoticia.cl"><img src="#"; /></a>';
	$contenido_respuesta .= '<strong><h2 style="color: #a64372"> &#161;Bac&aacute;n&#33; &#161;Hemos recibido tu Foto-Denuncia&#33;</h2><h2> <br/>Si todo anda bien la publicaremos a la brevedad<br/> <br/>Saludos.<br/> <br/><i>Seranoticia.cl</i></h2></strong>';
	$contenido_respuesta .= '<p>Enviado el '.  date("d M Y").'</p>';
	$contenido_respuesta .= '</body></html>';
	 
	mail ($email, "Gracias :)", $contenido_respuesta, "From: fotodenuncia@seranoticia.cl\nContent-Type: text/html; charset=iso-8859-1\nContent-Transfer-Encoding: 8bit"); 
	//Fin Email al Usuario
	$flag='ok';
	$mensaje='<div id="ok">Su archivo ha sido adjuntado con &eacute;xito<br /> Gracias por Contactarnos</div>';

 }
 else{
	 
	 $flag='err';
	 $mensaje='<div id="error">- Los Campos Marcados Con * Son Requeridos. '.$error_archivo.'</div>';
	 
	 //echo "->".$messages[];

 }

} 
else {
	
//si no todos los campos fueron completados se frena el envio y avisamos al usuario	
$flag='err';
$mensaje='<div id="error">- Los Campos Marcados Con * Son Requeridos. '.$error_archivo.'</div>';

}

}//Fin del segundo if (se comprueban los campos)

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>www.seranoticia.cl</title>
	<style>
	
	 body {
			font: 1em Lucida Grande, 'Trebuchet MS', verdana, sans-serif;
			font-size: 76%;}
					
	#form {
	      
		  margin: 0 auto;
		  width:450px !important;
		  padding:14px 0 0 0 !important;
	}	
			/*MIS CSS*/
	#form .campo-formulario-envio{

    	margin-bottom: 10px;
	}	
	#form .campo-formulario-envio div{
		text-align: left; 
		 
		 
		position: relative;
		 
		/*box-shadow: 2px 2px 4px #cfcfcf; 	*/
	}
 	#form .campo-formulario-envio div img
	{
		position: absolute;
		top:8px;
		left: 7px;
		width: 25px;

	}
	#form label {
		display:block;
		font-weight:bold;
		text-align:left;
		width:100%;
		
	}	
	#form label span{
		color:#666666;
		display:block;
		font-size:11px;
		font-weight:normal;
		text-align:right;
		width:190px;
		
	}	
	#form .imagen{
		padding-top: 1px;
	}
	#form .entorno_campos_formulario{
		width: 100%;
		margin:0 0 5px 0; 
		border-bottom: solid thin #cfcfcf;
	}
	h2#titulo_principal{
			font-size: 2em;
			width: 100%;
			color: white;
			margin: 2em 0 0.5em 0;
			padding: 0;
	}
	#form h2{
			font-size: 2em;
			width: 100%;
			color: white;
			margin: 0 0 0.5em 0;
			padding: 0;}

	#form h3.subtitulos{ 
			color: black;
			display: table;
			width: 100%;
			padding: 5px;
			font-size: 1.2em; 
			margin-bottom: 10px;

			/*border-bottom: solid thin #cfcfcf;*/
			}


	#form .campo {
			/*float:left;*/
			font-size: 1.5em;
			font-size:12px;
			padding:0 0 0 40px; 
			width:100%;
			height: 32px;
			border-radius: 5px;
			margin:0;
			vertical-align: top;
			outline: none;
			border: 2px solid #cfcfcf;
			box-shadow: 1px 1px 15px #cfcfcf inset; 
			}
    #form .campo:hover{
    	background-color: #f7f7f7;
    }
    #form .campo:focus{
    	background-color: #f7f7f7;
    }
 	#form .campo2 {
		
			padding-top:7px !important; 
		
			}
	#form .com {
			border: none;
		
			margin:0;			
			/*height: 5em;*/
			font: 1.5em Lucida Grande, 'Trebuchet MS', verdana, sans-serif;
		 	border-radius: 0 5px 5px 0;
			font-size:12px;
			padding:0; 
			width:90%;
			max-width: 200px;	
			background-color: red
		
			}

	#form .error {
			font-size: 1.5em;
			font-size:12px;
			padding:0 0 0 40px; 
			width:100%;
			height: 32px;
			border-radius: 5px;
			margin:0;
			vertical-align: top;
			outline: none;
			border: 2px solid red;
			box-shadow: 1px 1px 15px #cfcfcf inset; 
			}
 	#form .error:hover {
			background: #f7f7f7;
			}
 
		#form .error:focus {
			background: #f7f7f7;
			}
	
	#form .com-error {
			border: 1px solid #F00;
						
			float: left;
		height: 30px;
			margin:2px 0 20px 10px;		
			font: 1.5em Lucida Grande, 'Trebuchet MS', verdana, sans-serif;
		 	border-radius:7px;
			font-size:12px;
			padding:4px 2px; 
			width:200px;
			max-width: 200px;		
	}
    #form .boton-subirArchivo {
			border: 2px solid #999;
			padding: 0.3em;
			float: right;
			font-size: 1.2em;
			width: 100%;
		}
	  #form .boton {
			/*border: 2px solid #999 !important;*/
			border-radius: 5px;
			padding: 0.3em !important; 
			font-size: 1.2em !important;
			width: 5em !important;
 			display: block;
 			background-color: #cfcfcf;
 			margin: 0 auto;
		}	


	 #error {
		  border: 1px dashed #F00;
		  background-color: #FFF;
		  padding: 5px;}

	 #ok {
	    border: 1px dashed #060;
	    background-color:#FFF;
	    padding: 5px;}	
	    
	    
	   .encabezado p, h2.titulo-publicaAqui, h3.titulo-publicaAqui{
		   
		   color: #a64372;
	   }
		</style>

	</head>
	<body>
 
 
		<h2 class="verde" id="titulo_principal"> Formulario de Envio </h2>
	<div id="form">
		
	<?php echo $mensaje; /*mostramos el estado de envio del form */ ?>
	<?php if ($flag!='ok') { ?>
	<form action="<?php echo $PHP_SELF;?>" method="post" enctype="multipart/form-data">
		<h3 class="subtitulos"></h3>
		<div class="campo-formulario-envio ">
				<!-- <label>Nombre*<span></span></label> -->
				<div>
					
					<!-- <input type="image" id="searchsubmit" src="<?php //echo IMAGES; ?>/nombre.png" width="18"/> -->
					<input <?php if (isset ($flag) && $_POST['nombre']=='') { echo 'class="error"';} else {echo 'class="campo"';} ?> type="text" name="nombre" value="<?php echo $_POST['nombre'];?>" placeholder="Nombre *"/>
					<img src="<?php echo IMAGES; ?>/Form_nombre.png" alt="">
				</div>
		</div>
		<div class="campo-formulario-envio ">
				<!-- <label>Email*<span></span> </label> -->
				<div>
					
					<input <?php if (isset ($flag) && $_POST['email']=='') { echo 'class="error"';} else {echo 'class="campo"';} ?> type="text" name="email"  value="<? echo $_POST['email'];?>" placeholder="E-mail *" />
					<img src="<?php echo IMAGES; ?>/Form_email.png" alt="">
				</div>
		</div>
		<div class="campo-formulario-envio ">
				<!-- <label>Twitter*<span></span> </label> -->
				<div>
					
					<input <?php if (isset ($flag) && $_POST['twitter']=='') { echo 'class="error"';} else {echo 'class="campo"';} ?> type="text" name="twitter"  value="<? echo $_POST['twitter'];?>" placeholder="Twitter"/>
					<img src="<?php echo IMAGES; ?>/Form_twitter.png" alt="">
				</div>
		</div>
		<div class="campo-formulario-envio ">
				<!-- <label>Ubicación*<span></span> </label> -->
				<div>
					
					<input <?php if (isset ($flag) && $_POST['ubicacion']=='') { echo 'class="error"';} else {echo 'class="campo"';} ?> type="text" name="ubicacion"  value="<? echo $_POST['ubicacion'];?>" placeholder="Ubicación"/>
					<img src="<?php echo IMAGES; ?>/Form_ubicacion.png" alt="">
				</div>
		</div>
		<div class="campo-formulario-envio ">
			<!-- <label>Imagen*<span>Formatos: *.jpg, *.png / Máx. 1mb</span></label> -->
			<div>
				
				<input <?php if (isset ($flag) && $ext_avater=='error' || $tamano > $maximo_tamano) { echo 'class="error"';} else {echo 'class="campo campo2"';} ?> type="file" name="archivo[]"  value="<? echo $_FILES['archivo']['tmp_name'][0];?>" />
				<img class="imagen" src="<?php echo IMAGES; ?>/Form_imagen.png" alt="">
			</div>
		</div>	
		<div class="campo-formulario-envio ">	

			<!-- <label>Descripción*<span>Para mostrar en la Imagen</span></label> -->
			<div>
				
				
				<input <?php if (isset ($flag) && $_POST['comentario']=='') { echo 'class="error"';} else {echo 'class="campo"';} ?> type="text" name="comentario"  value="<? echo $_POST['comentario'];?>" placeholder="Comentario*"/>
				<img class="imagen" src="<?php echo IMAGES; ?>/Form_comentarios.png" alt="">
				<!-- <textarea <?php //if (isset ($flag) && $_POST['comentario']=='') { echo 'class="com-error"';} else {echo 'class="com"';} ?> name="comentario"><? //echo $_POST['comentario'];?></textarea> -->
			</div>
			<label class="entorno_campos_formulario"></label>
		</div>
		<div class="campo-formulario-envio ">
			<input class="boton" type="submit" name="enviar" value="enviar" />
		</div>
	</form>
<?php } ?>
	</div> <!-- end form-->

	</body>
</html>