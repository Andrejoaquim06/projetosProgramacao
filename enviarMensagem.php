<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome     = htmlspecialchars(trim($_POST["nome"]));
    $email    = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $assunto  = htmlspecialchars(trim($_POST["assunto"]));
    $mensagem = htmlspecialchars(trim($_POST["mensagem"]));

    if (!$nome || !$email || !$assunto || !$mensagem) {
        die("Erro: Preenche todos os campos!");
    }

    // ⚠️ MUDAR PARA O TEU EMAIL
    $para = "andrejoaquimoficial@gmail.com";

    $assuntoEmail = "Nova mensagem do formulário: $assunto";

    $corpo = "Recebeste uma nova mensagem através do site:\n\n";
    $corpo .= "Nome: $nome\n";
    $corpo .= "Email: $email\n";
    $corpo .= "Assunto: $assunto\n\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    $headers  = "From: $nome <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($para, $assuntoEmail, $corpo, $headers)) {
        echo "<h2>Mensagem enviada com sucesso!</h2>";
        echo "<p>Obrigado por entrares em contacto.</p>";
    } else {
        echo "Erro ao enviar
