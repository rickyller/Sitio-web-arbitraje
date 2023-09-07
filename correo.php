<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "arbitrozmg@outlook.com";
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $from = $_POST["from"];

    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Correo enviado correctamente.";
    } else {
        echo "Error en el envío del correo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de envío de correo</title>
</head>
<body>
    <h2>Formulario de envío de correo</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="from">De:</label>
        <input type="text" name="from" id="from" required><br><br>
        <label for="subject">Asunto:</label>
        <input type="text" name="subject" id="subject" required><br><br>
        <label for="message">Mensaje:</label><br>
        <textarea name="message" id="message" rows="5" cols="40" required></textarea><br><br>
        <input type="submit" value="Enviar correo">
    </form>
</body>
</html>
