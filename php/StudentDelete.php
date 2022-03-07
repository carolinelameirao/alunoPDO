<?php

    require_once('./StudentRepository.php');

    if ($_GET['id'] == NULL) {
        header('location: error.php?status=access-deny');
        die();
    }

    if (delete($_GET['id'])) {
        header("location: StudentList.php?status=success");
        die();
    }

    header("location: StudentList.php?status=fail");
    die();
