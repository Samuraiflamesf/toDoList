<?php
require_once('../int/conexao.php');

echo <<<HTML
<table class="table my-4" id="tabela" id='listar'>
<thead>
<tr>
<th class='col-8'>Tarefa</th>
<th class='col'>Tipo</th>
<th class='col'>Ações</th>
</tr>
</thead>
<tbody>
HTML;
$query2 = $pdo->query("SELECT * from status");
$result2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$query3 = $pdo->query("SELECT * from tipo");
$result3 = $query3->fetchAll(PDO::FETCH_ASSOC);

$query = $pdo->query("SELECT * from task order by id desc");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
for ($i = 0; $i < @count($result); $i++) {
    foreach ($result[$i] as $key => $value) {
    };
    echo <<<HTML
    <tr>
    <td>{$result[$i]['task']}
        <span class="mx-1 badge " id='checkColor'>
        {$result2[$result[$i]['fk_status']-1]['nome']}
    </span></td>
    <td>{$result3[$result[$i]['fk_tipo']-1]['nome']}</td>
    <td></td>
    </tr>
    HTML;
}
?>
</tbody>
</table>

<!-- Fazer script para mudar a cor do badge -->
<script>
    function checkColor() {
        let badge = document.querySelectorAll('#checkColor');

        for (let i = 0; i < badge.length; i++) {
            if (badge[i].innerText == 'Normal') {
                badge[i].classList.remove('bg-secondary');
                badge[i].classList.add('bg1');
            }
            if (badge[i].innerText == 'Moderado') {
                badge[i].classList.remove('bg-secondary');
                badge[i].classList.add('bg2');
            }
            if (badge[i].innerText == 'Alto') {
                badge[i].classList.remove('bg-secondary');
                badge[i].classList.add('bg3');
            }
            if (badge[i].innerText == 'Altissimo') {
                badge[i].classList.remove('bg-secondary');
                badge[i].classList.add('bg4');
            }

        }
    }
    checkColor()
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabela').DataTable({
            "ordering": false,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json",
            },
        });

    });
</script>