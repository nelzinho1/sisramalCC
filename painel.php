<?php
session_start();
include_once 'conexao.php';
// redireciono caso a pagina nao encontre o id e nem o nome
if((!isset($_SESSION['nome']))) {
            
header("Location: index.php");


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Lista ramais - Neltech</title>
</head>
<body>
<div class="box">

<h3 style = "text-align:center;color:white;font-size: 200%;background-color: #276cda;border-radius: 8px;">-Cadastro de ramais-</h3>
<br>
<h2>Olá, bem vindo ao Cadastro de ramais  <?php echo $_SESSION['nome'];?>!</h2>
<br>


    <button> <a style="text-decoration: none; color:black;" href="pgusuario.php"> Lista de pesquisas - Ramais</a></button>
   <br>
   <br>
    <p>Adicionar Ramais a lista</p>
    <br>
    <form action="">
    <p>Pesquisar Ramais</p>
    <div class="field">
                                <div class="control">
        <input style =" width:400px; " name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
       </div>
       </div>
        <button style="cursor: pointer;" type="submit">Pesquisar</button>
        <button> <a style="text-decoration: none; color:black;" href="cadastroramal.php">Adicionar</a></button>
        <br>
        <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
        ?>
    </form>
    <br>
    <table width="900px" border="1">
        <tr>
            <th>Setor</th>
            <th>Orgão</th>
            <th>Ramal</th>
            <th>Sala</th>
           <!--  <th>Endereço</th> -->
            <th>Ação</th>
            <th>Apagar</th>
        </tr>
        <?php
        if (!isset( $_GET['busca'])) {
            ?>
        <tr >
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
                        <!-- <td><?php echo $dados['ender']; ?></td> -->.
                        <td><?php  echo "<a href='editarramal.php?id=" . $dados['id'] . "'>Editar</a>";?></td>
                        <td><?php  echo "<a href='apagarramal.php?id=" . $dados['id'] . "'>apagar</a>";?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>
    <br>
    <h2><a style="cursor: pointer; text-decoration: none;" href="logout.php"> <button>Sair</button> </a></h2>

    </div>
</body>
</html>



