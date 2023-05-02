<?php
session_start();
include_once("conexao.php");

$id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$setor = filter_input (INPUT_POST, 'setor', FILTER_SANITIZE_STRING);
$orgao = filter_input (INPUT_POST, 'orgao', FILTER_SANITIZE_STRING);
$ramal = filter_input (INPUT_POST, 'ramal', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$ender = filter_input (INPUT_POST, 'ender', FILTER_SANITIZE_STRING);

$result_ramal = "UPDATE ramais SET setor='$setor', orgao='$orgao', ramal='$ramal', email='$email', ender='$ender', data_cadastro=NOW() WHERE id='$id'";
$resultado_ramal = mysqli_query($mysqli, $result_ramal);

if(mysqli_affected_rows($mysqli)) {
    $_SESSION['msg'] = " <p style='color:green;'>Ramal alterado com sucesso!</p>";
    header ("Location: painel.php");
}else{
    $_SESSION['msg'] = " <p style='color:red;'>Ramal não alterado com sucesso!</p>";
    header ("Location: editarramal.php?id=$id");

}