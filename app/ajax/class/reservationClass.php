<?php
  include_once('config.php');
  
  class Reservation
  {
    
    private $_db;
    
    public function __construct()
    {
      $this->_db = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      if ($this->_db->connect_errno) 
      {
          echo "Failed to connect to MySQL: (" . $this->_db->connect_errno . ") " . $this->_db->connect_error;
          die();
      }
    }
    
    /*  */
    public function __destruct()
    {
      $this->_db->close();
    }
    
    /* */
    public function createReservation($p_operation, $p_data) 
    {
      //error_log('In createReservation function.');
      
      $return_data = array();
      
      if(empty($p_data) && !is_array($p_data))
      {   
         $return_data['status'] = 'E';
         $return_data['message'] = 'Input can not be empty and should be array.';
         return $return_data;
      }
      
      if($p_operation == 'CREATE')
      {
         $statement = $this->_db->prepare("INSERT INTO reservations(r_date, r_time, r_num_of_people, r_person_name, r_status) VALUES(?, ?, ?, ?, ?)");//r_city,?
         $statement->bind_param('sssss', $p_data['r_date'], $p_data['r_time'], $p_data['r_num_of_people'], $p_data['r_person_name'], $p_data['r_status']);//$p_data['r_city'],
         $statement->execute();
         //error_log('Insert successful');
         
         $return_data['status'] = 'S';
         $return_data['message'] = 'Tu cita ha sido agendada con el folio: <b>' . $this->_db->insert_id . '</b>. Guarda este numero pero futuras aclaraciones';
         
         $statement->close();
      }
      else if($p_operation == 'UPDATE')
      {
         $statement = $this->_db->prepare("UPDATE reservations SET r_date = '" . $p_data['r_date'] . "', r_time = '" . $p_data['r_time'] . "', r_status = '" . $p_data['r_status'] . "' WHERE id = ?" );
         $statement->bind_param('s', $p_data['id']);
         $statement->execute();
         
         $return_data['status'] = 'S';
         $return_data['message'] = 'Update successful';
         
         $statement->close();
         //error_log('Update successful');
      }
      
      return $return_data;
    }
    
    /* */
    public function getReservation($p_id) 
    {
      $statement = $this->_db->prepare("SELECT id, r_date, r_time, r_num_of_people, r_person_name, r_status FROM reservations WHERE id = ?");// r_city,
      $statement->bind_param('i', $p_id);
      $statement->execute();
      $statement->bind_result($id, $r_date, $r_time, $r_num_of_people, $r_person_name, $r_status);// $r_city,
      $statement->fetch();
      $statement->close();
      
      //error_log('Got from DB session_id=' . $session_id . ' and session_json_data=' . $session_json_data);
      
      $return_array = array();
      
      if(!empty($id))
      {
         $return_array['id'] = $id;
         $return_array['r_date'] = $r_date;
         $return_array['r_time'] = $r_time;
         $return_array['r_num_of_people'] = $r_num_of_people;
         //$return_array['r_city'] = $r_city;
         $return_array['r_person_name'] = $r_person_name;
         $return_array['r_status'] = $r_status;
      }
      
      return $return_array;
    }
  }
?>