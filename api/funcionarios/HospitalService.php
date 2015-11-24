<?php
class HospitalService {
    
    public static function listfuncionarios() {
        $db = ConnectionFactory::getDB();
        $funcionarios = array();
        
        foreach($db->funcionarios() as $funcionario) {
           $funcionarios[] = array (
               'id' => $funcionario['id'],
               'nome' => $funcionario['nome'],
               'sobrenome' => $funcionario['sobrenome'],
               'cpf' => $funcionario['cpf'],
               'rg' => $funcionario['rg'],
               'nacionalidade' => $funcionario['nacionalidade'],
               'email' => $funcionario['email'],
               'nascimento' => $funcionario['nascimento'],
               'idade' => $funcionario['idade'],
               'ddd' => $funcionario['ddd'],
               'celular' => $funcionario['celular'],
               'sexo' => $funcionario['sexo']
           ); 
        }
        
        return $funcionarios;
    }
    
    public static function getById($id) {
        $db = ConnectionFactory::getDB();
        return $db->funcionarios[$id];
    }
    
    public static function add($funcionarioTask) {
        $db = ConnectionFactory::getDB();
        $funcionario = $db->funcionarios->insert($funcionarioTask);
        if($funcionario) {
            $funcionario['nome'] = $updatedFuncionario['nome'];
            $funcionario['sbrenome'] = $updatedFuncionario['sobrenome'];
            $funcionario['cpf'] = $updatedFuncionario['cpf'];
            $funcionario['rg'] = $updatedFuncionario['rg'];
            $funcionario['nacionalidade'] = $updatedFuncionario['nacionalidade'];
            $funcionario['email'] = $updatedFuncionario['email'];
            $funcionario['nascimento'] = $updatedFuncionario['nascimento'];
            $funcionario['idade'] = $updatedFuncionario['idade'];
            $funcionario['ddd'] = $updatedFuncionario['ddd'];
            $funcionario['celular'] = $updatedFuncionario['celular'];
            $funcionario['sexo'] = $updatedFuncionario['sexo'];
            
            return $funcionario;
        }
        
        return $funcionario;
    }
    
    public static function update($updatedFuncionario) {
        $db = ConnectionFactory::getDB();
        $funcionario = $db->funcionarios[$updatedFuncionario['id']];
        
        if($funcionario) {
            $funcionario['nome'] = $updatedFuncionario['nome'];
            $funcionario['sbrenome'] = $updatedFuncionario['sobrenome'];
            $funcionario['cpf'] = $updatedFuncionario['cpf'];
            $funcionario['rg'] = $updatedFuncionario['rg'];
            $funcionario['nacionalidade'] = $updatedFuncionario['nacionalidade'];
            $funcionario['email'] = $updatedFuncionario['email'];
            $funcionario['nascimento'] = $updatedFuncionario['nascimento'];
            $funcionario['idade'] = $updatedFuncionario['idade'];
            $funcionario['ddd'] = $updatedFuncionario['ddd'];
            $funcionario['celular'] = $updatedFuncionario['celular'];
            $funcionario['sexo'] = $updatedFuncionario['sexo'];
           
            $funcionario->update();
            return true;
        }
        
        return false;
    }
    
    public static function delete($id) {
        $db = ConnectionFactory::getDB();
        $funcionario = $db->funcionarios[$id];
        if($funcionario) {
            $funcionario->delete();
            return true;
        }
        return false;
    }
}
?>