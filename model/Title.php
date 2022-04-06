<?php
class Title
{
  static function GetTitle()
  {
    $path = $_SERVER['PHP_SELF']; // $path = /home/httpd/html/index.php
	$file = basename ($path);
	switch ($file)
	{
		case $file == 'accueil.php':$title = 'Tableau de bord';
		break;
		case $file == 'profil.php':$title = 'Profil';
		break;
		case $file == 'stock.php':$title = 'Stock';
		break;
		case $file == 'elearning.php':$title = 'E-Learning';
		break;
		case $file == 'vendeurs.php':$title = 'Vendeurs';
		break;
		case $file == 'ventes.php':$title = 'Ventes';
		break;
		case $file == 'mention.php':$title = 'Mentions Légales';
		break;
	}
	return $title; 
  }
}