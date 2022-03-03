<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$cel = $_POST['number'];
$msg = $_POST['msg'];


$to = "lucasbrandao392@gmail.com";

$boundary = "XYZ-" . date("dmYis") . "-ZYX";
 $headers = "MIME-Version: 1.0\n";
 $headers.= "From: $email\n";
 $headers.= "Reply-To: $email\n";
 $headers.= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";  
 $headers.= "$boundary\n";   

$corpo_mensagem = " 
<br>Formulário de Envio <br>
<br>--------------------------------------------<br>
<br> <strong> Informações Preenchidas </strong> <br>
<br> <strong>Nome :</strong> $nome
<br> <strong>Email:</strong> $email
<br> <strong>Celular:</strong> $cel
<br> <br>

Olá meu nome é $nome, meu email é : $email e meu telefone é: $cel e gostaria de falar: <br> <br> $msg <br> aguardo o retorno. <br>
";

$assunto = "Formulario do Site Currículo";

    $mensagem = "--$boundary\n";  // Nas linhas abaixo possuem os parâmetros de formatação e codificação, juntamente com a inclusão do arquivo anexado no corpo da mensagem
    $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
    $mensagem.= "Content-Type: text/html; charset=\"utf-8\"\n\n";
    $mensagem.= "$corpo_mensagem\n"; 
    $mensagem.= "--$boundary\n"; 
    $mensagem.= "Content-Type: ".$arquivo["type"]."\n";  
    $mensagem.= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";  
    $mensagem.= "Content-Transfer-Encoding: base64\n\n";  
    $mensagem.= "$anexo\n";  
    $mensagem.= "--$boundary--\r\n"; 


if(mail($to, $assunto, $mensagem, $headers))
{
    echo "<br><br><center><b><font color='green'>Mensagem enviada com sucesso!";
    echo "<br><br><a href='index.html'>Voltar para a página de formulário</a>";
} 
 else
 {
    echo "<br><br><center><b><font color='red'>Ocorreu um erro ao enviar a mensagem!";
}
?>


