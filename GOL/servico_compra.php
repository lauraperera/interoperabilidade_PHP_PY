<?php
    $json = file_get_contents('php://input');
	$array = json_decode( $json, true );

    $voo = $array['voo'];
    #$cliente = $array['cliente'];
    $cpf = $array['cpf'];
    $nome = $array['nome'];

    $conexao = new pdo('sqlite:database');

    $sql = "select * from cliente where cpf = '".$cpf."'";
    $resultado = $conexao->query($sql)->fetchAll(2);
    if(count($resultado) == 0){
        if(!isset($array['nome'])){
            $array = ['status' => 'erro'];
            $json = json_encode($array);
            print $json;
            exit;
        }
        $sql = "insert into cliente values (null, '".$cpf."', '".$nome."'); ";
        $resultado = $conexao->exec($sql);
        if($resultado == 0){
            $array = ['status' => 'erroo'];
            $json = json_encode($array);
			print $json;
			exit;
        }
    }
    $sql = "select * from cliente where cpf = '".$cpf."'";
    $resultado = $conexao->query($sql)->fetchAll(2);
    $cliente = $resultado['0']['id'];
    $sql = "insert into passageiro values (null, '".$voo."', '".$cliente."')";
    
    $resultado = $conexao->exec($sql);
	if ( $resultado == 0 ) {
		$array = [ 'status' => 'errooo' ];
		$json = json_encode($array);
		print $json;
		exit;
	}

	$array = [ 'status' => 'sucesso' ];

	unset($conexao);

    $json = json_encode($array);

	header("content-type: application/json");
	print $json;
?>
