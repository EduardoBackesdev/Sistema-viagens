<?php

// Conexão com banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=viagem_sistema', 'root', '');
// Conexão com banco de dados

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/styleConsulta.css">
    <title>Consulte sua Viagem</title>
</head>

<body>

    <section>
            <form class="sistemaConsulta" method="POST">
                <h2>Consulte o dia da sua viagem</h2>
                <select class="destino" name="pesquisaDestino">
                    <option value="selecione">Para onde voce vai?</option>
                    <option value="Sao Paulo">Sao Paulo</option>
                    <option value="Bahia">Bahia</option>
                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                </select>
                <input type="submit" name="acao" value="Consultar viagem">
            </form> 

                <?php
                    if(isset($_POST['acao'])){
                        $destino = $_POST['pesquisaDestino'];
                        $sql = $pdo->prepare("SELECT * FROM viagens WHERE destino=?");
                        $sql->execute([$destino]);
                        $info = $sql->fetchAll();

                        foreach ($info as $key => $value) {

                                echo '<div class="viagemMarcada">
                                    <p>Viagem marcada para o dia: '.$value['data'].'</p>
                                    </div>
                                    
                                    ';         
                        }}
                    ?>
                



                            <form method="POST">
                                 <p>Atualizar sua data de viagem</p>
                                 <input name="dataNova" type="date">
                                 <input type="submit" name="acaoAtt">         
                            </form>


                            <?php   

                       
                            if(isset($_POST['acaoAtt'])){
                            $novaData = $_POST['dataNova'];
                            
                                if(isset($destinoAntigo)){ 
                            $destinoAntigo = $_POST['pesquisaDestino'];
                            $sqlAtt = $pdo->prepare("UPDATE `viagens` SET destino='bahia' WHERE id=5");
                            $sqlAtt->execute();
                            }; 
                            }

                        
                            ?>




    </section>
    
</body>

</html>

                                  