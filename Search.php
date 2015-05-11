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
        <h3 id="h3heading" align="center">Search the Data</h3>
       <center>
        <div id="Searchs">
		  <form id="form1" name="form1" method="get" action="Searchs.php"  >
		    <input type="text"  name="Keywords" size="100" />
            <input type="submit"  value="Search" class="buttons" />
		  </form>
          </div>
       </center>
			

		</div>
	<?php include_once("includes/template_pageBottom.php"); ?>
</body>
</html>