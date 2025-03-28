<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP do Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'liaragraminhovictor@gmail.com'; // Seu e-mail do Gmail
        $mail->Password = 'aukp fgac fgng fxub'; // Sua senha de app do Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS
        $mail->Port = 587; // Porta do Gmail

        $mail->setFrom('liaragraminhovictor@gmail.com', 'Liara Graminho Victor');
        $mail->addAddress('liaragraminhovictor@gmail.com', 'Liara Graminho Victor');

        $mail->isHTML(true); // Definir como true para enviar e-mail em HTML
        $mail->Subject = $subject;
        $mail->Body    = "Você recebeu uma nova mensagem do seu portfólio:<br><br>" .
                         "<strong>Nome:</strong> $name<br>" .
                         "<strong>Email:</strong> $email<br>" .
                         "<strong>Título:</strong> $subject<br>" .
                         "<strong>Mensagem:</strong><br>$message<br>";

        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar a mensagem. Tente novamente. Erro: {$mail->ErrorInfo}";
    }
} else {
    echo "Método de requisição inválido.";
}
?>