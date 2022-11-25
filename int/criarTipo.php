<?php
require_once("conexao.php");

$tipoNew = $_POST['tipoNew'];

//Validar tipo
$query = $pdo->query("SELECT * from tipo where nome = '$tipoNew'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg != 0 ){
	echo 'Este tipo já está cadastrada';
	exit();
} 

$query = $pdo->prepare("INSERT tipo SET nome = :tipoNew");
$query->bindValue(":tipoNew", "$tipoNew");
$query->execute();

echo 'Salvo com Sucesso!';

?>


