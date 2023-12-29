<?php

// Setar timezone para São Paulo
date_default_timezone_set('America/Sao_Paulo');
// Setar timezone para São Paulo


// Conexão com o banco de dados via PDO
$pdo = new PDO('mysql:host=localhost;dbname=viagem_sistema', 'root', '');
// Conexão com o banco de dados via PDO


// Agendar viagem
if(isset($_POST['acao'])){
    $destino = $_POST['destino'];
    $data = $_POST['dataEscolhida'];

    $inserirViagem = $pdo->prepare('INSERT INTO `viagens` (destino, data) VALUES (?,?)');
    $inserirViagem->execute([$destino, $data]);
// Agendar viagem

}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <title>Agende sua viagem</title>
</head>

<body>

    <section class="cadastroViagem">
    
            <form class="sistema" method="POST">
                <h2>Cadastre sua viagem</h2>
                <select class="destino" name="destino">
                    <option value="selecione">Para onde voce quer ir?</option>
                    <option value="Sao Paulo">Sao Paulo</option>
                    <option value="Bahia">Bahia</option>
                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                </select>
                <input type="date" name="dataEscolhida">
                <input type="submit" name="acao" value="Agendar Viagem">
                <p onclick="redirecionamento()">Ja tem viagem marcada? Consulte aqui</p>
            </form>

    </section>

    <script src="Js/script.js"></script>
</body>

</html>