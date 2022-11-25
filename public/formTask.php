<form id="form-task" method="POST">
    <div class="form-floating mb-3 w-100">
        <input type="text" class="form-control" id="floatingTask" name='task' placeholder="Tarefa" required>
        <label for="floatingTask">Adicionar Tarefa</label>
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
        <select class="form-select" id="inputGroupSelect01" name='tipo'>
            <?php
            //Pegar dados Tipo 
            $query = $pdo->query("SELECT * FROM tipo ORDER BY nome ASC");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $options) {
            ?>
                <option value="<?php echo $options['id_tipo'] ?>"><?php echo $options['nome']  ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <!-- Status da Tarefa -->
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Status</label>
        <select class="form-select" id="inputGroupSelect01" name='status_task'>
            <?php
            //Pegar dados Tipo 
            $query = $pdo->query("SELECT * FROM status ");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $options) {
            ?>
                <option value="<?php echo $options['id_status'] ?>"><?php echo $options['nome']  ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <input type="submit" class="btn btn-danger text-center w-100">
</form>
<div id="mensagem" class="d-none">
    Salvo com Sucesso!
</div>

<!-- Ajax para inserir ou editar dados -->
<script>
    $("#form-task").submit(function() {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "../int/criarTask.php",
            type: 'POST',
            data: formData,

            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!") {
                    $('#btn-fechar-perfil').click();
                    $('#mensagem').addClass('alert')
                    $('#mensagem').addClass('alert-success')
                    $('#mensagem').addClass('text-center')
                    $('#mensagem').addClass('mt-3')
                    listar();
                } else {

                    $('#mensagem').addClass('alert')
                    $('#mensagem').addClass('alert-danger')
                    $('#mensagem').addClass('text-center')
                    $('#mensagem').addClass('mt-3')
                }
                $('#mensagem').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });

    function listar() {
        $.ajax({
            method: "POST",
            dataType: "html",
            success: function(result) {
                window.location.reload();
            },
        });
    }</script>