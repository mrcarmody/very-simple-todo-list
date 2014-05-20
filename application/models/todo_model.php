<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todo_model extends CI_Model {

    // todo properties
    var $text   = '';
    var $dateCreated   = '';
    var $dateCompleted   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // create a todo item
    function create_todo($text)
    {
        // set the properties 
        $this->text = $text; 
        $this->dateCreated = time();

        // create an entry in the db
        $this->db->insert('todos', $this);

        // return the new todo item id
        return $this->db->insert_id();
    }
    
    // returns a todo object given an id
    function get_todo($id)
    {
        // check for valid id
        if (!is_numeric($id)){
            return;
        }

        // create and run the query
        $query = $this->db->get_where('todos',array('id'=>$id));
        $result = $query->result();
        // if we get back a result, return it (there will only be one object/row)
        if (count($result)){
            return $result[0];
        }
    }    

    // get all the todo items
    function get_todos()
    {
        $query = $this->db->get('todos');
        return $query->result();
    }

    // update a todo item's text
    function update_todo($id,$text)
    {
        // check for valid id
        if (!is_numeric($id)){
            return;
        }

        // set the properties
        $this->text = $text;
        // make the update
        $this->db->update('todos', $this, array('id' => $id));
    }

    // completes a todo item
    function complete_todo($id)
    {
        // check for valid id
        if (!is_numeric($id)){
            return;
        }
        // get the todo item (so we have the the other object properties)
        $todo = $this->get_todo($id);

        // get the time
        $todo->dateCompleted = time();

        // set the date completed property in the db
        $this->db->update('todos', $todo, array('id' => $id));
    }

    // removes a todo item
    function remove_todo($id)
    {
        // check for valid id
        if (!is_numeric($id)){
            return;
        }
        // delete the item
        $this->db->delete('todos', array('id' => $id));
    }

}