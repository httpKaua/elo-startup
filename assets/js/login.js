// Esconde um elemento com o ID "mensagem_invalida" quando a página é carregada.
$("#mensagem_invalida").hide();

// Define um evento de clique para o botão com o ID "btn_logar".
$("#btn_logar").on("click", function () {
	// Faz uma requisição AJAX para a URL especificada.
	$.ajax({
		type: "POST",
		url: "http://localhost/Elo/app/verificarLogin",
		data: { email: $("#email").val(), senha: $("#senha").val() },
		success: function (response) {
			if (response.trim() == "0") {
				alert("Usuário inválido ou dados incorretos. Tente novamente!");
			} else {
				location.href = response.trim();
			}
		},
	});
});

// Adiciona um evento de input para todos os elementos com a classe "form-control".
$(".form-control").on("input", function () {
	if ($(this).val() !== "") {
		// Se o valor do campo não estiver vazio, remove a cor da borda e esconde o elemento com o ID "mensagem_invalida".
		$(this).css("border-color", "");
		$("#mensagem_invalida").hide();
	}
});
