<?php
// PDO connect *********SELECT * FROM users WHERE username LIKE (:keyword) ORDER BY username ASC LIMIT 0, 10
include 'database_pdo.php';

$pdo = connect();
$keyword = '%'.$_POST['entire_query'].'%';
$parameter = $_POST['parameter'];

	
	$sql = "SELECT alias_name from autocomplete_custom_query WHERE alias_name LIKE (:keyword) ORDER BY alias_name ASC limit 0, 10";
	
	if($parameter == 'andor')
	{
		
		echo "<div class='card col-md-12'>";
		$list = array("and","or");
		foreach ($list as $rs) {
			// put in bold the written text
			$user_name = str_replace($_POST['entire_query'], '<b>'.$_POST['entire_query'].'</b>', $rs);
			// add new option
			//echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs).'\')">'.$user_name.'</li>';
			echo "<div class='listbox' >";
			echo '<div onclick="set_item(\''.str_replace("'", "\'", $rs).'\')">'.$user_name.'</div>';
			echo "</div>";
					
		}
		echo "<br></div>";
	}
	else if($parameter == 'operator')
	{
		
		$list = array("=", "<=", ">=", "<", ">");
		echo "<div class='card col-md-12'>";
		foreach ($list as $rs) {
			// put in bold the written text
			$user_name = str_replace($_POST['entire_query'], '<b>'.$_POST['entire_query'].'</b>', $rs);
			// add new option
			//echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs).'\')">'.$user_name.'</li>';
			echo "<div class='col-md-12 listbox' style='margin:5px'>";
			echo '<div onclick="set_item(\''.str_replace("'", "\'", $rs).'\')">'.$user_name.'</div>';
			echo "</div>";
					
		}
		echo "<br></div>";
	}
	else
	{
		$query = $pdo->prepare($sql);
		$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
		$query->execute();
		$list = $query->fetchAll();	
		echo "<div class='card col-md-12'>";
		foreach ($list as $rs) {
			// put in bold the written text
			$user_name = str_replace($_POST['entire_query'], '<b>'.$_POST['entire_query'].'</b>', $rs['alias_name']);
			// add new option
			//echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['alias_name']).'\')">'.$user_name.'</li>';
			echo "<div class='col-md-12 listbox' style='margin:5px'>";
			echo '<div onclick="set_item(\''.str_replace("'", "\'", $rs['alias_name']).'\')">'.$user_name.'</div>';
			echo "</div>";
					
		}
		echo "<br></div>";
	}
	
	


?>