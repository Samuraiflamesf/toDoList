<?php
require_once("conexao.php");

$tipo = $_POST['tipo'];
$opTipos = $_POST['opTipos'];

//Validar tipo
$query = $pdo->query("SELECT * from tipo WHERE nome = '$tipo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg != 0 ){
	echo 'Este tipo já está cadastrada';
	exit();
} 
elseif($tipo == ''){
	exit();
}

$query = $pdo->prepare("UPDATE tipo SET nome = :tipoEdit WHERE id_tipo = :opTipos");
$query->bindValue(":tipoEdit", "$tipo");

$query->execute();

echo 'Salvo com Sucesso!';

?>



