<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 08MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 08MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 08MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08MAI23 - RES000101/13BR  

https://www.free-css.com/free-css-templates
   
ARQUIVO E DEPENDENCIA PARA O WEBSOCKET */


use Frame;
use Swoole\WebSocket\Server;


$servidor = new Server(host:'www.indafire.ind.br',port:'');
$servidor->start();
/*$servidor->on(event_name:'message',function(Server $servidor,Frame $mensagem)}
	/* var //  Swoole\Connection\Iterator $conexoes; */
/*	$conexoes = $servidor->connections;
	$origem = $mensagem->fd;

	foreach($conexoes as  $conexao){
		if($conexao === $origem) continue;
		$servidor->push($conexao,json_encode(['type' => 'chat', 'text' => $mensagem->data]));
	}
});*/

// https://www.youtube.com/watch?v=GCECSLtT49U

/*



*/
?>
