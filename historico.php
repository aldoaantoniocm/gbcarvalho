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
    if(isset($_POST['btRelTotal']) || empty($_POST['txtChave'])){
        $sql_relTotal = "SELECT c.id, c.patri_maq, c.data_entrada, c.data_saida, c.defeito, c.reparo, e.nome, l.predio
                FROM conserto c
                INNER JOIN estagiario e on c.est_resp = e.id
                INNER JOIN local l on c.local = l.id ORDER BY c.id;";
        $selectRelTotal = mysqli_query($conexao, $sql_relTotal);
        $rs = $selectRelTotal;
    }

    if(isset($_POST['btRelMaq'])){
        $sql_relMaq = "SELECT c.id, c.patri_maq, c.data_entrada, c.data_saida, c.defeito, c.reparo, e.nome, l.predio 
        FROM conserto c
        INNER JOIN estagiario e on c.est_resp = e.id
        INNER JOIN local l on c.local = l.id 
        WHERE c.patri_maq = {$_POST['txtChave']} ORDER BY c.id ;";
        $selectRelMaq = mysqli_query($conexao, $sql_relMaq);
        $rs = $selectRelMaq;
    }

    if(isset($_POST['btRelPredio'])){
        $sql_relPredio = "SELECT c.id, c.patri_maq, c.data_entrada, c.data_saida, c.defeito, c.reparo, e.nome, l.predio 
        FROM conserto c
        INNER JOIN estagiario e on c.est_resp = e.id
        INNER JOIN local l on c.local = l.id 
        WHERE l.id = {$_POST['txtChave']} ORDER BY c.id ;"; 
        $selectRelPredio = mysqli_query($conexao, $sql_relPredio);
        $rs = $selectRelPredio;
    }

    if(isset($_POST['btRelEst'])){
        $sql_relEst = "SELECT c.id, c.patri_maq, c.data_entrada, c.data_saida, c.defeito, c.reparo, e.nome, l.predio 
        FROM conserto c
        INNER JOIN estagiario e on c.est_resp = e.id
        INNER JOIN local l on c.local = l.id 
        WHERE e.id = {$_POST['txtChave']} ORDER BY c.id ;";
        $selectRelEst = mysqli_query($conexao, $sql_relEst);
        $rs = $selectRelEst;
    }

    function inverteData($data){
        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }elseif(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }
    }
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Relatórioss</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Relatórios<h1>
        <input type="button" id="btVoltar" name ="btVoltar" 
               class="btn btn-warning" value="Voltar"
               onclick="javascript:location.href='conserto.php'">
        
        <form method="POST" action="historico.php">
        <label for = "lblChave">Chave de busca</label>
        <input class="form-control col-md-3" type="text" 
            name = "txtChave" placeholder="Informe a chave que deseja pesquisar">
            <input type="submit" id="btAd" name ="btRelTotal" 
               class="btn btn-primary" value="Relatório Total">
            <input type="submit" id="btAd" name ="btRelMaq" 
               class="btn btn-primary" value="Relatório por Máquina">
            <input type="submit" id="btAd" name ="btRelPredio" 
               class="btn btn-primary" value="Relatório por Prédio">
            <input type="submit" id="btAd" name ="btRelEst" 
               class="btn btn-primary" value="Relatório por Estagiário">
        </form>

               <div style="overflow: auto; width: 100%; height: 400px; border:solid 1px">
        <table class="table">
        <thead class="thead-dark">
            <tr>    
                <th>ID</th>
                <th>Patrimônio</th>
                <th>Local</th>
                <th>Estagiário</th>
                <th>Data de entrada</th>
                <th>Data de saída</th>
                <th>Defeito</th>
                <th>Reparo</th>
            </tr>

<?php while ($linha = mysqli_fetch_array($rs)){
                ?>
                    <tr>
                        <td><?php echo $linha['id'] ?></td>
                        <td><?php echo $linha['patri_maq'] ?></td>
                        <td><?php echo $linha['predio'] ?></td>
                        <td><?php echo $linha['nome'] ?></td>
                        <td><?php echo inverteData($linha['data_entrada']) ?></td>
                        <td><?php echo inverteData($linha['data_saida']) ?></td>
                        <td><?php echo $linha['defeito'] ?></td>
                        <td><?php echo $linha['reparo'] ?></td>
                    </tr>

                   
                <?php
            }?>
        </table>
    </div>   
    <br><br>
    </body>
</html>