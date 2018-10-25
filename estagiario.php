<?php
    $conexao = mysqli_connect("localhost","wadoryu","57641971");
    if (!$conexao){
        echo "Erro ao se conectar ao MySQL <br/>";
        exit;
    }
    $nome_banco = "manutencao";
    $banco = mysqli_select_db($conexao,$nome_banco);
    if (!$banco){
        echo "Erro ao se conectar ao banco manutencao...";
        exit;
    }

    
    
    if(isset($_POST['txtNome']) && $_POST['txtNome'] != ""){
        $sql_insert = "INSERT INTO estagiario (nome) VALUES ('{$_POST['txtNome']}');";
        $insert = mysqli_query($conexao, $sql_insert);
    }

    if(isset($_POST['txtUpNome']) && $_POST['txtUpNome'] != ""){
        $sql_update = "UPDATE estagiario SET nome = '{$_POST['txtUpNome']}' WHERE id = {$_POST['upId']};";
        $update = mysqli_query($conexao, $sql_update);
    }

    if(isset($_POST['idHab'])){
        $sql_updateHab = "UPDATE estagiario SET status = 0 WHERE id = {$_POST['idHab']};";
        $updateHab = mysqli_query($conexao, $sql_updateHab);
    }
    
    if(isset($_POST['idDes'])){
        $sql_updateDes = "UPDATE estagiario SET status = 1 WHERE id = {$_POST['idDes']};";
        $updateDes = mysqli_query($conexao, $sql_updateDes);
    }

    if(isset($_POST['idDel'])){
        $sql_delete = "DELETE FROM estagiario WHERE id = {$_POST['idDel']}";
        $delete = mysqli_query($conexao, $sql_delete);
    }
    
    $sql_select = "SELECT * FROM estagiario;";
    $rs = mysqli_query($conexao, $sql_select);



?>


<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Estagiários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Estagiários<h1>
        <input type="button" id="btVoltar" name ="btVoltar" 
               class="btn btn-warning" value="Voltar"
               onclick="javascript:location.href='conserto.php'">
        <br><br>
    <div style="overflow: auto; width: 100%; height: 200px; border:solid 1px">
        <table class="table">
        <thead class="thead-dark">
            <tr>    
                <th colspan=14>Nome</th>
            </tr>
            <?php while ($linha = mysqli_fetch_array($rs)){
                ?>
                    <tr>
                        <td><?php echo $linha['nome'] ?></td>
                        <?php 
                        if($linha['status'] == 0){
                            ?>
                            <td>Habilitado</td>
                            <?php
                        }else{
                            ?>
                            <td>Desabilitado</td>
                        <?php } ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <form method=POST action=updateEstagiario.php>
                            <input type="hidden" name="nome" value="<?php echo $linha['nome']; ?>">
                            <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
                            <input type="submit" id="btAlter" name ="btAlter" 
                            class="btn btn-primary" value="Alterar">
                            </form>
                        </td>
                        <td>
                            <form method=POST action=estagiario.php>
                            <input type="hidden" name="idHab" value="<?php echo $linha['id']; ?>">
                            <input type="submit" id="btHabilita" name ="btHabilita" 
                            class="btn btn-success" value="Habilitar">
                            </form>
                        </td>
                        <td>
                            <form method=POST action=estagiario.php>
                            <input type="hidden" name="idDes" value="<?php echo $linha['id']; ?>">
                            <input type="submit" id="btDesabilita" name ="btDesabilita" 
                            class="btn btn-warning" value="Desabilitar">
                            </form>
                        </td>
                        <td>
                            <form method=POST action=estagiario.php>
                            <input type="hidden" name="idDel" value="<?php echo $linha['id']; ?>">
                            <input type="submit" id="btDelete" name ="btDelete" 
                            class="btn btn-secondary" value="Deletar">
                            </form>
                        </td>
                    </tr>
                <?php
            }?>
        </table>
    </div>
        
        <div class="container col-md-8">
            <h1>Cadastrar novo estagiário</h1>
            <form id="frmNovoEstagiario" nome="frmNovoEstagiario" method="POST" action="estagiario.php">
                <div class="form-group">
                <label for = "lblNome">Nome</label>
                        <input class="form-control col-md-6" type="text" 
                               name = "txtNome" placeholder="Informe o nome do estagiário">
                </div>
                <input type="submit" id="btEnviar" name ="btEnviar" 
                       class="btn btn-success" value="Gravar">

                <input type="reset" id="btLimpar" name ="btLimpar" 
                       class="btn btn-warning" value="Limpar">

            </form>
        </div>

</body>
</html>