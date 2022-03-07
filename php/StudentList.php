<?php
    require_once('./StudentRepository.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lista de Alunos</title>
</head>
<body>
    <?php include "./navbar.php" ?>
    <div class="container">
        <table class="table table-stripped">
            <thead>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
            </thead>
            <tbody>
                <?php
                    try {
                        $con = getConnection();
            
                        $rs = $con->query("SELECT id, nome, email FROM aluno");
                                
                        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                    <td><?= $row->id ?></td>
                    <td><?= $row->nome ?></td>
                    <td><?= $row->email; ?></td>
                    <td>
                        <a href="StudentFormEdit.php?id=<?= $row->id ?>"><span style="color: green;"><i class="fa-solid fa-pen-to-square"></i></span></a>
                        <a href="StudentDelete.php?id=<?= $row->id ?>" onclick="return confirm('Deseja realmente remover o aluno <?= $row->nome ?> ?')"><span style="color: red;"><i class="fa-solid fa-eraser"></i></span></a>
                    </td>
                </tr>
                <?php 
                        }
                            } catch (PDOException $error) {
                                echo "Erro ao listar os alunos. Erro: {$error->getMessage()}";
                            } finally {
                                unset($con);
                                unset($rs);
                            } ?>
            </tbody>
        </table>
    </div><!--Fim Container-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
