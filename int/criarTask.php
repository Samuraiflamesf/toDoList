<?php
require_once("conexao.php");

$task = $_POST['task'];
$tipo = $_POST['tipo'];
$status_task = $_POST['status_task'];

//Validar tarefa
$query = $pdo->query("SELECT * from task where task = '$task'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg != 0 ){
	echo 'Esta tarefa já está cadastrada';
	exit();
} 
elseif($task == '') {
	echo 'Esta tarefa está em branco';
	exit();
}

$query = $pdo->prepare("INSERT task SET task = :task, fk_tipo = :tipo, fk_status = :status_task");
$query->bindValue(":task", "$task");
$query->bindValue(":tipo", "$tipo");
$query->bindValue(":status_task", "$status_task");
$query->execute();

echo 'Salvo com Sucesso!';

?>
