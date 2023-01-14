<?php

require_once 'Crud_Disc.php';

class Disciplinas extends Crud_Disc{
	
	protected $table = 'disciplinas';
	private $nome_disc;

	public function setNome_disc($nome_disc){
		$this->nome_disc = $nome_disc;
	}

	public function getNome_disc(){
		return $this->nome_disc;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome_disc) VALUES (:nome_disc)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome_disc', $this->nome_disc);
		return $stmt->execute(); 

	}

	public function update($id_disc){

		$sql  = "UPDATE $this->table SET nome_disc = :nome_disc WHERE id_disc = :id_disc";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome_disc', $this->nome_disc);
		$stmt->bindParam(':id_disc', $id_disc);
		return $stmt->execute();

	}

}