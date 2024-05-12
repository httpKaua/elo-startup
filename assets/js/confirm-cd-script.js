// cria um arquivo de script que chama as 'mask' para o arquivo herdado
function myMask() {
	var url = "http://localhost/Elo/assets/js/myMask.js";
	var my_script = document.createElement("script");
	my_script.src = url;

	my_script.onload = function () {
		// Aqui, você pode chamar funções ou executar código dependente do script
		console.log("Script 'myMask.js' foi carregado com sucesso.");
	};

	my_script.onerror = function () {
		// Trate erros de carregamento, se necessário
		console.error("Erro ao carregar o script 'myMask.js'.");
	};

	document.head.appendChild(my_script);
}

// Adicionar novo elemento de formulário
function addExperience() {
	const formQuantity = document.querySelectorAll("div.experience-container");
	if (formQuantity.length >= 3) {
		$(".limite-form").show();
	} else {
		$.get(
			"http://localhost/Elo/assets/components/form-component-exp.php",
			function (data) {
				$(".container.p-4.add-form").append(data);
				// Chamando após a conclusão da requisição
				myMask();
			}
		);
	}
}

// Remove o formulário atual
function removeExperience(elementoNeto) {
	const elementoAvo = elementoNeto.closest(".experience-container");
	if (elementoAvo) {
		// Remover o elemento-pai
		elementoAvo.remove();
	}
}

function dadosCadastro() {
	let objeto = {};
	const elementos = document.querySelectorAll(".capture");
	const usuario_experiencia = []; //  experiencias profissionais
	const usuario_dados = {
		// informacoes pessoais
		dt_nascimento: $("#dt_nascimento").val(),
		sexo: $("#select_sexo").val(),
		cpf: $("#cpf").val(),
		rg: $("#rg").val(),
		dt_expedicao: $("#dt_expedicao").val(),
		estado: $("#estado").val(),
		cidade: $("#cidade").val(),
		endereco: $("#endereco").val(),
	};
	const usuario_tecnologia = {
		// tecnologias
		linguagem: $("#linguagem").val(),
		gestao: $("#gestao").val(),
		bancodados: $("#bancodados").val(),

		nivel_linguagem: $("input[name='nivel_linguagem']:checked").val() || "",
		nivel_gestao: $("input[name='nivel_gestao']:checked").val() || "",
		nivel_bancodados: $("input[name='nivel_bancodados']:checked").val() || "",
	};

	// recuperenado informações do formulário de experiÊncia, criando chave e valor para setar dados em um array
	elementos.forEach(function (elemento, index) {
		const chave = elemento.id;
		const valor = elemento.value;

		objeto[chave] = valor;

		if (index % 4 === 3) {
			usuario_experiencia.push({ ...objeto }); // Usando spread operator para criar uma cópia do objeto
		}
	});

	cadastrarUsuario(usuario_dados, usuario_experiencia, usuario_tecnologia);
}

// validar inputs
function validarInputs() {
	var inputs = $(".meusInputs");
	invalidos = false;

	// Iterar sobre os inputs e realizar a validação
	inputs.each(function () {
		var valorInput = $(this).val().trim();
		// Exemplo de validação: verificar se o valor está vazio ou nulo
		if (valorInput === "") {
			console.log("Por favor, preencha todos os campos!");
			invalidos = true;
			return false; // Isso interrompe a iteração se encontrar um campo vazio
		}
	});

	if (invalidos === false) {
		dadosCadastro();
	}
}

// AJAX cadastro de usuário
function cadastrarUsuario(usuario, experiencia, tecnologia) {
	const url = "http://localhost/Elo/app/cadastrarUsuario";
	$.post({
		url,
		data: {
			usuario: JSON.stringify(usuario),
			experiencia: JSON.stringify(experiencia),
			tecnologia: JSON.stringify(tecnologia),
		},
		success: (response) => {
			if (response.trim() === "0") {
				location.href = "http://localhost/Elo/login";
			} else if (response.trim() === "1") {
				$("#texto-modal").html("O e-mail fornecido já se encontra cadastrado!");
				$(".cadastro-aviso").show();
			}
		},
		error: (res) => {
			console.log("Erro no ajax de cadastrar usuário");
		},
	});
}
//
$(document).ready(function () {
	// Selecionar elementos de seleção (select)
	$("select").each(function () {
		const $selectElement = $(this);
		$selectElement.css("color", "gray");

		$selectElement.on("change", function () {
			const current = $selectElement.val();
			$selectElement.css("color", current !== "null" ? "black" : "gray");
		});
	});

	// Evento que é acionado quando há uma entrada de texto em qualquer elemento com a classe "form-control"
	$(".form-control").on("input", function () {
		// Verifica se o valor do elemento atual não está vazio
		if ($(this).val() !== "") {
			// Se não estiver vazio, remove qualquer estilo de borda (anteriormente aplicado para indicar um campo vazio)
			$(this).css("border-color", "");
		}
	});

	// Botão de ação do modal
	$("button#close").on("click", function () {
		$(".modal").hide();
	});

	//
	// function validarForms() {
	// 	var a = document.querySelectorAll(".validate");
	// }

	$("#btn_enviar").on("click", () => {

		validarInputs();
		// limitar experiencia


		// var inputLength=$(".inputTextarea").val().length; --

		// O usuário digitou pelo menos 300 e é menor que 500

		// if (inputLength >= 300 && inputLength <= 500) {
		// 	validarInputs();
		// } else {
		// 	$("#texto-modal").html("Experiência: Mínimo de 300 e máximo de 500 caracteres!");
		// 	$(".cadastro-aviso").show();
		// }
	});

	// evocação de máscara
	myMask();
});
