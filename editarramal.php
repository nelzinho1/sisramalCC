<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_ramal = " SELECT * FROM ramais WHERE id = '$id'";
$resultado_ramal = mysqli_query($mysqli, $result_ramal);
$row_ramal = mysqli_fetch_assoc($resultado_ramal);
if((!isset($_SESSION['nome']))) {
            
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
		<title>Editar ramais</title>		
	</head>
	<body>


    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
		
        

		<h3 style = "color:white;font-size: 200%;background-color: #276cda;border-radius: 8px;">Editar Ramais</h3>
		<br>
        <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>	
        <div class="box">
        <div id="area">
        <form method="POST" action="proc_edit_usuario.php" id="formulario" autocomplete="off">
        <input type="hidden"name="id" value="<?php echo $row_ramal['id']; ?>">
        
            
        
        <div class="field">
        <div class="control">
            <input class="input is-large" autofocus type="text"name="setor" placeholder="Digite aqui o Setor" value="<?php echo 
            $row_ramal['setor']; ?>"> <br><br> </div></div>
            
           
            <div class="field">
             <div class="control">
                <input class="input is-large" autofocus type="text"name="orgao" placeholder="Digite aqui o Orgão"value="<?php echo 
            $row_ramal['orgao']; ?>"> <br><br></div></div>
            
             
            <div class="field">
            <div class="control">
                <input class="input is-large" autofocus type="text"name="ramal" placeholder="Digite Ramal"value="<?php echo 
            $row_ramal['ramal']; ?>"> <br><br></div></div>
            
            
            <div class="field">
             <div class="control"> 
                <input class="input is-large" autofocus type="text"name="email" placeholder="Digite a Sala"value="<?php echo 
            $row_ramal['email']; ?>"> <br><br></div></div>
            
            <!--
            se caso precisar eu posso utilizalo de novo    
            <div class="field">
            <div class="control"> 
                <input class="input is-large" autofocus type="text"name="ender" placeholder="Digite aqui o Endereço"value="<?php echo 
            $row_ramal['ender']; ?>"> <br><br></div></div>-->
            
            
            <input class="button is-block is-link is-large is-fullwidth" type="submit" value="Editar"> <br>
            <a style="color:black;text-decoration:none;"href="cadastroramal.php">Cadastrar ramais</a><br>
		<a style="color:black;text-decoration:none;"href="pgusuario.php">Listar pagina para usuarios</a>

        </form>
        </div>
</div>
</div>
</div>

       
        </div>
	</body>
</html>