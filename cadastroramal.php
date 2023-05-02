<?php
session_start();
include_once 'conexao.php';
// redireciono caso a pagina nao encontre o id e nem o nome
if((!isset($_SESSION['nome']))) {
            
header("Location: index.php");

}
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro de ramais</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
   </head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Sistema de Cadastro</h3>
                    <h3 class="title has-text-grey"><a href="" target="_blank">Ramais</a></h3>
                                         
                    <div class="box">
                        <form action="cadastrarramal.php" method="POST">
                        <p>Ola! <?php echo $_SESSION['nome'];?></p>

                            <p id="demo">boa noite!</p>
                        
                            <br>
                            <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>	<br>
                        <div class="field">
                                <div class="control">
                                    <input required name="setor" type="text" class="input is-large" placeholder="Nome do setor" autofocus>
                                </div>
                            <br>
                            <div class="field">
                                <div class="control">
                                    <input required name="orgao" type="text" class="input is-large" placeholder="Nome orgão" autofocus>
                                </div>
                            <br>
                            <div class="field">
                                <div class="control">
                                    <input required id="in3" name="ramal" type="text" class="input is-large" placeholder="Ramal" autofocus>
                                </div>
                            <br>
                            <div class="field">
                                <div class="control">
                                    <input required type="email" name="email" type="text" class="input is-large" placeholder="Email" autofocus>
                                </div>
                            <br>
                            <div class="field">
                                <div class="control">
                                    <input name="ender" type="text" class="input is-large" placeholder="Endereço" autofocus>
                                </div>
                            <br>
                                                      

                            <button id="submit" name="cadastrar" class="button is-block is-link is-large is-fullwidth">Cadastrar</button> <br>
                            <a href="painel.php">Voltar</a>
                        </form>
                        <script>
                            $(document).ready(function() {
    $('#submit').click(function() {
        if (!$('#in3').val()) {
            alert('Entre com ramal!');
        }
    })
});
                        </script>
    
<script>
if (new Date().getHours() < 18) {
  document.getElementById("demo").innerHTML = "Bom dia!";
}

</script>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
   
</body>

</html>