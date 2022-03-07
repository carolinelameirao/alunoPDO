<?php

    require_once './Connection.php';

    function create($aluno)
    {
        try {
            $con = getConnection();

            $stmt = $con->prepare("INSERT INTO aluno(nome, email) VALUES (:nome, :email)");

            $stmt->bindParam(":nome", $aluno->nome);
            $stmt->bindParam(":email", $aluno->email);

            if($stmt->execute())
                echo "Aluno cadastrada com sucesso.";
        } catch (PDOException $error) {
            echo "Erro ao cadastrar o aluno. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }


    ## Teste do create
    /*$aluno = new stdClass();
    $aluno->nome = "Samanta";
    $aluno->email = "samanta@outlook.com";
    create($aluno);
    echo "<br><br>---<br><br>";*/

    function get()
    {
        try {
            $con = getConnection();

            $rs = $con->query("SELECT nome, email FROM aluno");
                    
            while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                echo $row->nome . "<br>";
                echo $row->email . "<br>";
            }
        } catch (PDOException $error) {
            echo "Erro ao listar os alunos. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($rs);
        }
    }

    ## Teste do get
    //get();
   
    function find($nome)
    {
        try {
            $con = getConnection();

            $stmt = $con->prepare("SELECT nome, email FROM aluno WHERE nome LIKE :nome");
            $stmt->bindValue(":nome", "%{$nome}%");

            if($stmt->execute()) {
                if($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo $row->nome . "<br>";
                        echo $row->email . "<br>";
                    }
                }
            }
        } catch (PDOException $error) {
            echo "Erro ao buscar os dados do aluno. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }

    ## Teste do find
    //find("s");

    function update($aluno)
    {
        try {
            $con = getConnection();

            $stmt = $con->prepare("UPDATE aluno SET nome = :nome, email = :email WHERE id = :id");
            
            $stmt->bindParam(":id", $aluno->id);
            $stmt->bindParam(":nome", $aluno->nome);
            $stmt->bindParam(":email", $aluno->email);

            if($stmt->execute())
                echo "Dados do aluno atualizado com sucesso.";
        } catch (PDOException $error) {
            echo "Erro ao atualizar os dados do aluno. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }

    /*get();
    echo "<br><br>---<br><br>";

    ## Teste do update
    $aluno = new stdClass();
    $aluno->nome = "Samantha";
    $aluno->email = "samantha@outlook.com";
    $aluno->id = 3;
    update($aluno);

    echo "<br><br>---<br><br>";

    get();*/
    
    function delete($id)
    {
        try {
            $con = getConnection();

            $stmt = $con->prepare("DELETE FROM aluno WHERE id = ?");
            
            $stmt->bindValue(1, $id);

            if($stmt->execute())
                echo "Aluno deletada com sucesso.";
        } catch (PDOException $error) {
            echo "Erro ao deletar o aluno. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }

    /*get();
    echo "<br><br>---<br><br>";

    ## Teste do delete
    delete(3);

    echo "<br><br>---<br><br>";
    get();*/
