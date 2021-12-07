<?php
    include 'gera_conexao.inc';
   
    $my_Insert_Statement = $conexao -> prepare('INSERT INTO usuario VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)'); 

    $my_Insert_Statement -> bind_param('issiissssssssssi', $matricula, $nome, $sobrenome, $cpf, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $email, $data_nascimento, $senha, $telefone, $sexo, $newsletter);

    /*cria aqui um select para saber qual é o valor do codigo na tabela de controle.
      Com o valor você soma 1 para fazer o insert e o update. */

    $resultado = mysqli_query ($conexao,'SELECT matricula FROM controle WHERE tabela = "usuario"');
    $registro = mysqli_fetch_array($resultado);
    $ultima_matricula = $registro["matricula"];

    
    $matricula  = $ultima_matricula + 1;
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf = (int)$_POST["cpf"];
    $cep = (int)$_POST["cep"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $email = $_POST["email"];
    $time   = strtotime($_POST["data_nascimento"]);
    $data_nascimento = date('Y-m-d',$time);
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];
    $sexo = $_POST["sexo"];
    if(isset($_POST["newsletter"])) {
      $newsletter = 1;
    } else {
      $newsletter = 0;
    }
    
  
    $my_Insert_Statement -> execute();

    $my_Update_Statement = $conexao -> prepare('UPDATE controle SET matricula = ? where tabela = ?');
    
    $my_Update_Statement -> bind_param('is', $matricula, $tabela);

    $matricula = $ultima_matricula + 1;
    $tabela = 'usuario';

    $my_Update_Statement -> execute();

    $linhas = $my_Insert_Statement->affected_rows;
    
    $linha_atualizadas = $my_Update_Statement->affected_rows;
    
    
    mysqli_close($conexao);
    
?>

<!DOCTYPE html>

<head>
    <meta charset='utf-8'>
    <title>Formulário</title>
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
          margin-left: 38%;
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
    <a href="form.html" class="buttonClass">Voltar ao cadastro</a>
    <a href="dist/menu.html" class="buttonClass2">Voltar ao menu</a>
    </div>
    </div>
</body>
 
</html>