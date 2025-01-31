<?php
include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/controller/PessoaController.php';
include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Pessoa.php';
$pe = new Pessoa();
$btEnviar = FALSE;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .btInput {
            padding: 10px 20px 10px 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row" style="margin-top: 30px;">
            <div class="col-8 offset-2">

                <div class="card-header bg-dark text-center text-white border" style="padding-bottom: 15px; padding-top: 15px;">
                    Cadastro de Teste
                </div>
                <?php
                //envio dos dados para o BD
                if (isset($_POST['cadastrar'])) {
                    $nome = trim($_POST['nome']);
                    if ($nome != ""){
                    $nome = $_POST['nome'];
                    $dtNasc = $_POST['dtNasc'];
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $perfil = $_POST['perfil'];
                    $cpf = $_POST['cpf'];
                    $email = $_POST['email'];
                    $cep = $_POST['cep'];
                    $logradouro = $_POST['logradouro'];
                    $complemento = $_POST['complemento'];
                    $bairro = $_POST['bairro'];
                    $cidade = $_POST['cidade'];
                    $uf = $_POST['uf'];

                    $pc = new PessoaController();
                    unset($_POST['cadastrar']);
                    $msg = $pc->inserirPessoa(
                        $nome,
                        $dtNasc,
                        $login,
                        $senha,
                        $perfil,
                        $email,
                        $cpf, 
                        $cep, 
                        $logradouro , 
                        $complemento , 
                        $bairro, 
                        $cidade, 
                        $uf
                    );
                    echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastro.php'\">";
                }
            }
                ?>
                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Código: </label> <br>
                                <label>Nome Completo</label>
                                <input class="form-control" type="text" name="nome">
                                <label>Data de Nascimento</label>
                                <input class="form-control" type="date" name="dtNasc">
                                <label>E-Mail</label>
                                <input class="form-control" type="email" name="email">
                                <label>CPF</label>
                                <input class="form-control" type="text" name="cpf">
                            </div>

                            <div class="col-md-6"><br>


                                <label>Login</label>
                                <input class="form-control" type="text" name="login">
                                <label>Senha</label>
                                <input class="form-control" type="password" name="senha">
                                <label>Conf. Senha</label>
                                <input class="form-control" type="password" name="senha2">
                                <label>Perfil</label>
                                <select name="perfil" class="form-select">
                                    <option hidden>Selecione</option>
                                    <option>Cliente</option>
                                    <option>Funcionário</option>
                                </select>
                            </div>
                        </div>
                        <hr class="featurette-divider ">
                        <div class="card-header bg-light text-center border" style="padding-bottom: 15px; padding-top: 15px;">
                            Preencha seu endereço
                        </div>

                        <div class="card-body ">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Código2: </label> <br>
                                        <label>CEP</label>
                                        <input class="form-control" type="text" name="cep">
                                        <label>Logradouro</label>
                                        <input class="form-control" type="text" name="logradouro">
                                        <label>Complemento</label>
                                        <input class="form-control" type="email" name="complemento">
                                    </div>

                                    <div class="col-md-6"><br>

                                        <label>Bairro</label>
                                        <input class="form-control" type="text" name="bairro">
                                        <label>Cidade</label>
                                        <input class="form-control" type="text" name="cidade">
                                        <label>UF teste</label>
                                        <input class="form-control" type="password" name="uf">
                                        
                                    </div>
                                </div>
                                <div class="col-6 offset-4">
                                    <input type="submit" name="cadastrar" class="btn btn-success btInput" value="Enviar">
                                    &nbsp;&nbsp;
                                    <input type="reset" class="btn btn-light btInput" value="Limpar">
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>