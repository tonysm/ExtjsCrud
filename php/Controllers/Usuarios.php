<?php
namespace App\Controllers;
use App\Domain\Usuario as Usuario;
/**
 * Class Usuarios Controller
 * 
 * responsável por gerenciar as requisições referentes aos usuários
 * 
 * @author Luiz Messias <tonyzrp@gmail.com>
 */
class Usuarios extends Controller {
	/**
	 * action listAll
	 * 
	 * lista todos os usuários
	 * 
	 */
	public function listAll() {
		$sql = "SELECT * FROM usuarios";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
	
		$result = $stmt->fetchAll();
		$usuarios = array();

		// não consegui fazer o fetchObject para todos
		foreach($result as $r) {
			$usuarios[] = new Usuario($r);
		}

		$this->jsonEncode($usuarios);
	}

	public function create(array $data = null) {
		$sql = "INSERT INTO usuarios (nome, email) VALUES ";
		$dataLen = count($data);

		foreach($data as $d) {
			$sql .= " (?, ?)";
			if(end($data) !== $d) {
				$sql .= ",";
			}
		}

		$stmt = $this->conn->prepare($sql);

		foreach($data as $key => $usr) {
			$stmt->bindParam($key * 2 + 1, $usr->nome);
			$stmt->bindParam($key * 2 + 2, $usr->email);
		}

		if(!$stmt->execute()) {
			$this->fail("Erro ao tentar inserir os usuários");
		}

		$this->jsonEncode();
	}

	public function update(array $data = null) {
		$sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
		$usr = $data[0];

		$stmt = $this->conn->prepare($sql);

		$stmt->bindParam(':nome', $usr->nome);
		$stmt->bindParam(':email', $usr->email);
		$stmt->bindParam(':id', $usr->id);

		if(!$stmt->execute())
			$this->fail('Erro ao atualizar este usuário');

		$this->jsonEncode();
	}

	/**
	 * método que faz o parse de objetos usuário para responsta em JSON
	 * 
	 * @param array $usuarios = null
	 */
	private function jsonEncode(array $usuarios = null) {
		$result = array('success' => true);
		
		if(!is_null($usuarios)) {
			foreach($usuarios as $usr) {
				$result['data'][] = $usr->toXml();
			}
		}

		echo json_encode($result); exit;
	}

}