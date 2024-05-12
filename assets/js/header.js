// Função para deslogar
function deslogar() {
	// Enviando para o controlador com AJAX (controller/app.php - function sessionDestroy)
	$.ajax({
		type: "POST",
		url: "http://localhost/Elo/app/sessionDestroy",
		success: function (response) {
			// Redirecionando para a URL que a função retornou (para a página de login)
            location.href = response.trim();
		},
	});
}
