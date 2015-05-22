<?php
function get_con() {
    //$mysqli = new mysqli("arvumti.ipagemysql.com", "cecyted", "123", "db_cec");
    $mysqli = new mysqli("localhost", "root", "root", "db_rpm");
    if ($mysqli->connect_errno) {
        return $mysqli->connect_erro;
    }

    return $mysqli;
}

function execArr($arr) {
    $res = Array("res" => 1);
    $bad_querys = Array();

    $mysqli = get_con();
    $mysqli->autocommit(FALSE);
    //$mysqli->begin_transaction();
    
    $all_query_ok = true;

    for ($i=0; $i < count($arr); $i++) {
        $mysqli->query($arr[$i]) ? null : $all_query_ok = false;
        if(!$all_query_ok) {
            array_push($bad_querys, $arr[$i]);
            break;
        }
    }


    if($all_query_ok)
        $mysqli->commit();
    else {
        $mysqli->rollback();
        $res = Array("res" => 'error', "err" => 'error', 'bad_querys' => $bad_querys);
    }
    $mysqli->close();

    return $res;
}

function execQuery($query) {
    $res = Array("res" => 1);    

    $mysqli = get_con();
    $mysqli->autocommit(FALSE);
    //$mysqli->begin_transaction();

    $all_query_ok = true;

    $mysqli->query($query) ? null : $all_query_ok = false;

    if($all_query_ok) {
        $res['idkey'] = mysqli_insert_id($mysqli);
        $mysqli->commit();
    }
    else {
        $mysqli->rollback();
        $res = Array("res" => 'error', "err" => 'error');
    }
    $mysqli->close();
    
    return $res;
}

function select($query)  {
    $mysqli = get_con();

    $res = Array();
    
    if ($resultado = $mysqli->query($query, MYSQLI_USE_RESULT)) {
        while($row = $resultado->fetch_assoc()) {
            array_push($res, $row);
        }
        $resultado->close();
    }
    
    return $res;
}

?>