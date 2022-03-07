<?php

    require_once('./StudentRepository.php');

    if(
        $_POST['txtAluno'] == NULL || 
        $_POST['txtEmail'] == NULL ||
        $_POST['txtId']
    ) {
        header('location: error.php?status=access-deny');
        die(); 
    }

    $result = UPDATE(
        $_POST['txtAluno'], 
        $_POST['txtEmail'], 
        $_POST['txtId']
    );

    if($result)
    {
        header("location: StudentFormEdit.php?codigo={$_POST['txtId']}&status=sucess");
        die(); 
    }

    header("location: StudentFormEdit.php?codigo={$_POST['txtId']}&status=fail");
    die();