<?php
include 'gera_conexao.inc';

$p_nome = $_GET["nome"];
$qtdde_linhas = 0;

if ($p_nome == ""){

    $sql = "SELECT * FROM usuario";
}

if ($p_nome != ""){
    $sqlcont = "SELECT COUNT(*) as qtdde_regs FROM usuario WHERE nome='$p_nome'";
    $result_qtdde = mysqli_query($conexao, $sqlcont) or die("que sacooooooo aaaaaaa  >:( pq nao ta conectandooooo");
    $registro_qtdde = mysqli_fetch_array($result_qtdde);
    $qtdde_linhas = $registro_qtdde["qtdde_regs"];
    $sql = "SELECT * FROM usuario where nome = '$p_nome'";
}

$resultado = mysqli_query($conexao, $sql) or die("que sacooooooo aaaaaaaaaaaa  >:( pq nao ta conectandooooo");
 

$registro = mysqli_fetch_array($resultado);
$matricula = $registro["matricula"];
$nome = $registro["nome"];
$sobrenome = $registro["sobrenome"];
$cpf = $registro["cpf"];
$cep = $registro["cep"];
$endereco = $registro["endereco"];
$numero = $registro["numero"];
$complemento = $registro["complemento"];
$bairro = $registro["bairro"];
$cidade = $registro["cidade"];
$email = $registro["email"];
$data_nascimento = $registro["data_nascimento"];
$senha = $registro["senha"];
$telefone = $registro["telefone"];
$sexo = $registro["sexo"];
$newsletter = $registro["newsletter"];


echo "<style>table.pinktable {font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;border: 3px solid #A4214B;background-color: #FFB8D1;width: 100%;text-align: left;border-collapse: collapse;}table.pinktable td, table.pinktable th {border: 1px solid #AA3076;padding: 3px 2px;}table.pinktable tbody td {font-size: 13px;color: #752D40;}table.pinktable tr:nth-child(even) {background: #DA7496;}table.pinktable thead {background: #A4325D;background: -moz-linear-gradient(top, #bb6585 0%, #ad466d 66%, #A4325D 100%);background: -webkit-linear-gradient(top, #bb6585 0%, #ad466d 66%, #A4325D 100%);background: linear-gradient(to bottom, #bb6585 0%, #ad466d 66%, #A4325D 100%);border-bottom: 2px solid #7C1919;}table.pinktable thead th {font-size: 15px;font-weight: bold;color: #FFB8D1;text-align: center;border-left: 2px solid #7C1919;}table.pinktable thead th:first-child {border-left: none;}table.pinktable tfoot {font-size: 14px;font-weight: bold;color: #FFFFFF;background: #DA9DB2;background: -moz-linear-gradient(top, #e3b5c5 0%, #dda6b9 66%, #DA9DB2 100%);background: -webkit-linear-gradient(top, #e3b5c5 0%, #dda6b9 66%, #DA9DB2 100%);background: linear-gradient(to bottom, #e3b5c5 0%, #dda6b9 66%, #DA9DB2 100%);border-top: 2px solid #000000;}table.pinktable tfoot td {font-size: 14px;}table.pinktable tfoot .links {text-align: right;}table.pinktable tfoot .links a{display: inline-block;background: #A4325D;color: #FFFFFF;padding: 2px 8px;border-radius: 5px;}</style>";
echo"<table class='pinktable'>";
echo "<thead>";
echo "<tr>";
echo "<th>Matrícula</th>";
echo "<th>Nome</th>";
echo "<th>Sobrenome</th>";
echo "<th>CPF</th>";
echo "<th>CEP</th>";
echo "<th>Endereço</th>";
echo "<th>Número</th>";
echo "<th>Complemento</th>";
echo "<th>Bairro</th>";
echo "<th>Cidade</th>";
echo "<th>Email</th>";
echo "<th>Data de nascimento</th>";
echo "<th>Senha</th>";
echo "<th>Telefone</th>";
echo "<th>Sexo</th>";
echo "<th>Newsletter</th>";
echo "</tr>";
echo "</thead>";
echo "<tfoot>";
echo "</tfoot>";
echo "<tbody>";
echo "<tr>";
echo "<td>" . $matricula . "</td>";
echo "<td>" . $nome . "</td>";
echo "<td>" . $sobrenome . "</td>";
echo "<td>" . $cpf . "</td>";
echo "<td>" . $cep . "</td>";
echo "<td>" . $endereco . "</td>";
echo "<td>" . $numero . "</td>";
echo "<td>" . $complemento . "</td>";
echo "<td>" . $bairro . "</td>";
echo "<td>" . $cidade . "</td>";
echo "<td>" . $email . "</td>";
echo "<td>" . $data_nascimento . "</td>";
echo "<td>" . $senha . "</td>";
echo "<td>" . $telefone . "</td>";
echo "<td>" . $sexo . "</td>";
echo "<td>" . $newsletter . "</td>";
echo "</tr>";
echo "</tbody>";


if ($p_nome == "" or $qtdde_linhas > 1){
    while ($registro = mysqli_fetch_array($resultado)) { 
        echo "<tr>";
        echo "<td>".$registro["matricula"]."</td>";
        echo "<td>".$registro["nome"]."</td>";
        echo "<td>".$registro["sobrenome"]."</td>";
        echo "<td>".$registro["cpf"]."</td>";
        echo "<td>".$registro["cep"]."</td>";
        echo "<td>".$registro["endereco"]."</td>";
        echo "<td>".$registro["numero"]."</td>";
        echo "<td>".$registro["complemento"]."</td>";
        echo "<td>".$registro["bairro"]."</td>";
        echo "<td>".$registro["cidade"]."</td>";
        echo "<td>".$registro["email"]."</td>";
        echo "<td>".$registro["data_nascimento"]."</td>";
        echo "<td>".$registro["senha"]."</td>";
        echo "<td>".$registro["telefone"]."</td>";
        echo "<td>".$registro["sexo"]."</td>";
        echo "<td>".$registro["newsletter"]."</td>";
        echo "</tr>";
 
    }
}

echo "</table>";
 
mysqli_close($conexao);
 
 
?>


<!DOCTYPE html>

 
<head>
    <meta charset='utf-8'>
    <title>Consulta</title>
    <link rel="stylesheet" href="consulta.css" />
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            width:100%;
        }


        .buttonClass, .buttonClass2 {
           font-size:17px;
           font-family:Arial;
           display: block;
           width: 100%;
           margin-top: 20%;
           text-align: center;
           border-width:1px;
           color:#fff;
           text-align: center;
           border-color:rgba(199, 16, 85, 1);
           font-weight:bold;
           border-top-left-radius:31px;
           border-top-right-radius:31px;
           border-bottom-left-radius:31px;
           border-bottom-right-radius:31px;
           box-shadow:inset 0px 1px 0px 0px rgba(146, 13, 86, 1);
           text-shadow:inset 0px 1px 0px rgba(204, 82, 128, 1);
           background:linear-gradient(rgba(248, 144, 194, 1), rgba(121, 0, 55, 1));
        }
        
        .buttonClass {
          width: 130px;
          height:75px;
          margin-left: 40%;
          padding-top: 16px;
        }
        
        .buttonClass2 {
          width: 130px;
          height:70px;
          margin-left: 10%;
          padding: 16px;
        }
        

        .buttonClass:hover, .buttonClass2:hover {
        background: linear-gradient(rgba(121, 0, 55, 1), rgba(248, 144, 194, 1));
        }

        .container-login100 {
            width: 100%;
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            background: url("images/bg-01.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            z-index: 1;
        }

        .container-login100::before {
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(136, 50, 100, 0.678);
        }
         
    </style>

</head>
 
<body>
    <div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
    <a href="consulta.html" class="buttonClass">Realizar outra consulta</a>
    <a href="dist/menu.html" class="buttonClass2">Voltar ao menu</a>
    </div>
    </div>
</body>
 
</html>