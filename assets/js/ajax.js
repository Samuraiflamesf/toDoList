$("#form-task").submit(function () {
  event.preventDefault();
  var formData = new FormData(this);

  $.ajax({
    url: "../int/createTask.php",
    type: "POST",
    data: formData,

    success: function (mensagem) {
      if (mensagem.trim() == "Salvo com Sucesso!") {
        window.location = "index.php";
        $("#mensagem-task").innerHTML = "";
      } else {
        $("#mensagem-task").addClass("text-danger");
      }

      $("#mensagem-task").text(mensagem);
    },

    cache: false,
    contentType: false,
    processData: false,
  });
});
