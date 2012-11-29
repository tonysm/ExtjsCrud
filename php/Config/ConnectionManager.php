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

		$dsn = $config['driver'] . ":hostname=" . $config['host'] . ";dbname=" . $config['dbname'];

		try {
			return new \PDO($dsn, $config['username'], $config['password']);
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