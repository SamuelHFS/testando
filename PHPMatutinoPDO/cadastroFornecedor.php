<?php
include_once 'controller/FornecedorController.php';
include_once './model/Fornecedor.php';
include_once './model/Mensagem.php';
$msg = new Mensagem();
$fo = new Fornecedor();
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .btInput {
            margin-top: 20px;
        }

        body {
            font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .pad15 {
            padding-bottom: 15px;
            padding-top: 15px;
        }
    </style>
    <script>
        function mascara(t, mask) {
            var i = t.value.length;
            var saida = mask.substring(1, 0);
            var texto = mask.substring(i)
            if (texto.substring(0, 1) != saida) {
                t.value += texto.substring(0, 1);
            }
        }
    </script>
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
            <div class="col-md-4">
                <div class="card-header bg-dark text-center border
                         text-white"><strong>Cadastro de Fornecedor</strong>
                </div>
                <div class="card-body border">
                    <?php
                    //envio dos dados para o BD
                    if (isset($_POST['cadastrarFornecedor'])) {
                        $nomeFornecedor = trim($_POST['nomeFornecedor']);
                        if ($nomeFornecedor != "") {
                            $logradouro = $_POST['logradouro'];

                            $complemento = $_POST['complemento'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $uf = $_POST['uf'];
                            $cep = $_POST['cep'];
                            $representante = $_POST['representante'];
                            $email = $_POST['email'];
                            $telFixo = $_POST['telFixo'];
                            $telCel = $_POST['telCel'];

                            $fc = new FornecedorController();
                            unset($_POST['cadastrarFornecedor']);
                            $msg = $fc->inserirFornecedor(
                                $nomeFornecedor,
                                $logradouro,

                                $complemento,
                                $bairro,
                                $cidade,
                                $uf,
                                $cep,
                                $representante,
                                $email,
                                $telFixo,
                                $telCel
                            );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                        }
                    }

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarFornecedor'])) {
                        $nomeFornecedor = trim($_POST['nomeFornecedor']);
                        if ($nomeFornecedor != "") {
                            $idfornecedor = $_POST['idFornecedor'];
                            $logradouro = $_POST['logradouro'];

                            $complemento = $_POST['complemento'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $uf = $_POST['uf'];
                            $cep = $_POST['cep'];
                            $representante = $_POST['representante'];
                            $email = $_POST['email'];
                            $telFixo = $_POST['telFixo'];
                            $telCel = $_POST['telCel'];

                            $fc = new FornecedorController();
                            unset($_POST['atualizarFornecedor']);
                            $msg = $fc->atualizarFornecedor(
                                $idfornecedor,
                                $nomeFornecedor,
                                $logradouro,

                                $complemento,
                                $bairro,
                                $cidade,
                                $uf,
                                $cep,
                                $representante,
                                $email,
                                $telFixo,
                                $telCel
                            );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                        }
                    }

                    if (isset($_POST['excluir'])) {
                        if ($fo != null) {
                            $id = $_POST['ide'];

                            $fc = new FornecedorController();
                            unset($_POST['excluir']);
                            $msg = $fc->excluirFornecedor($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                        }
                    }

                    if (isset($_POST['excluirFornecedor'])) {
                        if ($fo != null) {
                            $id = $_POST['idFornecedor'];
                            unset($_POST['excluirFornecedor']);
                            $fc = new FornecedorController();
                            $msg = $fc->excluirFornecedor($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroFornecedor.php'\">";
                        }
                    }

                    if (isset($_POST['limpar'])) {
                        $fo = null;
                        unset($_GET['idFornecedor']);
                        header("Location: cadastroFornecedor.php");
                    }
                    if (isset($_GET['idFornecedor'])) {
                        $btEnviar = TRUE;
                        $btAtualizar = TRUE;
                        $btExcluir = TRUE;
                        $idFornecedor = $_GET['idFornecedor'];
                        $fc = new FornecedorController();
                        $fo = $fc->pesquisarFornecedorId($idFornecedor);
                    }
                    ?>
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Código: <label style="color:red;">
                                        <?php
                                        if ($fo != null) {
                                            echo $fo->getIdFornecedor();
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="idFornecedor" value="<?php echo $fo->getIdFornecedor(); ?>"><br>
                            <?php
                                        }
                            ?>
                            <label>Fornecedor</label>
                            <input class="form-control" type="text" name="nomeFornecedor" value="<?php echo $fo->getNomeFornecedor(); ?>">

                            <label>Logradouro</label>
                            <input class="form-control" type="text" id="rua" value="<?php echo $fo->getLogradouro(); ?>" name="logradouro">



                            <label>Complemento</label>
                            <input class="form-control" type="text" id="complemento" value="<?php echo $fo->getComplemento(); ?>" name="complemento">

                            <label>Bairro</label>
                            <input class="form-control" type="text" id="bairro" value="<?php echo $fo->getBairro(); ?>" name="bairro">

                            <label>Cidade</label>
                            <input class="form-control" type="text" id="cidade" value="<?php echo $fo->getCidade(); ?>" name="cidade">

                            <label>UF</label>
                            <input class="form-control" type="text" id="uf" value="<?php echo $fo->getUf(); ?>" name="uf" maxlength="2">

                            <label>CEP</label><label id="cepErro" style="color: red;"></label>
                            <input class="form-control" type="text" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="<?php echo $fo->getCep(); ?>" name="cep">

                            <label>Representante</label>
                            <input class="form-control" type="text" value="<?php echo $fo->getRepresentante(); ?>" name="representante">

                            <label>Email</label>
                            <input class="form-control" type="email" value="<?php echo $fo->getEmail(); ?>" name="email">

                            <label>Telefone Fixo</label>
                            <input class="form-control" type="text" value="<?php echo $fo->getTelFixo(); ?>" name="telFixo">

                            <label>Telefone Celular</label>
                            <input class="form-control" type="text" value="<?php echo $fo->getTelCel(); ?>" name="telCel">

                            <input type="submit" name="cadastrarFornecedor" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                            <input type="submit" name="atualizarFornecedor" class="btn btn-secondary btInput" value="Atualizar" <?php if ($btAtualizar == FALSE) echo "disabled"; ?>>
                            <button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#ModalExcluir" <?php if ($btExcluir == FALSE) echo "disabled"; ?>>
                                Excluir
                            </button>
                            <!-- Modal para excluir -->
                            <div class="modal fade" id="ModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Confirmar Exclusão</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Deseja Excluir?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="excluirFornecedor" class="btn btn-success " value="Sim">
                                            <input type="submit" class="btn btn-light btInput" value="Não">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim do modal para excluir -->
                            &nbsp;&nbsp;
                            <input type="submit" class="btn btn-light btInput" name="limpar" value="Limpar">
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive" style="border-radius: 3px; overflow:hidden;">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Código</th>

                                <th scope="col">Nome</th>
                                <th scope="col">Log</th>

                                <th scope="col">Compl</th>
                                <th scope="col">bairro</th>
                                <th scope="col">Cid</th>
                                <th scope="col">UF</th>
                                <th scope="col">CEP</th>
                                <th scope="col">Repr</th>
                                <th scope="col">Email</th>
                                <th scope="col">Fixo</th>
                                <th scope="col">Cel</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fcTable = new FornecedorController();
                            $listaFornecedores = $fcTable->listarFornecedores();
                            $a = 0;
                            if ($listaFornecedores != null) {
                                foreach ($listaFornecedores as $lf) {
                                    $a++;
                            ?>
                                    <tr>
                                        <td><?php print_r($lf->getIdFornecedor()); ?></td>
                                        <td><?php print_r($lf->getNomeFornecedor()); ?></td>
                                        <td><?php print_r($lf->getLogradouro()); ?></td>

                                        <td><?php print_r($lf->getComplemento()); ?></td>
                                        <td><?php print_r($lf->getBairro()); ?></td>
                                        <td><?php print_r($lf->getCidade()); ?></td>
                                        <td><?php print_r($lf->getUf()); ?></td>
                                        <td><?php print_r($lf->getCep()); ?></td>
                                        <td><?php print_r($lf->getRepresentante()); ?></td>
                                        <td><?php print_r($lf->getEmail()); ?></td>
                                        <td><?php print_r($lf->getTelFixo()); ?></td>
                                        <td><?php print_r($lf->getTelCel()); ?></td>
                                        <td><a href="cadastroFornecedor.php?idFornecedor=<?php echo $lf->getIdFornecedor(); ?>" class="btn btn-light">
                                                <img src="img/edita.png" width="32"></a>
                                            </form>
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
                                                <img src="img/delete.png" width="32"></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="">
                                                        <label><strong>Deseja excluir o Fornecedor
                                                                <?php echo $lf->getNomeFornecedor(); ?>?</strong></label>
                                                        <input type="hidden" name="ide" value="<?php echo $lf->getIdFornecedor(); ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jQuery.js"></script>
    <script src="js/jQuery.min.js"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
    <!-- Adicionando Javascript controle de endereço via cep-->
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#cepErro").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");


                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);

                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'CEP não encontrado'
                                })

                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'CEP Inválido'

                        })
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</body>

</html>