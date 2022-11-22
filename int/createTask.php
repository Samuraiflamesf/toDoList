<?php 
require_once("conexao.php");

//VALIDAR CAMPO
$query = $pdo->query("SELECT * from task");
$res = $query->fetchAll(PDO::FETCH_ASSOC);


$query = $pdo->prepare("INSERT INTO task SET task = :task, fk_status = :fk_status, fk_tipo = :fk_tipo ");
$query->bindValue(":task", "$task");
$query->bindValue(":fk_status", "$fk_status");
$query->bindValue(":fk_tipo", "$fk_tipo");
$query->execute();


echo 'Salvo com Sucesso';
