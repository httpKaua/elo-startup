// Botão de Cadastrar
$("#btn_cadastrar").click(() => {
	verificarCadastro();
});

// Função para verificar o cadastro fazendo uma requisição AJAX para o servidor
function verificarCadastro() {
    // Coleta os valores dos campos de entrada e os armazena em um objeto de dados
    const data = {
        nome: $("#nome").val(),
        sobrenome: $("#sobrenome").val(),
        email: $("#email").val(),
        senha: $("#senha").val(),
    };

    // Faz uma requisição AJAX para o servidor usando jQuery
    $.ajax({
        // URL do servidor onde a verificação do cadastro será realizada
        url: "http://localhost/Elo/app/verificarCadastro",
        // Tipo de requisição (POST neste caso)
        type: "POST",
        // Dados a serem enviados para o servidor
        data: data,
        // Tipo de dados esperados como resposta (JSON neste caso)
        dataType: "json",
        // Função a ser chamada em caso de sucesso na requisição
        success: handleCadastroResponse,
        // Função a ser chamada em caso de erro na requisição
        error: handleCadastroError,
    });
}


// Sucesso da resposta do AJAX
function handleCadastroResponse(resp) {
	// Verificando se o status da resposta é 0 (indicando um problema no cadastro)
	if (resp.status === 0) {

		// Se o e-mail já estiver em uso, mostrando uma mensagem de erro correspondente
		if (resp.email_repetido) {
			$("#texto-modal").html("O e-mail fornecido já está sendo utilizado!");
			mostrarMensagemDeErro(resp);
		}

		// Verificando campos vazios e mostrando mensagem de erro se o formato do e-mail for inválido
		resp.campos_vazios.forEach((element) => {
			if (element && element.email != "") {
				$("#texto-modal").html("O formato do e-mail é inválido!");
				mostrarMensagemDeErro(resp);
			}
		});

		// Mostrando quais campos estão vazios na resposta
		mostrarCamposVazios(resp.campos_vazios);

	} else if (resp.status === 1) {
		// Se o status for 1 (indicando sucesso), verificando se os termos foram aceitos
		if ($("#termos").prop("checked")) {
			// Se os termos foram aceitos, realizando alguma ação (não especificada no código)
			sessionCadastro();
		} else {
			// Se os termos não foram aceitos, mostrando mensagem de erro correspondente
			$("#texto-modal").html("Aceite os termos antes de continuar!");
			mostrarMensagemDeErro(resp);
		}
	}
}

// Função para enviar dados de cadastro para o servidor e redirecionar para a confirmação de cadastro
function sessionCadastro() {
    // Coleta os valores dos campos de entrada e os armazena em um objeto de requisição
    const request = {
        nome: $("#nome").val(),
        sobrenome: $("#sobrenome").val(),
        email: $("#email").val(),
        senha: $("#senha").val(),
    };

    // Envia a requisição POST para o servidor usando jQuery
    $.post(
        "http://localhost/Elo/app/armazenarDadosCadastroNaSessao",
        request,
        // Função de retorno que é executada após a conclusão da requisição
        function (data, status) {
            // Redireciona para a página de confirmação de cadastro
            location.href = "http://localhost/Elo/confirmacao-cadastro";
        }
    );
}

// Função para mostrar uma mensagem de erro em uma modal
function mostrarMensagemDeErro(mensagem) {
    // Alterna a visibilidade da classe "modal" para exibir a mensagem de erro
    $(".modal").toggle();
}


// Altera visibilidade dos inputs, quando estes estãos errados

// Função para destacar visualmente campos vazios, recebendo uma lista de campos vazios como parâmetro
function mostrarCamposVazios(camposVazios) {
	// Mapeia os nomes dos campos para seus IDs correspondentes no HTML
	const campoIDMap = {
		nome: "#nome",
		sobrenome: "#sobrenome",
		email: "#email",
		senha: "#senha",
	};

	// Itera sobre a lista de campos vazios
	camposVazios.forEach((element) => {
		// Obtém o ID do campo atual usando o mapeamento
		const campoID = campoIDMap[element];

		// Verifica se o campoID existe e se o valor do campo está vazio
		if (campoID && $(campoID).val() === "") {
			// Se sim, aplica um estilo com borda vermelha para destacar visualmente o campo vazio
			$(campoID).css("border-color", "red");
		}
	});
}


// Mensagem de erro, quado for erro na resposta do AJAX
function handleCadastroError(resp) {
	alert("Erro: " + resp);
}

// Aguarda até que o DOM esteja completamente carregado antes de executar o código
$(document).ready(function () {

    // Evento que é acionado quando há uma entrada de texto em qualquer elemento com a classe "form-control"
    $(".form-control").on("input", function () {
        // Verifica se o valor do elemento atual não está vazio
        if ($(this).val() !== "") {
            // Se não estiver vazio, remove qualquer estilo de borda (anteriormente aplicado para indicar um campo vazio)
            $(this).css("border-color", "");
        }
    });

    // Evento que é acionado quando o botão com o ID "close" é clicado
    $("button#close").on("click", function () {
        // Alterna a visibilidade da classe "modal" (mostra/oculta a modal)
        $(".modal").toggle();
    });
});

