<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for home controller.
	 *
	 */
	public function index()
	{
		// - load the todo model
		$this->load->model('Todo_model');

		// request the todo items
		$todos = $this->Todo_model->get_todos();

		// make the todo objects avalible for the view
		$view_data = array(
				'todos' => $todos
			);
		// load the list view
		$this->load->view('list',$view_data);
	}

	/**
	 * Create Page for home controller.
	 * - if this is a POST request, this will create
	 *   a new todo item and redirect the user back to the list page
	 *
	 * - Otherwise, displays the 'new todo item' input
	 *
	 */
	public function create()
	{
		// helpers
		$this->load->helper('url');

		// get the post data (if any)
		$todo_text = $this->input->post('todo_text');

		// check if we got post data
		if ($todo_text){
			// if so, make a new todo item in the db
			// - load the todo model
			$this->load->model('Todo_model');
			// - make the create request
			$todo_id = $this->Todo_model->create_todo($todo_text);

			// check that we got back a valid id
			if (is_numeric($todo_id) && $todo_id > 0){
				// if so, redirect to the list page
				redirect('home');
			} else {
				// otherwise, display an error
				echo "There was a problem.  Please go back and try again.";
			}

		} else {
			// otherwise load the create view
			$this->load->view('create');
		}
	}


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */