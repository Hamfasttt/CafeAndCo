<?php
    require_once('Base.php');

class AllUsers
{

  static function GetAllUsers()
  {
  $pdo = Base::GetConnexion();
	$query = "SELECT * FROM salarie";
  $answers = $pdo->prepare($query);
  $answers->execute();
	$users = $answers->fetch();
	
	return $users; 
  }
}