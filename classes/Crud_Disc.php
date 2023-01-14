<?php

require_once 'DB.php';

abstract class Crud_Disc extends DB{

	protected $table;

	abstract public function insert();
	abstract public function update($id_disc);

	public function find($id_disc){
		$sql  = "SELECT * FROM $this->table WHERE id_disc = :id_disc";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id_disc', $id_disc, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function findAll(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function delete($id_disc){
		$sql  = "DELETE FROM $this->table WHERE id_disc = :id_disc";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id_disc', $id_disc, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}