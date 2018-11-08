<?php 

    require_once('confirmaAcesso.php');
    confAccess();

?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Editar Cadastro do Local</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <body>
    <div class="text-center">
        <div class="container col-md-8">
            <h1>Editar Cadastro do Local</h1>
            <form id="frmNovoEstagiario" nome="frmNovoEstagiario" method="POST" action="local.php">
                <div class="text-center">
                        <label for = "lblLocal">Local</label>
                        <?php
                            echo "<input class='col-md-6' type='text' name='txtUpPredio' value='{$_POST['predio']}'>";
                            echo "<input type='hidden' name='upId' value='{$_POST['id']}'>";
                        ?>
                        
                </div>
                <input type="submit" id="btEnviar" name ="btEnviar" 
                       class="btn btn-success" value="Gravar">
                <input type="reset" id="btLimpar" name ="btLimpar" 
                       class="btn btn-warning" value="Limpar">
                <input type="button" id="btCancel" name ="btCancel" 
                       class="btn btn-danger" value="Cancelar"
                       onclick="javascript:location.href='local.php'">
            </form>
        </div>
    </body>
</html>