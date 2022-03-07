<?php

    session_start();
    ob_start();

    require_once('./StudentRepository.php');

    if($_GET['id'] != NULL) {
       update($aluno);
    } else {
        header('location: error.php?status=access-deny');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Aluno Senac - Formulário de Atualização de Cadastro de Alunos</title>
</head>
<body>
    <?php include_once ("./navbar.php"); ?>
    <div class="col-6 offset-3">
        <fieldset> Alunos</legend>
            <form  class="form" action="./StudentEdit.php" method="post">
                <div class="form-grup mb-3">
                    <label for="aluno_id" class="form-label">Nome do Aluno</label>
                    <input value="<?= $aluno->nome ?>" class="form-control" type="text" name="txtAluno" id="aluno_id" placeholder="Informe o Nome do Aluno" required/>
                </div>
                <div class="form-grup mb-3">
                    <label for="email_id" class="form-label">E-mail</label>
                    <input value="<?= $aluno->email ?>" class="form-control" type="email" name="txtEmail" id="email_id" placeholder="Informe o e-mail" required/>
                </div>
                <button value="<?= $cliente['id'] ?>" name="txtId" class="btn btn-dark" type="submit">Atualizar</button>
            </form>
        </fieldset>
    </div><!--Fim Container-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include "./toast.php" ?>
</body>
</html>

