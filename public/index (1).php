<?php

$nombre = $_REQUEST['nombre'];

require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.ipage.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;  
$mail->Username = 'info@giravan.com';                 // SMTP username
$mail->Password = 'Jgiraldo0233';                           // SMTP password                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;
$mail->From = 'info@giravan.com';
$mail->FromName = 'Examenes Giravan';
$mail->addAddress('administracion@giravan.com'); 
$mail->addAddress('admon@epi.com.co');               // Name is optiona
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Examen 16PF de '.$nombre;
$mail->Body    = 'Adjunto archivo de excel de examen <br><br> No responder este correo';
$mail->addAttachment('../Preguntas/Resultados/'.$nombre.'.xlsx',''.$nombre.'.xlsx');
$mail->AltBody = 'No responder este correo';
$mail->CharSet = 'UTF-8';

if(!$mail->send()) {
    echo 'Su mensaje no pudo ser enviado.';
    echo 'Error del mensaje: ' . $mail->ErrorInfo;
} else {
	echo "<script language='javascript'>window.location='http://www.giravan.com/trabajar-con-nosotros'</script>";
    $mpdf->Output();
	echo "Enviado";
	exit;
	} 

?>