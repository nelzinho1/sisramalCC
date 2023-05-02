<?php
session_start();
include("./conexao.php");

if(isset($_POST['cadastrar'])){
$setor = $_POST['setor'];
$orgao = $_POST['orgao'];
$ramal = $_POST['ramal'];
$email = $_POST['email'];
$ender = $_POST['ender'];
$query = mysqli_query($mysqli, "INSERT INTO ramais (setor, orgao, ramal, email, ender, data_cadastro) VALUES ('$setor', '$orgao', '$ramal', '$email', '$ender', NOW()) ");

if(mysqli_affected_rows($mysqli)) {
    $_SESSION['msg'] = " <p style='color:green;'>Ramal cadastrado com sucesso!</p>";
    header ("Location: cadastroramal.php");
}else{
    $_SESSION['msg'] = " <p style='color:red;'>Ramal não cadastrado com sucesso!</p>";
    header ("Location: cadastroramal.php?id=$id");

}
}
