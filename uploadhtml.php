
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
    <h3 id="h3heading" align="center">Please upload the file</h3>
	<div id="uploading">
<form id="form1" name="form1" method="post" action="upload.php" enctype="multipart/form-data">
	<!--Title of the uploading file -->
    <table width="80%" border="0" cellspacing="0" cellpadding="6" align="center">
   <tr>
        <td width="20%" align="center" valign="middle">Title of Upload: </td>
        <td width="80%" align="left"><label>
          <input name="title" type="text" id="title" size="64" />
        </label></td>
      </tr>
  <tr>
        <td align="center" valign="middle">Description of upload</td>
        <td align="left"><label>
          <textarea name="desc" id="desc" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="center" valign="top"><label for="fileField">File Upload</label></td>
        <td align="left"><label>
          <input type="file" name="Inpfile" id="Inpfile" />
        </label><p class="hint">Please add text(.txt/.doc/.docx/.pdf/.pptx/.xlsx) or images(.png/.jpeg) formats only</p></td>
      </tr>  
      
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="left"><label>
          <input type="submit" name="button" id="submit" value="submit" />
        </label></td>
      </tr>
</table>

</form>
</div>
</div>
<?php include_once("includes/template_pageBottom.php"); ?>
</body>
</html>