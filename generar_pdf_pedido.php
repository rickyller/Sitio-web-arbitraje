<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/PHPMailer-master/vendor/autoload.php');
require('fpdf/fpdf.php');
require('PHPMailer/PHPMailer-master/src/PHPMailer.php');
require('PHPMailer/PHPMailer-master/src/SMTP.php');
require('PHPMailer/PHPMailer-master/src/Exception.php');

if (isset($_SESSION['usuario']) && isset($_SESSION[$_SESSION['usuario']])) {
    $pedido = $_SESSION[$_SESSION['usuario']];
    $destinatario = 'richitork10@gmail.com'; // Cambia esto al correo del destinatario
    $usuarioID = $_SESSION['usuario']; // Obtén el ID del usuario de la sesión

    $pdfPath = __DIR__ . '/temp/detalle_pedido_' . $usuarioID . '.pdf'; // Cambia esto a la ubicación donde deseas guardar el PDF

    generarPDFPedido($pedido, $pdfPath, $destinatario, $usuarioID);

    header("Location: confirmacion.php");
    exit();
} else {
    // Si el usuario no está autenticado o no tiene productos en el carrito, redirige a la página de inicio de sesión o productos.
    header("Location: login.php"); // Cambia esto a la página a la que quieras redirigir.
    exit();
}

function generarPDFPedido($pedido, $pdfPath, $destinatario, $usuarioID) {
    // Crear una instancia de FPDF
    $pdf = new FPDF();

    // Agregar una página al PDF
    $pdf->AddPage();

    // Establecer el título y el contenido del PDF
    $pdf->SetFont('Courier', 'B', 16);
    $pdf->Cell(0, 10, 'Pedido', 0, 1, 'C');
    $pdf->Ln(10);

    // Definir los nombres de columna
    $pdf->SetFont('Courier', 'B', 12);
    $pdf->Cell(80, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Precio', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Cantidad', 1, 1, 'C');

    // Obtener los datos del pedido y agregarlos al PDF
    $pdf->SetFont('Courier', '', 12);
    foreach ($pedido as $producto) {
        $nombre = $producto['nombre'];
        $precio = $producto['precio'];
        $cantidad = $producto['cantidad'];

        $pdf->Cell(80, 10, $nombre, 1, 0, 'L');
        $pdf->Cell(40, 10, '$' . $precio, 1, 0, 'C');
        $pdf->Cell(40, 10, $cantidad, 1, 1, 'C');
    }

    // Agregar la imagen del logo (ajusta la ruta y dimensiones según tu necesidad)
    $pdf->Image('Images/logo3png.png', 10, 160, 100, 0);

    // Calcular el total a pagar
    $total = 0;
    foreach ($pedido as $producto) {
        $precio = $producto['precio'];
        $cantidad = $producto['cantidad'];
        $total += $precio * $cantidad;
    }

    // Agregar la fila con el total a pagar
    $pdf->SetFont('Courier', 'B', 12);
    $pdf->Cell(80, 10, '', 'LRB', 0, 'L');
    $pdf->Cell(40, 10, 'Total:', 'TB', 0, 'R');
    $pdf->Cell(40, 10, '$' . $total, 'TB', 1, 'C');

    // Agregar el mensaje de agradecimiento al final del PDF
    $pdf->Ln(10);
    $pdf->SetFont('Courier', 'B', 14);
    $pdf->Cell(0, 10, 'Gracias por su compra. ArbitroZMG.', 0, 1, 'C');

    // Guardar el PDF en la ubicación especificada
    $pdf->Output('F', $pdfPath);

    // Envía el PDF por correo electrónico utilizando PHPMailer
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Cambia esto al servidor SMTP que utilices
    $mail->SMTPAuth = true;
    $mail->Username = 'arbitrozmg@gmail.com'; // Cambia esto al correo electrónico del remitente
    $mail->Password = 'cyeiteuwrkqbrif'; // Cambia esto a la contraseña del correo del remitente
    $mail->Port = 587; // Cambia esto al puerto SMTP correspondiente

    $mail->setFrom('arbitrozmg@gmail.com', 'ArbitroZMG'); // Cambia esto al correo y nombre del remitente
    $mail->addAddress($destinatario); // Cambia esto al correo del destinatario

    $mail->Subject = 'Detalle de Pedido';
    $mail->Body = 'Adjunto encontrarás el detalle de tu pedido. ¡Gracias por tu compra!';
    $mail->addAttachment($pdfPath, 'detalle_pedido_' . $usuarioID . '.pdf'); // Adjunta el PDF generado con el ID del usuario

    try {
        if (!$mail->send()) {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        } else {
            echo 'El correo ha sido enviado exitosamente';
        }
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $e->getMessage();
    }
}
?>
