<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';


    //correo de la BD
    $txtCorreo=(isset($_POST['correo']))?$_POST['correo']:"";

    //empleado
    $txtNombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $txtApellido=(isset($_POST['paterno']))?$_POST['paterno']:"";


    


    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'foxcoon.pruebas@gmail.com';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('foxcoon.pruebas@gmail.com', 'Administrador');
        $mail->addAddress($txtCorreo);     //Add a recipient



        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Su compra fue aprobada';
        $mail->Body    = 'El repartidor '.$txtNombre." ".$txtApellido.' sera el encargado de entregarle su pedido y su recibo de la compra <br> Su pedido llegara entre 1 a 15 dias para mas informacion contactese con el numero:  +886-2-2268-3466';


        $mail->send();
        echo 'ok';
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }




?>