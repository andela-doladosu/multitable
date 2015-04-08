<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multi Table</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>

<body>

<form action="" method="post">
<span class="text">Vertical range</span>
<table>
<tr>
    <td><span class="text">From:</span>
    </td>
    <td><input type="number" name="vertical_start" value="">
    </td>
    <td><span class="text">To:</span>
    </td>
    <td><input type="number" name="vertical_stop" value="">
    </td>
</tr>
</table>
<span class="text">Horizontal range</span>
<table>
<tr>
    <td><span class="text">From:</span>
    </td>
    <td><input type="number" name="horizontal_start" value="">
    </td>
    <td><span class="text">To:</span>
    </td>
    <td><input type="number" name="horizontal_stop" value="">
    </td>
</tr>
</table>
<input type="submit" value="Create table" name="make_table">
</form>

<br/>


<?php







	if (isset($_POST['make_table'])){
		$v_start = $_SESSION['v_start'] = $_POST['vertical_start']; //get user input
		$v_stop = $_SESSION['v_stop'] = $_POST['vertical_stop']; //
		
		$h_start= $_SESSION['h_start'] = $_POST['horizontal_start'];//
		$h_stop = $_SESSION['h_stop'] = $_POST['horizontal_stop']; //... user input
		
		
		if ($_POST['vertical_start']>$_POST['vertical_stop']){ // invert start and stop if stop < start
		
				$v_stop=$_POST['vertical_start'];
				$v_start=$_POST['vertical_stop'];
		}
		if ($_POST['horizontal_start']>$_POST['horizontal_stop']){ // invert start and stop if stop < start
		
			$h_stop=$_POST['horizontal_start'];
			$h_start=$_POST['horizontal_stop'];
		}
		
	
		echo '<table cellspacing="0" border="1"  cellpadding="15">'."\n";	
		echo "</tr> <th> * </th>";
		 
		for($h_count = $h_start; $h_count <= $h_stop; $h_count++){ //loop through the specified no. of columns
		
			echo '<th>'.$h_count.'</th>'; //display number for each column
		}	
		echo "</tr>\n";
		
		for($v_count = $v_start ; $v_count <= $v_stop ; $v_count++){ //loop through the specified no. of rows
			
			echo"<tr>\n" ;		
			echo"<th>\n" ;		
			echo $v_count ;	//display number for each row	
			echo"</th>\n" ;		
			for($h_count = $h_start ; $h_count <= $h_stop ; $h_count++){
				if($v_count == $h_count){//checks for perfect squares
				
					echo '<td><span class="square_number" title="'.$v_count.'x'.$h_count.'">'."\n" ;			
					echo $v_count * $h_count ; //multiply current row by current column
					echo "</span></td>\n" ;
				}else{
					echo '<td title="'.$v_count.'x'.$h_count.'">' ;			
					echo $v_count * $h_count ; //multiply current row by current column
					echo "</td>\n" ;
				}
			}		
			echo "</tr> \n" ;
		}
		echo "</table> \n";
	}



//session_destroy();

?>





	
</body>
</html>