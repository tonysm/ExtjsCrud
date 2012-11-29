<?php
namespace App\Controllers;
use App\Config\ConnectionManager as ConnectionManager;
/**
 * Classe responsável por construir os controllers
 * 
 * @author Luiz Messias <tonyzrp@gmail.com>
 */
class Controller {
	/**
	 * @var PDO
	 */
	protected $conn;
	/**
	 * @var array
	 */
	protected $data;
	/**
	 * Método fábrica de controllers
	 * 
	 * @param string $Controller nome do Controller
	 * 
	 * @return Controller
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

	protected function fail( $text = '' ) {
		$result = array(
			'success' => false,
			'msg' => $text
		);

		echo json_encode($result); die();
	}
}