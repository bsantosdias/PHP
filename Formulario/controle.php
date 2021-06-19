<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <title> Pagina de controle do formulario </title>
</head>

<body>
    <?php

    $nome = $_REQUEST['nome'];
    $endereco = $_REQUEST['endereco'];
    $telefone = $_REQUEST['telefone'];
    $genero = $_REQUEST['genero'];
    $data = $_REQUEST['data'];
    $email = $_REQUEST['email'];
    $tipo = $_REQUEST['tipo'];
    $mensagem = $_REQUEST['mensagem'];
    $pronome = "x";
    $tipomsg = "";


    if ($genero == 'Feminino') {
        $pronome = "com a senhora";
    } elseif ($genero == 'Masculino') {
        $pronome = "com o senhor";
    } elseif ($genero == 'Outro') {
        $pronome = "";
    }

    if ($tipo == 'Reclamação') {
        $tipomsg = "sua reclamação";
    } elseif ($tipo == 'Sugestão') {
        $tipomsg = "sua sugestão";
    } elseif ($tipo == 'Elogio') {
        $tipomsg = "seu elogio";
    }


    if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
        echo '<a href="Formulario.html">Voltar para o formulário</a><br>';
        die('E-mail inválido.');
    }
    if (!preg_match('/(\([0-9]{2}\))([9]{1})?([0-9]{4})-([0-9]{4})/', $_REQUEST['telefone'])) {
        echo '<a href="Formulario.html">Voltar para o formulário</a><br>';
        die('Telefone com formato inválido! Por favor, adicione no formato (99)99999-9999 ou (99)9999-9999');
    }

    if (empty($nome) || empty($endereco) || empty($telefone) || empty($data) || empty($email) || empty($tipo) || empty($mensagem) ){
        echo '<a href="Formulario.html">Voltar para o formulário</a><br>';
        die ("Preencha todos os campos com * para prosseguir.");
    }

    $saida = "<p>Olá, $nome.<br> Agradecemos $tipomsg. Se necessário, entraremos em contato $pronome pelo email: $email,
ou pelo número $telefone.</p><br> Para verificação, os dados informados foram:<br>Nome: $nome<br>Endereço: $endereco<br>
Telefone: $telefone<br>Gênero: $genero<br>Data de nascimento: $data<br>E-mail: $email<br>Motivo do contato: $tipo<br>Mensagem: $mensagem";

    echo $saida;

    ?>
</body>

</html>