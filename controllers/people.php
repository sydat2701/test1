<?php 
class People extends Controller{
	public function __construct(){
		$this->peopleModel = $this -> model('PeopleModel');
	}

	public function index(){
		$data = $this-> peopleModel-> getPeople();
		$this->view('pages/people/index',$data);
	}

	public function add(){
		if($SERVER['REQUEST_METHOD']=='POST'){
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data= [
				
				'name' => $_POST['name'],
				'nickname' => $_POST['nickname'],
				'birth_day' => $_POST['birth_day'],
				'native_place' => $_POST['native_place'],
				'sex' => $_POST['sex'],
				'ethnic' => $_POST['ethnic'],
				'id_card_no' => $_POST['id_card_no'],
				'job' => $_POST['job'],
				'job_place' => $_POST['job_place'],
				'household_id' => $_POST['household_id'],
				'householder_relationship' => $_POST['householder_relationship'],
				'since' => $_POST['since'],
				'last_update' => $_POST['last_update']

			];
			if($this->peopleModel ->addPost($data)){
				redirect('people');
			}else{
				die('something went wrong');
			}
		}else{
            $data = [
                'title' => '',
                'body'  => ''
            ];
            $this->view('pages/people/add', $data);
        }
		
	}


	public function edit($id){
		 if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data= [
				'id' => (int) $id,
				'name' => $_POST['name'],
				'nickname' => $_POST['nickname'],
				'birth_day' => $_POST['birth_day'],
				'native_place' => $_POST['native_place'],
				'sex' => $_POST['sex'],
				'ethnic' => $_POST['ethnic'],
				'id_card_no' => $_POST['id_card_no'],
				'job' => $_POST['job'],
				'job_place' => $_POST['job_place'],
				'household_id' => $_POST['household_id'],
				'householder_relationship' => $_POST['householder_relationship'],
				'since' => $_POST['since'],
				'last_update' => $_POST['last_update']

			];

			if($this->peopleModel->updatePost($data)){
				redirect('people');
			}else{
				die('Something went wrong');
			}
		}else{
            $people = $this->peopleModel->getById($id);
            $this->view('pages/people/edit', $people);
        }     
         }
	

	public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->peopleModel->delete($id)){
                redirect('people');
            }else{
                die('Something went wrong');
            }

        }
    }

}
 ?>