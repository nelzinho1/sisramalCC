<?php
session_start();
include("./conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_ramal = "DELETE FROM ramais WHERE id='$id'";
$resultado_ramal = mysqli_query($mysqli, $result_ramal);


if(mysqli_affected_rows($mysqli)) {
    $_SESSION['msg'] = " <p style='color:green;'>Ramal apagado com sucesso!</p>";
    header ("Location: painel.php");
}else{
    $_SESSION['msg'] = " <p style='color:red;'>Ramal não apagado com sucesso!</p>";
    header ("Location: editarramal.php?id=$id");

}
header('Location: painel.php');
exit();