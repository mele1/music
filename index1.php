<?php



//search 
mysql_connect("localhost", "root", '') or die (mysqli_error());
mysql_select_db("music") or die ("could not find database");
$output = '';

//collect	
	if(isset($_POST['search'])) {
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query = mysql_query("SELECT * FROM song WHERE artist LIKE '%$searchq%'") or die("could not search!");
		$count = mysql_num_rows($query);
		if($count == 0) {
			$output = '"Sorry, Artist not found!"';
		}else{
			while ($row = mysql_fetch_array($query)) {
				$artist = $row['artist'];
				$id = $row['song_id'];
				
				$output .= '<div> <a href="about.php"> '.$artist. '</a></div>';
				
			
			}			
		}		
	}

	
	?>
<!DOCTYPE html>
<html>

<head>
		<title>Music World
        </title>
<link href="music.css" rel="stylesheet" type="text/css" media="screen">
        <link href="music.css" rel="stylesheet" type="text/css" media="print">
</head>
<body>
<div id="outter">
	<div id="container">

<div id="apDiv1"><img src="music4.jpg" width="900" height="150" alt="music Logo" /></div>

 
<h1>WELCOME TO "MUSIC WORLD"........</h1>
 <div class="header">
  <div id="h-navbar"><?php include "header.php"; ?></div>
</div>
 <div id="apDiv1"><img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /><img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
 <img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
</div>
<br>
<?php
//connection to database
	include 'connection.php';
//Display heading

		echo '<h1><b>Todays Music!</b></h1>';
		//run query to select all records from service table
		//store the result of the query in a variable
		$query="SELECT * FROM song";
		if (isset($_GET['sort'])){
			$query=$query." ORDER BY ".$_GET['sort'];
			//echo $query;
		}
//displaying the data stored in the service table.
		$result = mysqli_query($connection, $query) or die(mysqli_error());
		echo '<table border="2"><tr><th><a href="index.php?sort=song_id">Song ID</a></th><th><a href="index.php?sort=song_title">Song Title</a></th><th><a href="index.php?sort=artist">Artist</a></th><th><a href="index.php?sort=genre">Genre</a></th>
<th><a href="index.php?sort=year_of_release">Year Released</a></th>';
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>' . $row['song_id'] . '</td>';
			echo '<td>' . $row['song_title'] . '</td>';
			echo '<td>' . $row['artist'] . '</td>';
			echo '<td>' . $row['genre'] . '</td>';

echo '<td>' . $row['year_of_release'] . '</td>';
			echo '</tr>';
		}
		echo '</table>';

		
	?>

        	<h1>Search by Artist Name</h1>
				<form align="left"  method="post" action="index.php">  
					<input  type="text" name="search" placeholder="Search here"> 
					<button type="submit" name="submit" value="Search">Search</button>
				</form> 
						<div align="left">
				</br><?php print ("$output"); ?> 
					
 <div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Musicworld.com 2016. All rights reserved.</center>
            </div>
</div>


</div>
</div>
</body>
</html>
