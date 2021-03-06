<?php

function getTasks(){
    $db = new PDO('mysql:host=localhost;dbname=todolistapp;charset=utf8', 'root', '');
    $sentence = $db->prepare( "select * from task");
    $sentence->execute();
    return $sentence->fetchAll();
}

function createTask($title, $description){
    $db = new PDO('mysql:host=localhost;dbname=todolistapp;charset=utf8', 'root', '');
    $sentence = $db->prepare("INSERT INTO task(title,description) VALUES(?,?)");
    $sentence->execute(array($title, $description));
}

function removeTask($id_task){
    $db = new PDO('mysql:host=localhost;dbname=todolistapp;charset=utf8', 'root', '');
    $sentence = $db->prepare("DELETE FROM task WHERE id_task=?");
    $sentence->execute(array($id_task));
}

function markTaskAsDone($id_task){
    $db = new PDO('mysql:host=localhost;dbname=todolistapp;charset=utf8', 'root', '');
    $sentence = $db->prepare("UPDATE task SET done=1 WHERE id_task=?");
    $sentence->execute(array($id_task));
}

function getTask($id_task){
    $db = new PDO('mysql:host=localhost;dbname=todolistapp;charset=utf8', 'root', '');
    $sentence = $db->prepare( "select * from task where id_task=?");
    $sentence->execute(array($id_task));
    return $sentence->fetch();
}
?>