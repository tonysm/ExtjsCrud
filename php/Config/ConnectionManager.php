<?php
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
	 * @return PDO
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
	 * @param PDO $conn
	 */
	public static function destroy($conn) {
		$conn = null;
	}
}