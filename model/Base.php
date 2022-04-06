<?php
class Base
{
  static public function GetConnexion()
  {
      $connexion="mysql:host=localhost;dbname=cafeandco";
      $user="root";
      $pwd=""; 
      $pdo = new PDO($connexion,$user,$pwd);
      return $pdo;
  }
}