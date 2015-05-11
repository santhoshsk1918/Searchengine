<?php
   //Including Requried files
    require_once('pdf2text.php');
    require_once('doctotext.php');
    require_once('includes/connect.php');

	if(isset($_POST['submit'])){
		$error = "";
		if(isset($_FILES['Inpfile'])){
			if(!empty($_POST['title']) && !empty($_POST['desc'])){

    				
                             //Get Form Details
    			$file = $_FILES['Inpfile'];

                            // Get File Details
    			$file_name = $file['name'];
    			$temp_location = $file['tmp_name'];
    			$file_size = $file['size'];

                             //Getting File Extention
    			$file_ext = explode('.',$file_name);
    			$file_ext = strtolower(end($file_ext));

    			//Converting Input to string
                            $wordlist = array(" the ","the ","this "," to "," is "," in "," a "," or "," on ", " and ", " where "," how "," and "," of "," which "," when "," therefore "," like "," made "," who "," rather "," than "," if "," well "," or "," make "," we "," hence "," thus "," etc ","ing "," be ", " by ", " the " , " was "," i ","-","/","<",">","?", " are "," for ");
                            $allowed = array('txt' , 'doc' , 'docx', 'jpeg', 'xlsx' , 'pdf' , 'pptx','jpeg','png');


    			if(in_array($file_ext , $allowed)){
                              if($file_size < 2097152){
                                 switch($file_ext){
                                      // Case of Text files.
                                      case 'txt': $new_file_name = uniqid('',true) . "." . $file_ext;
                                                  $newdestination = "upload/" . $new_file_name;
                                                  if(move_uploaded_file($temp_location,$newdestination)){
                                                  $result = file_get_contents($newdestination);
                                                  $result = str_replace($wordlist, "", $result);
                                                   $result = trim(preg_replace("/(^|\s+)(\S(\s+|$))+/", " ", $result));
                                                  $result = strtolower($result);
                                                  $words = array_count_values(str_word_count($result, 1));
                                                  arsort($words);
                                                  $newArray = array_slice($words, 0, 5, true);
                                                  $keywords = implode(" ",array_keys($newArray));
                                                  $error_no = datapush($keywords,$newdestination);
                                                      if($error_no == 0){
                                                        unlink($newdestination);
                                                      }
                                                    
                                                  }
                                                  break;

                                      //Case of pdf files
                                      case 'pdf': $new_file_name = uniqid('',true) . "." . $file_ext;
                                                  $newdestination = "upload/" . $new_file_name;
                                                  if(move_uploaded_file($temp_location,$newdestination)){
                                                  $result = pdf2text ($newdestination);
                                                  $result = strtolower($result);
                                                  $result = str_replace($wordlist, "", $result);
                                                  $result = trim(preg_replace("/(^|\s+)(\S(\s+|$))+/", " ", $result));
                                                  $words = array_count_values(str_word_count($result, 1));
                                                  arsort($words);
                                                  $newArray = array_slice($words, 0, 5, true);
                                                  $keywords = implode(" ",array_keys($newArray));
                                                  
                                                  $error_no = datapush($keywords,$newdestination);
                                                      if($error_no == 0){
                                                        unlink($newdestination);
                                                      }
                                                   }
                                                  
                                                  break;

                                      //Case for Document tyoes .doc and .docx
                                      case 'doc':  $new_file_name = uniqid('',true) . "." . $file_ext;
                                                   $newdestination = "upload/" . $new_file_name;
                                                   if(move_uploaded_file($temp_location,$newdestination)){
                                                   $docObj = new DocxConversion("$newdestination");
                                                   $result= $docObj->convertToText();
                                                   $result = str_replace($wordlist, "", $result);
                                                   $result = strtolower($result);
                                                   $result = trim(preg_replace("/(^|\s+)(\S(\s+|$))+/", " ", $result));
                                                   $words = array_count_values(str_word_count($result, 1));
                                                   arsort($words);
                                                   $newArray = array_slice($words, 0, 5, true);
                                                   
                                                   $keywords = implode(" ",array_keys($newArray));
                                                  
                                                  $error_no = datapush($keywords,$newdestination);
                                                      if($error_no == 0){
                                                        unlink($newdestination);
                                                      
                                                    }
                                                   }
                                                     break;

                                      case 'docx':  $new_file_name = uniqid('',true) . "." . $file_ext;
                                                    $newdestination = "upload/" . $new_file_name;
                                                    if(move_uploaded_file($temp_location,$newdestination)){
                                                    $docObj = new DocxConversion("$newdestination");
                                                    $result= $docObj->convertToText();
                                                    $result = str_replace($wordlist, "", $result);
                                                    $result = trim(preg_replace("/(^|\s+)(\S(\s+|$))+/", " ", $result));
                                                    $result = strtolower($result);
                                                    $words = array_count_values(str_word_count($result, 1));
                                                    arsort($words);
                                                    $newArray = array_slice($words, 0, 5, true);
                                                   
                                                    $keywords = implode(" ",array_keys($newArray));
                                                  
                                                    $error_no = datapush($keywords,$newdestination);
                                                      if($error_no == 0){
                                                        unlink($newdestination);
                                                        
                                                      }
                                                    }
                                                    break;
                                                    
                                      //image type jpeg and png
                                      case 'jpeg': $new_file_name = uniqid('',true) . "." . $file_ext;
                                                  $newdestination = "upload/images" . $new_file_name;
                                                  if(move_uploaded_file($temp_location,$newdestination)){
																$keywords = "";
																$error_no = datapush($keywords,$newdestination);
                                                      if($error_no == 0){
                                                        unlink($newdestination);
                                                      
                                                     }
                                                  }
                                                   break;
                                      case 'png':  $new_file_name = uniqid('',true) . "." . $file_ext;
                                                  $newdestination = "upload/images" . $new_file_name;
                                                  if(move_uploaded_file($temp_location,$newdestination)){
																$keywords = "";
																$error_no = datapush($keywords,$newdestination);
                                                      if($error_no == 0){
                                                        unlink($newdestination);
                                                      
                                                     }
															
                                                  }
                                                   break;

                                      //Case for Excel Sheets .xlsx and hopefully csv
                                      case 'xlsx':  $new_file_name = uniqid('',true) . "." . $file_ext;
                                                    $newdestination = "upload/" . $new_file_name;
                                                    if(move_uploaded_file($temp_location,$newdestination)){
                                                    $docObj = new DocxConversion("$newdestination");
                                                    $result= $docObj->convertToText();
                                                    $result = str_replace($wordlist, "", $result);
                                                     $result = trim(preg_replace("/(^|\s+)(\S(\s+|$))+/", " ", $result));
                                                    $result = strtolower($result);
                                                    $words = array_count_values(str_word_count($result, 1));
                                                    arsort($words);
                                                    $newArray = array_slice($words, 0, 5, true);
                                                   
                                                    $keywords = implode(" ",array_keys($newArray));
                                                  
                                                   $error_no = datapush($keywords,$newdestination);
                                                      if($error_no == 0){
                                                        unlink($newdestination);
                                                      
                                                     }
                                                    }
                                                   break;
                                                   

                                      case 'pptx': $new_file_name = uniqid('',true) . "." . $file_ext;
                                                    $newdestination = "upload/" . $new_file_name;
                                                    if(move_uploaded_file($temp_location,$newdestination)){
                                                    $docObj = new DocxConversion("$newdestination");
                                                    $result= $docObj->convertToText();
                                                    $result = str_replace($wordlist, "", $result);
                                                     $result = trim(preg_replace("/(^|\s+)(\S(\s+|$))+/", " ", $result));
                                                    $result = strtolower($result);
                                                    $words = array_count_values(str_word_count($result, 1));
                                                    arsort($words);
                                                    $newArray = array_slice($words, 0, 5, true);
                                                   
                                                    $keywords = implode(" ",array_keys($newArray));
                                               
                                                    $error_no = datapush($keywords,$newdestination);
                                                      if($error_no == 0){
                                                        unlink($newdestination);
                                                      }
                                                    }
                                                   break;
                                   }
                              }
                               else{
                                         $error = '<p class="error" align="center">please Upload a file with size less than 2MB</p>'  ;
                                 }
                           }else{
    				                          	$error =  '<p class="error" align="center">Sorry Dude give a nicer file extension</p>';
                           }
		  }else{

			$error = '<p class="error" align="center" >Please enter Title and Description</p>';
		  }

	}else{
					$error = '<p class="error" align="center" >File not uploaded</p>';	
			}

}else{
          $error = '<p class="error" align="center" >Page is Dead</p>';  
      }
    function datapush($keyword,$newdestination)
    {
      //Get Extention of the new file
      $fileext = explode('.',$newdestination);
      $fileext = strtolower(end($fileext));
      $title = mysql_real_escape_string($_POST['title']);
      $Description = mysql_real_escape_string($_POST['desc']);

      $sql = mysql_query("INSERT INTO `search` ( `title`, `description`,`type`, `link`, `keywords`) VALUES('$title','$Description','$fileext','$newdestination','$keyword')") or die ("Sorry !! Could 11 not connect to database");
      $sr_id = mysql_insert_id();
      if(sr_id == false){
          return 0;
    }else{
        header("Location:conform1.php?id=$sr_id");
    }
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Engine upload</title>
<link rel="stylesheet" href="includes/style.css">
</head>

<body>
	<?php include_once("includes/template_pageTop.php"); ?>
    <div id="pageMiddle">
    <h3 id="h3heading" align="center">Please upload the file</h3>
    <?php if(isset($_POST['title'])){echo $error;} ?>
	<div id="uploading">
	<form action="upload1.php" method="post" enctype="multipart/form-data" name="uploadform">
    <table width="80%" border="0" cellspacing="0" cellpadding="6" align="center">
   <tr>
        <td width="20%" align="right" valign="middle">Title of Upload: </td>
        <td width="80%" align="left"><label>
          <input name="title" type="text" id="title" size="64" />
        </label></td>
      </tr>
  <tr>
        <td align="right" valign="middle">Description of upload:</td>
        <td align="left"><label>
          <textarea name="desc" id="desc" cols="64" rows="5"></textarea>
        </label></td>
      <tr>

      <tr>
        <td align="right" valign="top"><label for="Inpfile">File Upload:</label></td>
        <td align="left"><div class="field"><label>
          <input type="file" name="Inpfile" id="Inpfile" />
        </label><p class="hint">Please add text(.txt/.doc/.docx/.pdf/.pptx/.xlsx) or images(.png/.jpeg) formats only</p></td></div>
      </tr>  
      
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="left"><label>
          <input type="submit" name="submit" id="submit" class="buttons" value="Upload" />
        </label></td>
      </tr>
</table>

    
    </form>
    </div>
    </div >
    <?php include_once("includes/template_pageBottom.php"); ?>
</body>
</html>