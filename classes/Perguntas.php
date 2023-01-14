<?php

require_once 'Crud_Perg.php';

class Perguntas extends Crud_Perg{
	
	protected $table = 'perguntas';
	private $questao;
	private $alternativa1;
	private $alternativa2;
	private $alternativa3;
	private $alternativa4;
	private $correta;

	public function setQuestao($questao){
		$this->questao = $questao;
	}

	public function getQuestao(){
		return $this->questao;
	}

	public function setAlternativa1($alternativa1){
		$this->alternativa1 = $alternativa1;
	}

	public function getAlternativa1(){
		return $this->alternativa1;
	}
	public function setAlternativa2($alternativa2){
		$this->alternativa2 = $alternativa2;
	}

	public function getAlternativa2(){
		return $this->alternativa2;
	}
	public function setAlternativa3($alternativa3){
		$this->alternativa3 = $alternativa3;
	}

	public function getAlternativa3(){
		return $this->alternativa3;
	}
	public function setAlternativa4($alternativa4){
		$this->alternativa4 = $alternativa4;
	}

	public function getAlternativa4(){
		return $this->alternativa4;
	}
	public function setCorreta($correta){
		$this->correta = $correta;
	}

	public function getCorreta(){
		return $this->correta;
	}
	

	public function insert(){

		$sql  = "INSERT INTO $this->table (questao, alternativa1, alternativa2, alternativa3, alternativa4, correta) VALUES (:questao, :alternativa1, :alternativa2, :alternativa3, :alternativa4, :correta)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':questao', $this->questao);
		$stmt->bindParam(':alternativa1', $this->alternativa1);
		$stmt->bindParam(':alternativa2', $this->alternativa2);
		$stmt->bindParam(':alternativa3', $this->alternativa3);
		$stmt->bindParam(':alternativa4', $this->alternativa4);
		$stmt->bindParam(':correta', $this->correta);
		return $stmt->execute(); 

	}

	public function update($id_perg){

		$sql  = "UPDATE $this->table SET questao = :questao, alternativa1 = :alternativa1, alternativa2 = :alternativa2, alternativa3 = :alternativa3, alternativa4 = :alternativa4, correta = :correta WHERE id_perg = :id_perg";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':questao', $this->questao);
		$stmt->bindParam(':alternativa1', $this->alternativa1);
		$stmt->bindParam(':alternativa2', $this->alternativa2);
		$stmt->bindParam(':alternativa3', $this->alternativa3);
		$stmt->bindParam(':alternativa4', $this->alternativa4);
		$stmt->bindParam(':correta', $this->correta);
		$stmt->bindParam(':id_perg', $id_perg);
		return $stmt->execute();

	}

}