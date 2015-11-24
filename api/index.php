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

$app->post('/funcionarios/', function() use ( $app ) {
    $funcionarioJson = $app->request()->getBody();
    $funcionarioTask = json_decode($funcionarioJson, true);
    if($funcionarioTask) {
        $funcionario = HospitalService::add($funcionarioTask);
        echo "Funcionario {$funcionario['nome']} added";
    }
    else {
        $app->response->setStatus(400);
        echo "Malformat JSON";
    }
});

$app->put('/funcionarios/', function() use ( $app ) {
    $funcionarioJson = $app->request()->getBody();
    $updatedfuncionario = json_decode($funcionarioJson, true);
    
    if($updatedfuncionario && $updatedfuncionario['id']) {
        if(HospitalService::update($updatedfuncionario)) {
          echo "Funcionario {$updatedfuncionario['nome']} updated";  
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
    if(HospitalService::delete($id)) {
      echo "Funcionario with id = $id was deleted";
    }
    else {
      $app->response->setStatus('404');
      echo "Task with id = $id not found";
    }
});
	


$app->run();
?>