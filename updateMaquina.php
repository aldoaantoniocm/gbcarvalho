<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Editar Cadastro da Máquina</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <body>
        <div class="container col-md-8">
            <h1>Editar Cadastro da Máquina</h1>
            <form id="frmNovoEstagiario" nome="frmNovoEstagiario" method="POST" action="maquina.php">
                <div class="form-group">
                    <?php
                    echo "<input type='hidden' name='upPatrimonio' value='{$_POST['patrimonio']}'>";
                    ?>
                        <label for = "lblProcessador">Processador</label>
                    <?php
                         echo "<input class='form-control col-md-6' type='text' name='txtUpProcessador' value='{$_POST['processador']}'>";
                    ?>
                        <label for = "lblMemRam">Memória RAM</label>
                    <?php
                         echo "<input class='form-control col-md-6' type='text' name='txtUpMemRam' value='{$_POST['mem_ram']}'>";
                    ?>
                        <label for = "lblHd">HD</label>
                    <?php
                         echo "<input class='form-control col-md-6' type='text' name='txtUpHd'value='{$_POST['hd']}'>";
                    ?>
                        <label for = "lblMac">MAC</label>
                    <?php
                         echo "<input class='form-control col-md-6' type='text' name='txtUpMac' value='{$_POST['mac']}'>";
                    ?>
                </div>
                <input type="submit" id="btEnviar" name ="btEnviar" 
                       class="btn btn-success" value="Gravar"
                       onclick="javascript:location.href='maquina.php'">
                <input type="reset" id="btLimpar" name ="btLimpar" 
                       class="btn btn-warning" value="Limpar">
                <input type="button" id="btCancel" name ="btCancel" 
                       class="btn btn-danger" value="Cancelar"
                       onclick="javascript:location.href='maquina.php'">
            </form>
        </div>
    </body>
</html>