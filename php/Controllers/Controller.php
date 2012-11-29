<?php
/**
 * arquivo da classe controller
 * 
 * @since 2012-11-29
 */

namespace App\Controllers;
use App\Config\ConnectionManager as ConnectionManager;
/**
 * Classe responsável por construir os controllers
 * 
 * @author Luiz Messias <tonyzrp@gmail.com>
 */
class Controller {
	/**
	 * @var \PDO conexão com o banco
	 */
	protected $conn;
	/**
	 * @var array data da requisição
	 */
	protected $data;
	/**
	 * Método fábrica de controllers
	 * 
	 * @param string $Controller nome do Controller
	 * 
	 * @return App\Controllers\Controller
	 */
	public static function factory( $Controller ) {
		$Controller = ucfirst(strtolower($Controller));
		$class = "App\\Controllers\\{$Controller}";
		
		return new $class;
	}

	/**
	 * Construtor dos controllers
	 * 
	 * aqui é instanciada a conexão com PDO
	 *  
	 */
	public function __construct() {
		$this->conn = ConnectionManager::connect();
	}
	/**
	 * método destrutor
	 * 
	 * aqui a conexão é encerrada
	 */
	public function __destruct() {
		ConnectionManager::destroy($this->conn);
	}
	/**
	 * método para exibir erros para os usuários
	 * 
	 * ATENCAO: esse método para a execução da aplicação e imprime o JSON de falha
	 * 
	 * @param string $text = '' texto que seguirá no JSON
	 */
	protected function fail( $text = '' ) {
		$result = array(
			'success' => false,
			'msg' => $text
		);

		echo json_encode($result); die();
	}
}