$("#formNewTipo").submit(function () {
  event.preventDefault();
  var formData = new FormData(this);

  $.ajax({
    url: "../int/criarTipo.php",
    type: "POST",
    data: formData,
    success: function (mensagem) {
      if (mensagem.trim() == "Salvo com Sucesso!") {
        window.location = "index.php";
        $("#mensagem-task").innerHTML = "";
      } else {
        $("#mensagem-task").addClass("alert");
        $("#mensagem-task").addClass("alert-danger");
        $("#mensagem-task").addClass("text-center");
        $("#mensagem-task").addClass("mt-3");
      }

      $("#mensagem-task").text(mensagem);
    },

    cache: false,
    contentType: false,
    processData: false,
  });
});
