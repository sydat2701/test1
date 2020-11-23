<?php 
	class PeopleModel{
		private $db;
		public function construct(){
			$this->db= new Database;

		}

		public function getPeople(){
			$this->db->query(
				"SELECT * FROM People"
			);
			return $results = $this->db->resultSet();
		}


		public function addPost($data){
		$this->db->query('
			INSERT INTO People(name, nickname, birth_day, native_place,sex, ethnic, id_card_no,job,
			job_place,household_id, householder_relationship,since, last_update) VALUES (:name,:nickname, :birth_day,:native_place, :sex, :ethnic, :id_card_no, :job, :job_place, :household_id,:householder_relationship, :since,:last_update)
			');

		$this->db->bind(':name', $data['name']);
		$this->db->bind(':nickname', $data['nickname']);
		$this->db->bind(':birth_day', $data['birth_day']);
		$this->db->bind(':native_place', $data['native_place']);
		$this->db->bind(':sex', $data['sex']);
		$this->db->bind(':ethnic', $data['ethnic']);
		$this->db->bind(':id_card_no', $data['id_card_no']);
		$this->db->bind(':job', $data['job']);
		$this->db->bind(':job_place', $data['job_place']);
		$this->db->bind(':household_id', $data['household_id']);
		$this->db->bind(':householder_relationship', $data['householder_relationship']);
		$this->db->bind(':since', time());
		$this->db->bind(':last_update', time());
		if($this->db->execute())
			return true;
		else
			return false;

	}


	public function updatePost($data){
		$this->db->query('UPDATE People SET name=:name, birth_day=:birth_day, native_place=:native_place, sex=:sex, ethnic=:ethnic,
			id_card_no=:id_card_no, job=: job, job_place=:job_place, household_id=:household_id, householder_relationship=: householder_relationship,since=:since, last_update=:last_update WHERE id=:id');

		$this->db->bind(':id', $data['id']);
		$this->db->bind(':name', $data['name']);
		$this->db->bind(':nickname', $data['nickname']);
		$this->db->bind(':birth_day', $data['birth_day']);
		$this->db->bind(':native_place', $data['native_place']);
		$this->db->bind(':sex', $data['sex']);
		$this->db->bind(':ethnic', $data['ethnic']);
		$this->db->bind(':id_card_no', $data['id_card_no']);
		$this->db->bind(':job', $data['job']);
		$this->db->bind(':job_place', $data['job_place']);
		$this->db->bind(':household_id', $data['household_id']);
		$this->db->bind(':householder_relationship', $data['householder_relationship']);
		$this->db->bind(':since', time());
		$this->db->bind(':last_update', time());

		if($this->db->execute())
			return true;
		else 
			return false;


	}

	public function getById($id){
		$this->db->query('SELECT * FROM People WHERE id=:id');
		$this->db->bind(':id', $id);
		$row = $this->db->single();
		return $row;
	}

	public function delete($id){
            $this->db->query('DELETE FROM People WHERE id = :id');
            $this->db->bind(':id', $id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

}	

	

 ?>