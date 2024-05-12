// Aguarde até que o documento HTML esteja completamente carregado e pronto para manipulação.
$(document).ready(function () {
	// Ocultar todas as divs de desafio, exceto a primeira
	$(".desafio").hide(); // Selecione todas as divs com a classe "desafio" e oculte-as.
	$("#desafio_1").show(); // Mostre a div com o ID "desafio_1".
	var targetId = "#desafio_1"; //Target default

	// Lidar com os cliques nos links
	$("a[id^='btn_semana']").on("click", function () {
		// Quando um link com um ID que começa com "btn_semana" é clicado:

		targetId = $(this).data("target"); // Obtenha o valor do atributo "data-target" do link clicado.

		$(".desafio").hide(); // Oculte todas as divs com a classe "desafio".
		$(targetId).show(); // Mostre a div cujo ID corresponde ao valor do "data-target" do link.
	});

	// Quando o botão com o id "btn_enviar" for clicado
	// Adicionando a classe "submit-button" aos botões de envio relacionados a cada campo de entrada de arquivo
	$(".btn_enviar").on("click", function () {
		// Encontrando o campo de entrada de arquivo associado usando a classe ou outros atributos
		var arquivo = $(this)
			.closest(".u-form-submit")
			.prev(".u-form-name")
			.find(".fileInput")[0].files[0];

		// Verificando se um arquivo foi selecionado
		// if (arquivo) {
		// Criandoum objeto FormData para enviar o arquivo
		var formData = new FormData();
		formData.append("arquivo", arquivo);
		formData.append("id", targetId);

		// Realizando a solicitação AJAX para a página "verificarArquivo"
		$.ajax({
			type: "POST",
			url: "http://localhost/Elo/app/verificarArquivo",
			data: formData,
			contentType: false,
			processData: false,
			success: function (resposta) {
				if (resposta.trim() === "0") {
					$("#texto-modal").html(
						"Upload bem-sucedido. Resposta computada com sucesso!"
					);
				} else if (resposta.trim() === "1") {
					$("#texto-modal").html(
						"Não foi possível enviar a sua resposta. Você já respondeu a esse desafio!"
					);
				} else if (resposta.trim() === "2") {
					$("#texto-modal").html(
						"Por favor, selecione um arquivo antes de tentar enviar."
					);
				} else if (resposta.trim() === "3") {
					$("#texto-modal").html("Requisição inválida. Utilize o método POST.");
				}
				// Manipulando a resposta bem-sucedida da primeira solicitação
				// console.log("Resposta do servidor (1ª solicitação): " + resposta);
				$.ajax({
					url: "http://localhost/Elo/app/armazenarFile",
					data: { idDesafio: targetId },
					type: "POST",
					success: function (resposta) {
						$(".modal").toggle();
					},
					error: function () {
						// Manipulando erros da segunda solicitação
						console.error("Ocorreu um erro na segunda solicitação.");
					},
				});
			},
			error: function () {
				// Manipulando erros da primeira solicitação
				console.error("Ocorreu um erro na primeira solicitação.");
			},
		});
		// }
	});

	// Evento que é acionado quando o botão com o ID "close" é clicado
	$("button#close").on("click", function () {
		// Alterna a visibilidade da classe "modal" (mostra/oculta a modal)
		$(".modal").toggle();
	});
});
