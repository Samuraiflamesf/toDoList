<?php
require_once('../int/conexao.php');

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- Titulo -->
    <title><?php echo $nome_sistema ?></title>
    <!-- Meta tags Obrigatórias -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor/DataTables/datatables.min.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="../assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../assets/vendor/bootstrap/jquery-3.6.0.min.js"></script>
    <!-- Styles Custom -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b04ef94895.js" crossorigin="anonymous"></script>
    <!-- Ícone e Nome do site -->
    <link rel="shortcut icon" href="FlameBox.ico">
</head>

<body>
    <nav class="navbar bg-danger">
        <div class="container-fluid ">
            <a class="navbar-brand h3 p-2" href="#">
                TodoList
            </a>
            <!-- Btn modal -->
            <button type="button" class="btn bg-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-gear"></i>
            </button>
        </div>
    </nav>
    <!-- Card de adicionar tarefas -->
    <div class="container d-flex align-items-center justify-content-center flex-column mt-3">
        <div class="row w-100">
            <div class="card col-md-6 m-auto p-1">
                <div class="card-body">
                    <!-- Formulário para criar novas task  -->
                    <?php
                    require_once('formTask.php') ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Corpo/ as tarefas  em outro PhP-->
    <div class="card container mt-3" id="cardData">
        <div class="card-body">
            <?php
            require_once('task.php');
            ?>
        </div>
    </div>

    <!-- Modal de configuração -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Configuração
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body h6">
                    Lista de Tipo:
                    <div id="mensagem-task">

                    </div>

                    <!-- Formulário para config de tipos -->
                    <form id="formListTipo" method="POST" class="mt-2">
                        <select name="opTipos" class="form-select mb-2">


                            <?php
                            $query = $pdo->query("SELECT * FROM tipo ");
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $option) {
                            ?>
                                <option value="<?php echo $option['id_tipo'] ?>"><?php echo $option['nome'] ?></option>
                            <?php
                            };
                            ?>
                        </select>
                        <input type="text" name="tipo" class="form-control mb-2" value="">
                        <button class="btn btn-dark mb-2 mt-2 w-100" type="submit">Alterar</button>
                    </form>
                    <!-- Formulário para adicionar um tipo  -->
                    <form method="POST" id="formNewTipo">
                        <div class="form-floating mb-3 w-100">
                            <input type="text" class="form-control" id="floatingTask" placeholder="Tipo" name="tipoNew" required>
                            <label for="floatingTask">Novo Tipo</label>
                        </div>
                        <input type="submit" value="Criar" id="submitTipo" class="btn btn-danger text-center w-100">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript Custom -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/ajax.js"></script>
    <script type="text/javascript" src="../assets/vendor/DataTables/datatables.min.js"></script>
    <script src="../assets/js/ajax.js"></script>
    <script src="../assets/js/ajax2.js"></script>
</body>

</html>