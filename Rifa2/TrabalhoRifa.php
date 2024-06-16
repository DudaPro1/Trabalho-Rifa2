<!-- Esta parte eu fiz umas pesquisas para entender como eu poderia salvar todas as infomações da rifa para que toda 
vez que apertar em voltar ou simplesmente ir a página inicial as informações não sumissem e FUNCIONOU -->


<?php
session_start(); // Inicia a sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Armazena os dados dos campos em variáveis de sessão
    for ($i = 1; $i <= 30; $i++) {
        // Armazena o valor do campo 'name' na variável de sessão 'name$i' ou uma string vazia se não estiver definido
        $_SESSION["name$i"] = isset($_POST["name$i"]) ? $_POST["name$i"] : '';
        // Armazena o valor do campo 'phone' na variável de sessão 'phone$i' ou uma string vazia se não estiver definido
        $_SESSION["phone$i"] = isset($_POST["phone$i"]) ? $_POST["phone$i"] : '';
        // Armazena o valor do campo 'email' na variável de sessão 'email$i' ou uma string vazia se não estiver definido
        $_SESSION["email$i"] = isset($_POST["email$i"]) ? $_POST["email$i"] : '';
    }

    //No caso faz parte de salvar os dados da página sem sumir quando sair
    // Simplesmente redireciona de volta à página da rifa
    header("Location: rifa.php"); // Redireciona o navegador para a página 'rifa.php'
    exit(); // Encerra o script para garantir que o redirecionamento seja executado corretamente
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa - Bilhetes</title>
    <link rel="stylesheet" href="styleRifa.css">
</head>
<body>
    <div class="container">
        <h1>Ação entre Amigos - CSL</h1>
        <form method="post">
            <?php
            $premio = "Rádio JBL";
            $valor = 8.50;
            $quantNum = 30;

            for ($i = 1; $i <= $quantNum; $i++) {
                // Obtém o valor armazenado na variável de sessão 'name$i' ou uma string vazia se não estiver definido
                $name = isset($_SESSION["name$i"]) ? $_SESSION["name$i"] : ''; 
                // Obtém o valor armazenado na variável de sessão 'phone$i' ou uma string vazia se não estiver definido
                $phone = isset($_SESSION["phone$i"]) ? $_SESSION["phone$i"] : ''; 
                // Obtém o valor armazenado na variável de sessão 'email$i' ou uma string vazia se não estiver definido
                $email = isset($_SESSION["email$i"]) ? $_SESSION["email$i"] : ''; 

                echo "<div class='ticket'>";
                echo "<div class='left-side'>";
                echo "<div class='ticket-info'>";
                echo "<img src='https://www.jbl.com.br/dw/image/v2/BFND_PRD/on/demandware.static/-/Sites-masterCatalog_Harman/default/dwbc5ed184/JBL_BOOMBOX3_WIFI_HERO_37919_x4.png?sw=400&sh=400&sm=fit&sfrm=png'>";
                echo "<p>Prêmio: $premio</p>"; //Nome do prêmo
                echo "<label>Número do Bilhete: </label> $i <br>";
                echo "<label>Nome: </label> <input type='text' name='name$i' placeholder='Seu Nome' value='$name'><br>";
                echo "<label>Telefone: </label> <input type='text' name='phone$i' placeholder='Seu Telefone' value='$phone'><br>";
                echo "<label>Email: </label> <input type='email' name='email$i' placeholder='Seu Email' value='$email'><br>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>

            <input type="submit" value="Salvar"> <!-- Botão de envio do formulário -->
            <a href="index.php" class="back-button">Voltar</a>
        </form>
    </div>
</body>
</html>