<?php

session_start();
require('fpdf/fpdf.php');

if (isset($_SESSION['carrito'])) {
    $pedido = $_SESSION['carrito'];

    // Función para generar el PDF del pedido
    function generarPDFPedido($pedido, $pdfPath)
    {
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

        // Agregar la imagen del logo
        $pdf->Image('Images/logo3png.png', null, null, 100, 0);

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
        $pdf->Output($pdfPath, 'F');

        // Devolver la instancia del PDF generado
        return $pdf;
    }

    // Guardar el PDF en una ubicación temporal
    $pdfPath = 'temp/pedido.pdf'; // Ruta y nombre de archivo para el PDF

    // Generar el PDF del pedido
    generarPDFPedido($pedido, $pdfPath);

    // Datos del destinatario
    $to = 'richitork10@hotmail.com';
    $subject = 'Pedido';
    $message = 'Adjunto encontraras el PDF de tu pedido.';

    // Configuración del correo
    $from = 'arbitrozmg@gmail.com';
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

    // Mensaje en texto sin formato
    $textMessage = "Adjunto encontraras el PDF de tu pedido.";

    // Archivo adjunto
    $fileContent = file_get_contents($pdfPath);
    $attachment = chunk_split(base64_encode($fileContent));

    // Construir el cuerpo del mensaje
    $body = "--boundary\r\n";
    $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n";
    $body .= "\r\n";
    $body .= $textMessage;
    $body .= "\r\n";
    $body .= "--boundary\r\n";
    $body .= "Content-Type: application/pdf; name=\"pedido.pdf\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition: attachment\r\n";
    $body .= "\r\n";
    $body .= $attachment;
    $body .= "\r\n";
    $body .= "--boundary--";

    // Enviar el correo electrónico
    if (mail($to, $subject, $body, $headers)) {
        // Eliminar el PDF temporal después de enviar el correo
        unlink($pdfPath);

        // Redirigir a una página de confirmación o mostrar un mensaje al usuario
        header("Location: confirmacion.php");
        exit();
    } else {
        // Mostrar un mensaje de error
        header("Location: error-envio-correo.php");
        exit();
    }
}
?>

