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
						$ext = $row['type'];
					}
				}
				$image = array('jpeg','png');
				$titles = $title;
				$keys = explode(" ", $keywords);
				$keys = implode(",",$keys);
				$title = '<h4 id="h3heading"> The file was uploaded with Title '.$title.'</h4>';
				if(in_array($ext , $image)){
						$keys = '<h4 id="h3heading> Please enter some keywords for uploaded image </h4>"<br />
							 <h3 id="h3heading">Please Enter the keywords</h3>';
					}else{
				$keys = '<h4 id="h3heading"> Key words for the uploaded file are <span style="color:red">'.$keys.'</span></h4>	
				 <h3 id="h3heading">Please Enter extra keywords if needed</h3>';
					}

		}

?>
<?php
	if(isset($_POST['submit'])){
		 $sr_id = $_POST['srid'];
		 $keywords = $_POST['keywords'];
		
		if(empty($_POST['Ekey1']) && empty($_POST['Ekey2']) && empty($_POST['Ekey3'])){
				$error = '<p id="h3heading">Thank you for Uploading</p>
							<div id="SUlink">
							<a href="upload1.php"> Please Upload a new file </a>
       				 		</div><br/>
       				 		<br/>';
			}else{
				$nk1 = $_POST['Ekey1'];
				$nk2 = $_POST['Ekey2'];
				$nk3 = $_POST['Ekey3'];
			
				if($nk1 == $nk2 || $nk1 == $nk3 || $nk2 == $nk3){
					$error = '<p class="error">Please Enter keys which are different';	
				}else{
					$newkeys = $nk1 ." " . $nk2 . " " . $nk3;
					$newkeys = $keywords . " " . $newkeys;
					$sql = mysql_query("update `search` set `keywords` = '$newkeys' where `sr_id` = '$sr_id' ") or die(mysql_error());
					$error = '<p id="h3heading">Keywords updated! Thank you for Uploading</p>
							<div id="SUlink">
							<a href="upload1.php"> Please Upload a new file </a>
       				 		</div><br/>
       				 		<br/><br />';
				}
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
           
            
            <form action="conform1.php" method="post" name="Conform">
            	<div class="field">
                <label for="Ekey1">Keyword1:</label>
            	<input name="Ekey1" id="Ekey1" type="text" maxlength="50" />
                <p class="hint">Please Enter a keyword which is already present. please refer above for the present keywordds</p>
				
                </div>
                <div class=" field">
                <label for="Ekey2">Keyword2:</label>
            	<input name="Ekey2" id="Ekey2" type="text" maxlength="50" />
                 <p class="hint">Please Enter a keyword which is already present. please refer above for the present keywordds</p>
                </div>
                <div class="field">
                <label for="Ekey3">Keyword3:</label>
            	<input name="Ekey3" id="Ekey3" type="text" maxlength="50" />
 <p class="hint">Please Enter a keyword which is already present. please refer above for the present keywordds</p>
                </div>
                <input name="keywords" id="keywords" type="hidden" value="<?php echo $keywords; ?> " />
                <input name="srid" id="srid" type="hidden" value="<?php echo $sr_id; ?>" />
                
                <input name="submit" type="submit" value="submit" class="buttons" />
            </form>
            
          </div>
<?php include_once("includes/template_pageBottom.php"); ?>
</body>
</html>