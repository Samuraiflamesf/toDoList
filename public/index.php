<?php
require_once('../int/conexao.php');

//Recuperar dados 
$query = $pdo->query("SELECT * FROM tipo ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$id_tipo = $result[0]['id'];
$nome_tipo = $result[0]['Nome'];

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
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/bootstrap.min.css">
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
                    <form action="" class="100-w" id="form-task">
                        <div class="form-floating mb-3 w-100">
                            <input type="text" class="form-control" id="floatingTask" placeholder="Task" required>
                            <label for="floatingTask">Adicionar Tarefa</label>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                            <!-- Criar Ajax para editar isso -->
                            <select class="form-select" id="inputGroupSelect01">
                                <?php
                                //Pegar dados Tipo 
                                $query = $pdo->query("SELECT * FROM tipo ");
                                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                for ($i = 0; $i < @count($result); $i++) {
                                    foreach ($result[$i] as $key => $value) {
                                    };
                                    echo <<<HTML
                                    <option value="{$result[$i]['id']}">{$result[$i]['Nome']}</option>
                                    
                                    HTML;
                                }

                                ?>
                            </select>
                        </div>
                        <!-- Nível da Tarefa -->
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Nível</label>

                            <select class="form-select" id="inputGroupSelect01">
                                <?php
                                //Pegar dados Tipo 
                                $query = $pdo->query("SELECT * FROM nivel ");
                                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                $id_nivel = $result[0]['id'];
                                $nome_nivel = $result[0]['Nome'];

                                for ($i = 0; $i < @count($result); $i++) {
                                    foreach ($result[$i] as $key => $value) {
                                    };
                                    echo <<<HTML
                                    <option value="{$result[$i]['id']}">{$result[$i]['Nome']}</option>
                                    
                                    HTML;
                                }

                                ?>
                            </select>
                        </div>
                        <input type="submit" value="Criar" id="submitCreate" class="btn btn-danger text-center w-100">
                    </form>
                </div>
            </div>

        </div>

        <div class="row w-100 mt-3 d-flex align-content-around flex-wrap">


        </div>


    </div>

    <!-- Corpo de tarefaras  -->
    <div class="card">
        <div class="card-body">
            
        </div>
    </div>

    <!-- Modal de configuração -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Configuração</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Lista de Tipo:
                    <!-- Formulário para config de tipos -->
                    <form action="" id="formListTipo"></form>
                    <?php
                    //Pegar dados Tipo 
                    $query = $pdo->query("SELECT * FROM tipo ");
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < @count($result); $i++) {
                        foreach ($result[$i] as $key => $value) {
                        };
                        echo <<<HTML
                                    <input type="text" class="form-control mb-2" value="{$result[$i]['Nome']}">                                    
                                    HTML;
                    }

                    ?>
                    <button class="btn btn-dark mb-2 mt-2 w-100">Alterar</button>
                    <!-- Formulário para adicionar um tipo  -->
                    <form action="" id="formNewTipo">
                        <div class="form-floating mb-3 w-100">
                            <input type="text" class="form-control" id="floatingTask" placeholder="Task" required>
                            <label for="floatingTask">Novo Tipo</label>
                        </div>
                        <input type="submit" value="Criar" id="submitTipo" class="btn btn-danger text-center w-100">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript Custom -->
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="../assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../assets/vendor/bootstrap/jquery-3.6.0.min.js"></script>
</body>

</html>