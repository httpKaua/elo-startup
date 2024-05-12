<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'app';

/*
| -------------------------------------------------------------------------
| Rota para "login": quando o usuário acessa "/login" no navegador, o controlador "app" e o método "login"
| serão executados.
| -------------------------------------------------------------------------
*/
$route['login'] = 'app/login';
$route['cadastro'] = 'app/cadastro';
$route['confirmacao-cadastro'] = 'app/confirmarCadastro';
$route['recuperar-senha'] = 'app/recuperarSenha';
$route['desafios'] = 'app/desafios';
$route['perfil'] = 'app/perfil';
/*
| -------------------------------------------------------------------------
| $route['404_override'] = ''; 
| Esta linha define o controlador a ser executado quando uma página não é encontrada (erro 404). O valor
| padrão é uma string vazia, o que significa que o CodeIgniter usará a configuração padrão para lidar com
| erros 404. Você pode definir isso como o nome de um controlador específico se desejar personalizar o
| tratamento de erro 404.

| $route['translate_uri_dashes'] = FALSE;
| Esta linha controla como o CodeIgniter lida com traços ("-") na URL. Se definido como FALSE (como no
| exemplo), o CodeIgniter não traduzirá automaticamente traços em URLs para traços sublinhados no mapeamento
| de controladores e métodos. Isso significa que você pode usar URLs com traços. Se definido como TRUE, o
| CodeIgniter traduzirá traços em traços sublinhados no roteamento. A escolha entre TRUE ou FALSE depende das
| preferências do seu aplicativo.
| -------------------------------------------------------------------------

Ambas as linhas são parte da configuração do CodeIgniter que pode ser ajustada para atender às necessidades
específicas do seu aplicativo.
*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
