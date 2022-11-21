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
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/bootstrap.min.css">
    <!-- Styles Custom -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b04ef94895.js" crossorigin="anonymous"></script>
    <!-- Ícone e Nome do site -->
    <link rel="shortcut icon" href="FlameBox.ico">
</head>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div class="row w-100">


        <div class="card col-lg-4 col-md-6 m-auto p-1">
            <div class="card-body">
                <form action="" class="100-w">
                    <div class="form-floating mb-3 w-100">
                        <input type="text" class="form-control" id="floatingTask" placeholder="Task" required>
                        <label for="floatingTask">Adicionar Tarefa</label>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                        <!-- Criar Ajax para editar isso -->
                        <select class="form-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
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

    <!-- Javascript Custom -->
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="../assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../assets/vendor/bootstrap/jquery-3.6.0.min.js"></script>
</body>

</html>