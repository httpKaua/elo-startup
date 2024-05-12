<?php
class Db_elostartup extends CI_Model
{

    /**
     * Realiza a autenticação do usuário.
     *
     * @param string $email - O e-mail do usuário.
     * @param string $senha - A senha do usuário.
     * @return array|null - Retorna um array com os dados do usuário em caso de sucesso ou null se falhar.
     */

    public function Logar($email, $senha)
    {
        // Consulta SQL usando Query Builder do CodeIgniter
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $query = $this->db->get('usuarios')->row_array();

        // Retorna os dados do usuário se existirem, senão retorna null
        return $query;
    }

    public function buscarInformacoes($email, $senha)
    {
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $query = $this->db->get('usuarios')->row();

        $result = array();

        // Consulta para buscar tecnologias relacionadas
        $this->db->where('id_usuario', $query->id_usuario);
        $queryTwo = $this->db->get('tecnologias')->result();
        $result['tecnologias'] = $queryTwo;

        // Consulta para buscar conhecimentos relacionados
        $this->db->where('id_usuario', $query->id_usuario);
        $queryThree = $this->db->get('conhecimentos')->result();
        $result['conhecimentos'] = $queryThree;

        return $result;
    }



    // ----------------
    // |   Cadastro   |
    // ----------------
    // cadastra novo usuário    Não terminado
    public function cadastrarRegistro($usuario, $cadastro, $tecnologia, $experiencia)
    {
        $this->cadastrarUsuario($cadastro, $usuario);
        $this->cadastrarTecnologia($cadastro["nome"], $tecnologia);
        $this->cadastrarExperiencia($cadastro["nome"], $experiencia);
    }

    public function verficarUsuario($cpf, $email)
    {
        $sql = "SELECT nome FROM usuarios WHERE nome=? and cpf=?";
        $validate = $this->db->query($sql, array($cpf, $email))->row_array();
        return $validate;
    }

    // não cadastras as experiencias
    private function buscarId($nome)
    {
        $sql = "SELECT id_usuario FROM usuarios WHERE nome=?";
        $id = $this->db->query($sql, array($nome))->row_array();
        return $id["id_usuario"];
    }


    public function cadastrarExperiencia($nome, $experiencia)
    {
        $id_usuario = $this->buscarId($nome);
        foreach ($experiencia as $array) {
            $array->id_usuario = $id_usuario;
        }
        $this->db->insert_batch("conhecimentos", $experiencia);
        return;
    }

    // cadastra tecnologia no banco de dados
    private function cadastrarTecnologia($nome, $tecnologia)
    {

        $id_usuario = $this->buscarId($nome);
        $usuario_tecnologias = array(
            "id_usuario" => $id_usuario,
            'linguagem' => $tecnologia->linguagem,
            'gestao' => $tecnologia->gestao,
            'bancodados' => $tecnologia->bancodados,
            'nivel_linguagem' => $tecnologia->nivel_linguagem,
            'nivel_gestao' => $tecnologia->nivel_gestao,
            'nivel_bancodados' => $tecnologia->nivel_bancodados
        );

        return $this->db->insert("tecnologias", $usuario_tecnologias);
    }
    // cadastra usuário
    private function cadastrarUsuario($cadastro, $usuario)
    {
        $usuario_dados = array(
            "nome" => $cadastro["nome"], // dao usar dessa forma
            "email" => $cadastro["email"],
            "senha" => $cadastro["senha"],
            "dt_nascimento" => $usuario->dt_nascimento, // usa-se dessa forma pois é a forma reduzida de buscar variável em uma classe génerica(stdclass).
            "sexo" => $usuario->sexo,
            "cpf" => $usuario->cpf,
            "rg" => $usuario->rg,
            "dt_expedicao" => $usuario->dt_expedicao,
            "estado" => $usuario->estado,
            "cidade" => $usuario->cidade,
            "endereco" => $usuario->endereco
        );

        $this->db->insert("usuarios", $usuario_dados);
    }

    // verifica se existe um usuário cadastrado
    public function buscarUsuario($email)
    {
        $sql = "SELECT nome from usuarios where email=?";
        $query = $this->db->query($sql, array($email))->row_array();

        // testar
        if (isset($query)) {
            return true;
        } else {
            return false;
        }
    }
    // ---------------
    // |   Desafios   |
    // ------------------
    public function uploadFile($id)
    {

        // Obtém o nome do arquivo da sessão
        $fileName = $_SESSION["file_name"];
        $idUsuario = $_SESSION["usuario"]["id_usuario"];

        $path = 'assets/respostas/' . $fileName;

        // Nome da tabela no banco de dados
        $tabela = 'respostas';

        // Configura o fuso horário para Brasília
        date_default_timezone_set('America/Sao_Paulo');

        // Obtém a data e hora atual no formato 'Y-m-d H:i:s'
        $dataAtual = date('Y-m-d H:i:s');

        // Dados a serem inseridos no banco de dados
        $data = array(
            'id_usuario' => $idUsuario,
            'desafio' => $id,
            'path' => $path,
            'date' => $dataAtual,
        );

        // Insire os dados no banco de dados
        $this->db->insert($tabela, $data);
        unset($_SESSION['file_name']);
    }

    public function verificarResposta($id)
    {
        $idUsuario = $this->session->usuario['id_usuario'];

        $this->db->select('*');
        $this->db->from('respostas');
        $this->db->where('id_usuario', $idUsuario);
        $this->db->where('desafio', $id);
        $query = $this->db->get()->row_array();

        if ($query) {
            return false;
        } else {
            $this->uploadFile($id);
        }
    }

    public function pesquisaResposta($idUsuario, $id)
    {
        $this->db->select('id_usuario');
        $this->db->from('respostas');
        $this->db->where('id_usuario', $idUsuario);
        $this->db->where('desafio', $id);
        $result = $this->db->get()->row_array();

        return isset($result["id_usuario"]) ? $result["id_usuario"] : null;
    }
    // --------------
    // |   Perfil   |
    // --------------
    public function buscardados()
    {
    }
}
