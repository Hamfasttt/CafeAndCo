<?php
    require_once('AllUsers.php');

class OneUser
{

  static function GetOneUser(int id_salarie)
  {
  $users = AllUsers::GetAllUsers();
	if $_SESSION['id_salarie'] = $users('id_salarie')
  {
    $user = $users('id_salarie')
  }
	
	return $user; 
  }
}