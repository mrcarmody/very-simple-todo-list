<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tests extends CI_Controller {

	/**
	 * Test Controller
	 * Runs unit tests
	 */
	public function index()
	{
		// load the testing and other libraries
		$this->load->library('unit_test');
		// load the todo model
		$this->load->model('Todo_model');

		// -- test CREATE a todo item
		$test_name = 'Create Todo test';
		$original_todo_text = 'Test Todo item';
		$todo_id = $this->Todo_model->create_todo($original_todo_text);
		// it should return a positive number for the id
		echo $this->unit->run($todo_id, 'is_numeric', $test_name.' - is id numeric');
		echo $this->unit->run($todo_id > 0, TRUE, $test_name.' - is id greater than 0');

		// -- test GET a todo item
		$test_name = 'Get Todo item test';
		$todo = $this->Todo_model->get_todo($todo_id);
		// it should have the correct text property
		echo $this->unit->run($todo->text == $original_todo_text, TRUE, $test_name.' - text');
		// it should have the dateCreated property
		$todo_date_created = $todo->dateCreated; 
		echo $this->unit->run($todo_date_created > 0, TRUE, $test_name.' - date created');
		// the dateCompleted property should be set to 0
		echo $this->unit->run($todo->dateCompleted == 0, TRUE, $test_name.' - date completed');

		// -- test UPDATE a todo item
		$test_name = 'Update Todo test';
		$new_todo_text = 'Updated Test Todo item';
	
		$this->Todo_model->update_todo($todo_id,$new_todo_text);
		$todo = $this->Todo_model->get_todo($todo_id);
		// it should have the new text
		echo $this->unit->run($todo->text == $new_todo_text, TRUE, $test_name);

		// -- test COMPLETE a todo item
		$test_name = 'Complete Todo test';
	
		$this->Todo_model->complete_todo($todo_id);
		$todo = $this->Todo_model->get_todo($todo_id);
		// it should have a valid dateComplete timestamp
		echo $this->unit->run($todo->dateCompleted > 0, TRUE, $test_name);
		// the other properties should not have been altered
		echo $this->unit->run($todo->text == $new_todo_text, TRUE, $test_name.' - text not altered');
		echo $this->unit->run($todo->dateCreated == $todo_date_created, TRUE, $test_name.' - dateCreated not altered');

		// -- test GET ALL todo items
		$test_name = 'Get All Todo items test';

		// create a second todo item for this test
		$second_todo_text = 'Second Test Todo item';
		$second_todo_id = $this->Todo_model->create_todo($second_todo_text);

		// make the request for all the todo items
		$todos = $this->Todo_model->get_todos();
		// it should have returned an array with more than one todo object
		echo $this->unit->run(count($todos) > 1, TRUE, $test_name);
		

		// -- test REMOVE a todo item
		$test_name = 'Remove Todo test';
	
		$this->Todo_model->remove_todo($todo_id);
		$todo = $this->Todo_model->get_todo($todo_id);
		// it should not have returned anything
		echo $this->unit->run($todo, FALSE, $test_name);

		// -- CLEAN UP
		$this->Todo_model->remove_todo($second_todo_id);
	}
}

/* End of file tests.php */
/* Location: ./application/controllers/tests.php */