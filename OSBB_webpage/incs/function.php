<?php

function debug($data){
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function load($data){
    foreach($_POST as $k => $v){
        $data[$k]['value'] = $v;
    }
    return $data;
}

function validate($data){
    $errors = '';
    foreach($_POST as $k => $v){
        if(empty($data[$k]['value'])){
            $errors.="<h3 style='color:red'>Заповніть поле {$data[$k]['field_name']}</h3>";
        }
    }
    return $errors;
}

function tofile($data){
    foreach($_POST as $k => $v){
        if($k != 'agree'){
            file_put_contents('files/messages.txt', trim($v).PHP_EOL, FILE_APPEND | LOCK_EX);
        }
    }
}

