<?php
include('conexao.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Sistema de Busca</title>
</head>
<body>
   

<div class="box" style = "text-align:center;">
    
    <h3 style = "color:white;font-size:200%;background-color: #276cda;border-radius: 8px;">-Lista de Ramais-</h3>
    
    <br><br>
    <form action="" style = "text-align:center;">
        <input style =" width:400px; " name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite o nome ou ramal para pesquisa!" type="text">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table width="900px" border="1">
        <tr>
            <th>Setor</th>
            <th>Orgão</th>
            <th>Ramal</th>
            <th>Sala</th>
            <!-- <th>endereço</th> --> 
        </tr>
        <?php
        if (!isset( $_GET['busca'])) {
            ?>
        <tr style ="color:black;">
            <td colspan="5">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
                FROM ramais 
                WHERE setor LIKE '%$pesquisa%' 
                OR orgao LIKE '%$pesquisa%'
                OR ramal LIKE '%$pesquisa%'
                OR email LIKE '%$pesquisa%'
                OR ender LIKE '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="5">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['setor']; ?></td>
                        <td><?php echo $dados['orgao']; ?></td>
                        <td><?php echo $dados['ramal']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        
                        <!-- <td><?php echo $dados['ender']; ?></td> -->
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>
    </div>
   </body>
</html>