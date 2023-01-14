<?php

require_once 'DB.php';

abstract class Crud_Perg extends DB{

	protected $table;

	abstract public function insert();
	abstract public function update($id_perg);

	public function find($id_perg){
		$sql  = "SELECT * FROM $this->table WHERE id_perg = :id_perg";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id_perg', $id_perg, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function findAll(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function delete($id_perg){
		$sql  = "DELETE FROM $this->table WHERE id_perg = :id_perg";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id_perg', $id_perg, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}