<?php 
	include('includes/connect.php');
	if(isset($_GET['Keywords'])){
		
			$keys = $_GET['Keywords'];
			$terms = explode(" ", $keys);
			$query = "SELECT * from `search` WHERE ";
			$counter = 0;
			$dyn_table = "";
			foreach($terms as $each){
				$counter++;
				if($counter==1){
					$query .="`keywords` like '%$each%'";
				}else{
					$query .= "OR `keywords` like '%$each%'"; 
				}
				
				$sql = mysql_query($query) or die(mysql_error());
				$numrows = mysql_num_rows($sql);
				
				if($numrows > 0 ){
					while($row = mysql_fetch_array($sql)){
						$title = $row['title'];
						$description = $row['description'];
						$type = $row['type'];
						$newdest = $row['link'];
						$keywords = $row['keywords'];
						
						$dyn_table .= '<table width="75%" border="0" cellspacing="2" cellpadding="2">
  										  <tr>
											<td rowspan="2" style="color:#900"  >'.$type.'</td>
											<td><a href="'.$newdest.'" style="color=#00C" align="center	">'.$title.'</a></td>
										  </tr>
										  <tr>
											<td style="color:#0FC" align="left">'.$description.'/td>
										  </tr>
										</table>
										<br />
										<hr />';
					
					}
					
					
				}else{
					$dyn_table = '<p class="error">Sorry No results Found</p>';	
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

<?php include_once("includes/template_pageTop.php"); ?>
		<div id="pageMiddle">
        <br />
      
        <div id="Searchs">
		  <form id="form1" name="form1" method="get" action=""  >
		    <input type="text"  name="Keywords" size="100" value="<?php echo $_GET['Keywords']?>" />
            <input type="submit"  value="Search" class="buttons"  />
		  </form>
          <hr />
          <h3 id="h3heading" align="left">Showing results for <?php echo $_GET['Keywords'] ?></h3>
         </div>
    		<?php echo $dyn_table; ?>
			

		</div>
	<?php include_once("includes/template_pageBottom.php"); ?>
</body>
</html>