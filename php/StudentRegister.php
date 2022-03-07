<?php

    require_once('./StudentRepository.php');

    if(
        $_POST['txtAluno'] == NULL || 
        $_POST['txtEmail'] == NULL 
    ) {
        header('location: error.php?status=access-deny');
        die();
    }

    $aluno = new stdClass();
    $aluno->nome = $_POST['txtAluno'];
    $aluno->email = $_POST['txtEmail'];
    
    
    if(create($aluno)) {
        header("location: StudentForm.php?codigo={$_POST['txtIdAluno']}&status=sucess");
        die(); 
    }
                            
        header("location: StudentForm.php?codigo={$_POST['txtIdAluno']}&status=fail");
        die();