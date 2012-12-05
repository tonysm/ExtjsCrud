<?php
/**
 * arquivo da classe que gerencia a conexão com o banco
 * 
 * @since 2012-11-29
 */

namespace App\Config;
/**
 * Classe responsável pela conexão com o banco
 * 
 * @author Luiz Messias <tonyzrp@gmail.com>
 */
class ConnectionManager {
	/**
	 * Método responsável por criar a conexão com o banco
	 * 
	 * @return \PDO conexão do pdo
	 * 
	 * @link http://www.php.net/manual/en/pdo.connections.php documentação do PDO
	 */
	public static function connect() {
		$config = include __DIR__ . "/database.php";

		try {
			// cada driver tem um DSN diferente e deve ser implementado
			switch ( strtolower($config['driver']) ) {
				case 'mysql':
					$dsn = $config['driver'] . ":hostname=" . $config['host'] . ";dbname=" . $config['dbname'];
					return new \PDO($dsn, $config['username'], $config['password']);
					break;
				default:
					die('Driver não implementado na class \\App\\Config\\ConnectionManager::connect()');
					break;
			}
		} catch(PDOException $e) {
			die('Impossível conectar ao banco!');
		}
	}
	/**
	 * Método que encerra a conexão com o banco
	 * 
	 * @param \PDO $conn
	 * 
	 * @link http://www.php.net/manual/en/pdo.connections.php documentação do PDO
	 */
	public static function destroy($conn) {
		$conn = null;
	}
}