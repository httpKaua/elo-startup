	<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class App extends CI_Controller
	{
		// ------------------------------
		// |   Carregamento das Views   |
		// ------------------------------
		private function loadView($pageName)
		{
			$cssFile = $pageName . '.css';
			$data = [
				'title' => ucfirst($pageName),
				'css' => 'assets/css/' . $cssFile
			];

			// Se não está logado, header básico
			if (!isset($_SESSION["usuario"])) {
				$this->load->view("view_header", $data);
			}
			// Se está logado, mostra o header com as funções do site
			else {
				$this->load->view("view_header_logado", $data);
			}

			$this->load->view($pageName);
			$this->load->view("view_footer");
		}

		private function pageController($page)
		{
			if (!isset($_SESSION["usuario"])) {
				header("Location: " . base_url("/login"));
				exit;
			} else {
				$this->loadView($page);
			}
		}

		// -------------
		// |   Views   |	
		// -------------

		public function index()
		{
			$this->loadView('index');
		}

		public function login()
		{
			if (!isset($_SESSION["usuario"])) {
				$this->loadView('login');
			} else {
				header("Location: " . base_url());
				exit;
			}
		}

		public function cadastro()
		{
			if (isset($_SESSION["usuario"])) {
				header("Location: " . base_url("/perfil"));
			} else {
				$this->loadView('cadastro');
			}
		}

		public function confirmarCadastro()
		{
			if (isset($_SESSION["usuario"])) {
				header("Location: " . base_url("/perfil"));
			} else if (!isset($_SESSION["cadastro"])) {
				header("Location: " . base_url("/cadastro"));
			} else {
				$this->loadView('confirmar-cadastro');
			}
		}

		public function desafios()
		{
			$this->pageController('desafios');
		}

		public function perfil()
		{
			$this->pageController('perfil');
		}
		// ----------------------
		// |  Página de Login   |
		// ----------------------

		// Verifica se usuário está logado e cria sessão (AJAX)
		public function verificarLogin()
		{
			// Se existe email e senha
			if (isset($_POST["email"]) && isset($_POST["senha"])) {
				$email = $_POST["email"];
				$senha = $_POST["senha"];
				// Armazena na variável dados e chama o Model com uma QUERY MySQL (application/models/db_elostartup.php)
				$dados = $this->db_elostartup->Logar($email, $senha);

				if ($dados) {
					// Login bem-sucedido
					$_SESSION["usuario"] = $dados;
					$dadosLogin = $this->db_elostartup->buscarInformacoes($email, $senha);
					$_SESSION["dados"] = $dadosLogin;
					echo base_url('/perfil');
					exit;
				} else {
					echo "0";
				}
			}
		}

		// -------------------------
		// |   Página de Cadastro  |
		// -------------------------

		// Verificando Cadastro
		public function verificarCadastro()
		{
			// Verificando se a requisição é POST
			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				// Definindo em um array os nomes dos campos obrigatórios
				$camposObrigatorios = ["nome", "sobrenome", "email", "senha"];
				// Array vazio para receber os campos que estiverem vazios
				$camposVazios = [];
				// Expressão Booleana para checkar email inválido
				$emailInvalido = false;
				// Expressão Booleana para checkar email existente
				$emailRepetido = false;

				// Verificando cada campo obrigatório
				foreach ($camposObrigatorios as $campo) {
					// Se não recebeu dado no campo (!) ou se ele  está vazio 
					if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
						// Adicionado ao array de campos vazios
						$camposVazios[] = $campo;
					}
				}
				// Validando o campo de email usando expressão regular
				if (isset($_POST["email"]) && !preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$/', $_POST["email"])) {
					// Se o email não estiver no formato válido (de acordo com a expressão regular), marque-o como inválido
					$emailInvalido = true;
				} else if (!empty($_POST["email"])) {
					// Caso contrário, verifique se o email já está em uso no banco de dados
					if ($this->db_elostartup->buscarUsuario($_POST["email"]) == true) {
						// Se estiver em uso, também marque-o como inválido
						$emailRepetido = true;
					}
				}


				// Se está vazio o array de camposVazios (ou seja, está tudo certo) e o email não é inválido
				if (empty($camposVazios) && !$emailInvalido && !$emailRepetido) {
					// Array associativo para enviar retorno ao JavaScript com chave e valor
					$response = [
						'status' => 1,
						'message' => "Dados válidos e e-mail correto!"
					];
				}
				// Array associativo para enviar retorno com JavaScript chave e valor
				else {
					$response = [
						'status' => 0,
						'message' => "Campos obrigatórios não preenchidos ou email inválido",
						'campos_vazios' => $camposVazios,
						'email_invalido' => $emailInvalido,
						'email_repetido' => $emailRepetido,
					];
				}
			}
			// Array associativo para enviar retorno com JavaScript chave e valor
			else {
				$response = [
					'status' => 0,
					'message' => "Requisição inválida"
				];
			}
			// Definindo JSON	
			header('Content-Type: application/json');
			echo json_encode($response);
		}

		//  Recebe os dados do usuário e cria a sessão
		public function armazenarDadosCadastroNaSessao()
		{
			$nome = isset($_POST["nome"]) && isset($_POST["sobrenome"]) ? $_POST["nome"] . " " . $_POST["sobrenome"] : "";
			$email = isset($_POST["email"]) ? $_POST["email"] : "";
			$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
			$dadosCadastro = [
				"nome" => $nome,
				"email" => $email,
				"senha" => $senha
			];
			$_SESSION["cadastro"] = $dadosCadastro;
		}

		// 
		public function cadastrarUsuario()
		{
			$_POST["usuario"] = json_decode($_POST["usuario"]);
			$_POST["experiencia"] = json_decode($_POST["experiencia"]);
			$_POST["tecnologia"] = json_decode($_POST["tecnologia"]);

			$dadosCadastro = $_SESSION["cadastro"];

			if ($this->db_elostartup->verficarUsuario($dadosCadastro["email"], $_POST["usuario"]->cpf)) {
				echo "1";
			} else {
				$this->db_elostartup->cadastrarRegistro($_POST["usuario"], $dadosCadastro, $_POST["tecnologia"], $_POST["experiencia"]);

				echo "0";
			}
		}

		// Função para destruir a sessão quando clicka no botão 'Deslogar' da Navbar
		public function sessionDestroy()
		{
			// Destroindo a sessão
			session_destroy();
			// Retornando para o Ajax a URL (Arquivo - header.js)
			echo base_url("/login");
			exit;
		}

		public function verificarArquivo()
		{
			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				if (isset($_FILES["arquivo"])) {
					$id = $_POST['id'];
					if (preg_match('/\d+/', $id, $matches)) {
						$id = $matches[0];
					}
					$idUsuario = $this->session->usuario['id_usuario'];
					if (!$this->db_elostartup->pesquisaResposta($idUsuario, $id)) {
						$config['upload_path'] = './assets/respostas/';
						$config['allowed_types'] = 'rar|zip';

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('arquivo')) {
							$error = $this->upload->display_errors();
							echo $error;
						} else {
							$upload_data = $this->upload->data();
							$nome_arquivo = $upload_data['file_name'];
							$_SESSION["file_name"] = $nome_arquivo;
							echo "0";
							// echo "Upload bem-sucedido. Nome do arquivo: " . $nome_arquivo;
						}
					} else {
						echo "1";
						// echo "Existe um arquivo com esse ID";
					}
				} else {
					echo "2";
					// echo "Nenhum arquivo foi enviado.";
				}
			} else {
				echo "3";
				// echo "Requisição inválida.";
			}
		}

		public function armazenarFile()
		{
			if ($_SERVER["REQUEST_METHOD"] === "POST") {

				if (isset($_SESSION["file_name"])) {

					$id = $this->input->post('idDesafio');
					/* Resultado: #desafio_(numero) com essa expressão eu extraio o número, 
					se for #desafio_1, terei como retorno apenas 1
				*/
					if (preg_match('/\d+/', $id, $matches)) {
						$id = $matches[0];
					}
					$this->db_elostartup->verificarResposta($id);
				} else {
					echo "Nenhum arquivo foi enviado.";
				}
			} else {
				echo "Requisição inválida.";
			}
		}
	}
