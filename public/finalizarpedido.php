<?php session_start();?>
<?php 
include_once('../conexion/conexion.php');
include_once('../mpdf/mpdf.php');
      $name=$_GET['name'];
	  $user=$_GET['user'];
	  $id=$_GET['id'];
	  $currency=$_GET['currency'];
	  $factura=$_GET['factura'];
	  $valor=$_GET['valor'];
	  
	  
	  
	  $Facturacion=$enlace -> query("INSERT INTO `factura` (`numerofactura`,`usuario`,`tipofactura`,`valor`) VALUES ('".$factura."','".$user."','virtual','".$valor."')");
	  
	  
	  $result=$enlace -> query("SELECT * FROM custumers where user = '".$user."' ");
	  
	  
	  
if($row = $result -> fetch_array())
  {
	  
	  $pedido='
	   <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="css/plantillaCss.css" rel="stylesheet" type="text/css">
</head>
<body>
<h3 align="center">Solicitud procesada con éxito</h3>
<table width="840px" align="center"    cellspacing="0" cellpadding="0">
  <tbody style=" border-collapse: collapse;border:1px solid #000; ">
    <tr>
    </tr>
	</tbody>
  </table>
  <h3 style="margin-left:40px">Datos del cliente</h3>
  <table width="830px" align="center" style="border-collapse: collapse;border:1px solid #000;font-family:Arial; font-size:14px ">
  <tr>
    <td style=" border-collapse:collapse;border:1px solid #000; cellpadding:2px; "><b>Nombre:</b> &nbsp;'.$row['name'].' '.$row['last'].'</td>
    <td style=" border-collapse:collapse;border:1px solid #000; cellpadding:2px;"><b>Empresa:</b>&nbsp;'.$row['company'].'</td>
    <td style=" border-collapse:collapse;border:1px solid #000; "><b>Teléfono:</b>&nbsp;'.$row['phone'].'</td>
  </tr>
  <tr>
  <td style=" border-collapse:collapse;border:1px solid #000; "><b>Ciudad:</b>&nbsp;'.$row['country'].'</td>
  <td style=" border-collapse:collapse;border:1px solid #000; "><b>Ciudad:</b>&nbsp;'.$row['state'].'</td>
    <td style=" border-collapse:collapse;border:1px solid #000; "><b>Ciudad:</b>&nbsp;'.$row['city'].'</td>
   </tr>
   <tr>
   <td style=" border-collapse:collapse;border:1px solid #000; "><b>Dirección:</b>&nbsp;'.$row['direction'].'</td>
    <td style=" border-collapse:collapse;border:1px solid #000; "><b>E-mail:</b>&nbsp;'.$row['email'].'</td>
	<td style=" border-collapse:collapse;border:1px solid #000; "><b>Factura:</b>&nbsp;'.$_GET['factura'].'</td>
   </tr>
</table>
  <h3 style="margin-left:40px">Productos cotizados</h3>
 <table width="830px" align="center" style="border-collapse: collapse;border:1px solid #000;font-family:Arial; font-size:14px ">
 <tbody>
  <TR>
    <TD style=" border-collapse: collapse;border:1px solid #000; " width="300px" align="center" bgcolor="#8CB6DF" colspan="5"><p><strong>Producto </strong></p></TD>
    <TD style=" border-collapse: collapse;border:1px solid #000; " width="100px" align="center" bgcolor="#8CB6DF" rowspan="2"><p><strong>Precio</strong></p></TD>
    <TD style=" border-collapse: collapse;border:1px solid #000; " width="90px" align="center" bgcolor="#8CB6DF" rowspan="2"><p><strong>Cantidad </strong></p></TD>
	<TD style=" border-collapse: collapse;border:1px solid #000; " width="90px" align="center" bgcolor="#8CB6DF" rowspan="2"><p><strong>Descuento </strong></p></TD>
    <TD style=" border-collapse: collapse;border:1px solid #000; " width="100px" align="center" bgcolor="#8CB6DF" rowspan="2"><p><strong>Subtotal</strong></p></TD>
  </TR>
  <TR>
    <TD  style=" border-collapse: collapse;border:1px solid #000; " width="100px" align="center" bgcolor="#8CB6DF" colspan="2"><strong>Marca</strong></TD>
    <TD  style=" border-collapse: collapse;border:1px solid #000; " width="100px" align="center" bgcolor="#8CB6DF"><strong>Kilovatios / Caballos</strong></TD>
    <TD  style=" border-collapse: collapse;border:1px solid #000; " width="100px" align="center" bgcolor="#8CB6DF"><strong>Modelo </strong></TD>
    <TD  style=" border-collapse: collapse;border:1px solid #000; " width="100px" align="center" bgcolor="#8CB6DF"><strong>Volt / Amp</strong></TD>
  </TR>';
				   }
				   $result=$enlace -> query("SELECT * FROM inverter as i inner join cart as c on i.id = c.idproduct where c.custumer = '".$user."'");
				   $tope = $result -> num_rows;
				   $vectorprofact[$tope];
					 for($i=0;$i<$tope;$i++)
						{
							
						 if($carrito = $result -> fetch_array())
							{
								$vectorprofact[$i]=$carrito['idproduct'];
								$price=$carrito['pricedollar'];
								if(strcmp("USD",$currency) == 0){
									
									if($carrito['quantity'] < 10){
									  
		$subtotal=($carrito['pricedollar'] * 0.72) * $carrito['quantity'] ;
		$Descuento= '28%';
	
	}else{
	if($carrito['quantity'] >= 10 && $carrito['quantity'] < 50){
		$subtotal=($carrito['pricedollar'] * 0.70) * $carrito['quantity'] ;
		$Descuento= '30%';
	}else{
		$subtotal=($carrito['pricedollar'] * 0.65) * $carrito['quantity'] ;
		$Descuento= '35%';
	}
	}
									
									}else{
										$price=$carrito['price'];
								  if($carrito['quantity'] < 10){
									  
		$subtotal=($carrito['price'] * 0.72) * $carrito['quantity'] ;
		$Descuento= '28%';
	
	}else{
	if($carrito['quantity'] >= 10 && $carrito['quantity'] < 50){
		$subtotal=($carrito['price'] * 0.70) * $carrito['quantity'] ;
		$Descuento= '30%';
	}else{
		$subtotal=($carrito['price'] * 0.65) * $carrito['quantity'] ;
		$Descuento= '35%';
	}
	}
									}
								$total=$total+$subtotal;
								
								 
								$pedido.='
								
<TR>
    <TD width="150px" align="center" style=" border-collapse: collapse;border:1px solid #000; " align="center"><img src="'.$carrito['photo'].'" width="90" height="90"></TD>
    <TD width="50px" align="center" style=" border-collapse: collapse;border:1px solid #000; " align="center" >'.$carrito['brand'].'  </TD>
    <TD width="100px" align="center" style=" border-collapse: collapse;border:1px solid #000; " align="center" >'.$carrito['power'].' / '.$carrito['HP'].'  </TD>
    <TD width="100px" align="center" style=" border-collapse: collapse;border:1px solid #000; " align="center" >'.$carrito['simplename'].' </TD>
    <TD width="100px" align="center" style=" border-collapse: collapse;border:1px solid #000; " align="center" >'.$carrito['voltage'].' / '.$carrito['current'].' </TD>
    <TD width="100" align="center" style=" border-collapse: collapse;border:1px solid #000; " align="center" >'."$".$price.' </TD>
    <TD width="80" align="center" style=" border-collapse: collapse;border:1px solid #000; " align="center" >'.$carrito['quantity'].' </TD>
	<TD width="87" align="center" style=" border-collapse: collapse;border:1px solid #000; " align="center" >'.$Descuento.' </TD>
    <TD width="100" align="center" style=" border-collapse: collapse;border:1px solid #000; " align="center" >'."$".$subtotal.'</TD>
</TR>';

							   }

						}
						
						$borrado=$enlace -> query("INSERT into record (`product`,`quantity`,`price`,`custumer`) SELECT i.name, c.quantity, i.price, c.custumer from inverter as i INNER JOIN cart as c where c.custumer = '".$user."' and i.id = c.idproduct");
						$borrado=$enlace -> query("DELETE from cart where custumer = '".$user."';");
						
$pedido .='<TR>
			   <TD colspan="6" style="border-collapse: collapse;border:1px solid #000;"></TD>
			   <TD align="right" bgcolor="#8CB6DF"><b>Total:</b></TD>
			   <TD colspan="2" align="center" bgcolor="#8CB6DF"><b>$'.$total.'</b></TD>
          </TR>
		  <TR>
			   <TD colspan="6" style="border-collapse: collapse;border:1px solid #000;"></TD>
			   <TD align="right" bgcolor="#8CB6DF"><b>iva 19%:</b></TD>
			   <TD colspan="2" align="center" bgcolor="#8CB6DF"><b>$'.($total*0.19).'</b></TD>
          </TR>
<TR>
			   <TD colspan="6" style="border-collapse: collapse;border:1px solid #000;"></TD>
			   <TD align="right" bgcolor="#8CB6DF"><b>Total+iva:</b></TD>
			   <TD colspan="2" align="center" bgcolor="#8CB6DF"><b>$'.($total+($total*0.19)).'</b></TD>
          </TR>
		  </tbody>
</table>';
$pedido .='
<h3 style="margin-left:40px">Visualizar fichas técnicas en las páginas siguientes.</h3>
<table align="center" width="830px" border="0" cellspacing="0" cellpadding="0">';
// las siguientes lineas me permiten que no se repitan las  caractereisticas  cuando se repite la serie del modelo

														 
$pedido.='</table></body></html>';
$html=$pedido;	
$message = 'Venta online #'.$factura.'';
$mpdf=new mPDF();
$mpdf->WriteHTML($html);
ini_set("memory_limit","128M");
$content = $mpdf->Output('', 'S');
//$content = chunk_split(base64_encode($content));
$filename = 'cotigiravan.pdf';

//de aqui en adelante phpmailler
require '../PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'epi.com.co';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;  
$mail->Username = 'cotigiravan@epi.com.co';                 // SMTP username
$mail->Password = 'jgiraldo0233';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 290;
$mail->From = 'cotigiravan@epi.com.co';
$mail->FromName = 'VENTA EN LÍNEA';
$mail->addAddress($email);     // Add a recipient
$mail->addAddress('sistemas@giravan.com','ventasenlinea@giravan.com');               // Name is optional
$mail->addReplyTo('jgiraldo@giravan.com');
$mail->addCC('ventas@giravan.com','ventas1@giravan.com');
$mail->addBCC('ventas@giravan.com','ventas1@giravan.com');
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $message;
$mail->Body    = '<b>Pronto estaremos respondiendo a esta solicitud</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->AddStringAttachment($content,$filename,"base64","application/pdf");
$mail->CharSet = 'UTF-8';


for($i=0;$i<$tope;$i++)
			{
			$idproduct=$vectorprofact[$i];
			$profact=$enlace -> query("INSERT INTO `facturaproducto` (`numerofactura`,`idproducto`) VALUES ('".$factura."','".$idproduct."')");			
			}


if(!$mail->send()) {
    echo 'Su mensaje no pudo ser enviado.';
    echo 'Error del mensaje: ' . $mail->ErrorInfo;
} else {
    $mpdf->Output();
	echo "Enviado";
	exit;
	}
?>