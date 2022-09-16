<?php
    $json = file_get_contents('php://input');
	$array = json_decode( $json, true );

    $origem = $array['origem'];
    $destino = $array['destino'];
    $datahora1 = $array['datahora1'];
    $datahora2 = $array['datahora2'];
    $companhia = 'AZUL';

    $conexao = new pdo('sqlite:database');

    $sql = "select *, '".$companhia."' as companhia from vvoo where destino = '".$destino."' and origem = '".$origem."' and datahora between '".$datahora1."' and '".$datahora2."'";

    $resultado = $conexao->query($sql)->fetchAll(2);
	unset($conexao);

    $json = json_encode($resultado);

	header("content-type: application/json");
	print $json;
?>