<?php
	require('includes/connect.php');
	if(isset($_GET['id'])){
		$sr_id = $_GET['id'];
		$result = mysql_query("SELECT * FROM  `search` WHERE  `sr_id` = '$sr_id' ") or die (mysql_error());
				if (mysql_num_rows($result)==1){
					while($row = mysql_fetch_array($result)){
						$keywords = $row['keywords'];
						$newdest = $row['link'];
						$title = $row['title'];
					}
				}
				$keys = explode(" ", $keywords);
				$keys = implode(",",$keys);
				$title = '<h4 id="h3heading"> The file was uploaded with Title '.$title.'</h4>';
				$keys = '<h4 id="h3heading"> Key words for the uploaded file are <span style="color:red">'.$keys.'</span></h4>	';
				

		}

?>
<?php
	if(isset($_POST['submit'])){
		$error = "";
		$nk1 = $_POST['extkey1'];
		echo "$nk1";
		if(empty($_POST['extkey1']) && empty($_POST['extkey2']) && empty($_POST['extkey3'])){
				$error = '<p id="h3heading">Thank you for Uploading</p>
							<div id="SUlink">
							<a href="upload1.php"> Please Upload a new file </a>
       				 		</div><br/>
       				 		<br/>';
			}else{
				echo "Pisdsada";
			}
			
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Engine</title>
<link rel="stylesheet" href="includes/style.css">
</head>

<body>
	<?php include_once("includes/template_pageTop.php"); ?>
		<div id="pageMiddle">
			<?php if(isset($_POST['submit'])){echo "";} else{echo $title;} ?>
			<?php if(isset($_POST['submit'])){echo "";} else{ echo $keys;} ?> 
			<?php if(!isset($_POST['submit'])){echo "";} else{ echo $error;} ?> 
			<h3 id="h3heading">Please Enter extra keywords if needed</h3>
			<form method="post" action="conform.php" name="conformform">
				<div class="field">
					<label for="extkey1" id="extkey">keyword 1:</label>
					<input type="text" name"extkey1" id="extkey1" />
					<p class="hint">Please Enter a keyword which is already present. please refer above for the present keywordds</p>
				</div>
				<div class="field">
					<label for="extkey2" id="extkey">keyword 2:</label>
					<input type="text" name"extkey2" id="extkey2" />
					<p class="hint">Please Enter a keyword which is already present. please refer above for the present keywordds</p>
				</div>
				<div class="field">
					<label for="extkey3" id="extkey">keyword 3:</label>
					<input type="text" name"extkey3" id="extkey3" />
					<p class="hint">Please Enter a keyword which is already present. please refer above for the present keywordds</p>
				</div>
				
				<input type="submit" name="submit" value="submit" id="submit" class="buttons" />
			</form>
		
        <h3>

	</div>

		</div>
	<?php include_once("includes/template_pageBottom.php"); ?>
</body>
</html>