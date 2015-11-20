<?php
require 'vendor/autoload.php';
require 'database/ConnectionFactory.php';
require 'funcionarios/HospitalService.php';

$app = new \Slim\Slim();

$app->get('/', function() use ( $app ) {
    echo "Welcome to Funcionarios REST API";
});

$app->get('/funcionarios/', function() use ( $app ) {
    $funcionarios = HospitalService::listfuncionarios();
    $app->response()->header('Content-Type', 'application/json');
    echo json_encode($funcionarios);
});

$app->get('/funcionarios/:id', function($id) use ( $app ) {
    $funcionario = HospitalService::getById($id);
    
    if($funcionario) {
        $app->response()->header('Content-Type', 'application/json');
        echo json_encode($funcionario);
    }
    else {
        $app->response()->setStatus(204);
    }
});

$app->post('/funcionarios/', function () use ( $app ) {
	$db = getDB();
	
	$add = json_decode($app->request->getBody(), true);
	$funcionario = $db->funcionarios->insert($add);
	
	$app->response->header('Content-Type', 'application/json');
	echo json_encode($funcionario);
});


$app->put('/funcionarios/', function() use ( $app ) {
    $funcionarioJson = $app->request()->getBody();
    $updatedfuncionario = json_decode($funcionarioJson, true);
    
    if($updatedfuncionario && $updatedfuncionario['id']) {
        if(HospitalService::update($updatedfuncionario)) {
          echo "Funvionario {$updatedfuncionario['nome']} updated";  
        }
        else {
          $app->response->setStatus('404');
          echo "funcionario not found";
        }
    }
    else {
        $app->response->setStatus(400);
        echo "Malformat JSON";
    }
});

$app->delete('/funcionarios/:id', function($id) use ( $app ) { 
	$db = getDB();
	$response = "";
	
	$funcionario = $db->funcionarios()->where('id', $id);
	
	if($funcionario->fetch()) {
		$result = $funcionario->delete();
		$response = array(
			'status' => 'true',
			'message' => 'Guest deleted!'
		);
	}
	else {
		$response = array(
			'status' => 'false',
			'message' => 'Guest with $id does not exit'
		);
		$app->response->setStatus(404);
	}
	
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($response);
});


$app->run();
?>