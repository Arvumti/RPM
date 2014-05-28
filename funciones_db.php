<?php
function get_pdo()
{
    $pdo = new PDO('mysql:host=localhost;dbname=db_rpm', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
	return $pdo;
}

function pdoExec($arr) 
{
    $pdo = get_pdo();           
    $pdo->beginTransaction(); 
    $res = Array("res" => 1);    
    
    for ($i=0; $i < count($arr); $i++) {            
        $sql = $pdo->exec($arr[$i]);        
        if (!$sql) {
            $pdo->rollBack();
            $res = Array("res" => $pdo->errorInfo()[0], "err" => $pdo->errorInfo()[2]);
            return $res;
        }
    }
    $pdo->commit();
    return $res;
}

function pdoQuery($query) 
{
    $pdo = new PDO('mysql:host=localhost;dbname=db_rpm', 'root', 'root');
    return $pdo->query($query);
}
?>