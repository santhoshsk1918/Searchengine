<?php
     //Including Requried files
    require_once('pdf2text.php');
    require_once('doctotext.php');
    require_once('includes/connect.php');

	if(isset($_POST['title'])){

		if(isset($_FILES['Inpfile'])){

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
                        $wordlist = array(" the ","the ","this "," to "," is "," in "," a "," or "," on ", " and ", " where "," how "," and "," of "," which "," when "," therefore "," like "," made "," who "," rather "," than "," if "," well "," or "," make "," we "," hence "," thus "," etc ","ing "," be ", " by ", " the " , " was "," i ","-","/","<",">","?"," are "," for " );
                        $allowed = array('txt' , 'doc' , 'docx', 'jpeg', 'xlsx' , 'pdf' , 'pptx');


			if(in_array($file_ext , $allowed)){
                          if($file_size < 2097152){
                             switch($file_ext){
                                  // Case of Text files.
                                  case 'txt': $new_file_name = uniqid('',true) . "." . $file_ext;
                                              $newdestination = "upload/" . $new_file_name;
                                              if(move_uploaded_file($temp_location,$newdestination)){
                                              $result = file_get_contents($temp_location);
                                              $result = str_replace($wordlist, "", $result);
                                              $result = strtolower($result);
                                              $words = array_count_values(str_word_count($result, 1));
                                              arsort($words);
                                              $newArray = array_slice($words, 0, 5, true);
                                              $keywords = implode(" ",array_keys($newArray));
                                              echo $keywords;
                                              }
                                              break;

                                  //Case of pdf files
                                  case 'pdf': $new_file_name = uniqid('',true) . "." . $file_ext;
                                              $newdestination = "upload/" . $new_file_name;
                                              if(move_uploaded_file($temp_location,$newdestination)){
                                              $result = pdf2text ($newdestination);
                                              $result = strtolower($result);
                                              $result = str_replace($wordlist, "", $result);
                                              $words = array_count_values(str_word_count($result, 1));
                                              arsort($words);
                                              $newArray = array_slice($words, 0, 5, true);
                                              print_r($newArray) ;
                                              $keywords = implode(" ",array_keys($newArray));
                                              echo $keywords;
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
                                               $words = array_count_values(str_word_count($result, 1));
                                               arsort($words);
                                               $newArray = array_slice($words, 0, 5, true);
                                               print_r($newArray) ;
                                               $keywords = implode(" ",array_keys($newArray));
                                               echo $keywords;
                                               }
                                                 break;

                                  case 'docx':  $new_file_name = uniqid('',true) . "." . $file_ext;
                                                $newdestination = "upload/" . $new_file_name;
                                                if(move_uploaded_file($temp_location,$newdestination)){
                                                $docObj = new DocxConversion("$newdestination");
                                                $result= $docObj->convertToText();
                                                $result = str_replace($wordlist, "", $result);
                                                $result = strtolower($result);
                                                $words = array_count_values(str_word_count($result, 1));
                                                arsort($words);
                                                $newArray = array_slice($words, 0, 5, true);
                                                print_r($newArray) ;
                                                $keywords = implode(" ",array_keys($newArray));
                                                echo $keywords;
                                                }
                                                break;
                                                
                                  //image type jpeg and png
                                  case 'jpeg': echo "Image file";
                                               break;
                                  case 'png':  echo "Image file";
                                               break;

                                  //Case for Excel Sheets .xlsx and hopefully csv
                                  case 'xlsx':  $new_file_name = uniqid('',true) . "." . $file_ext;
                                                $newdestination = "upload/" . $new_file_name;
                                                if(move_uploaded_file($temp_location,$newdestination)){
                                                $docObj = new DocxConversion("$newdestination");
                                                $result= $docObj->convertToText();
                                                $result = str_replace($wordlist, "", $result);
                                                $result = strtolower($result);
                                                $words = array_count_values(str_word_count($result, 1));
                                                arsort($words);
                                                $newArray = array_slice($words, 0, 5, true);
                                                print_r($newArray) ;
                                                $keywords = implode(" ",array_keys($newArray));
                                                echo $keywords;
                                                }
                                               break;
                                               

                                  case 'pptx': $new_file_name = uniqid('',true) . "." . $file_ext;
                                                $newdestination = "upload/" . $new_file_name;
                                                if(move_uploaded_file($temp_location,$newdestination)){
                                                $docObj = new DocxConversion("$newdestination");
                                                $result= $docObj->convertToText();
                                                $result = str_replace($wordlist, "", $result);
                                                $result = strtolower($result);
                                                $words = array_count_values(str_word_count($result, 1));
                                                arsort($words);
                                                $newArray = array_slice($words, 0, 5, true);
                                                print_r($newArray) ;
                                                $keywords = implode(" ",array_keys($newArray));
                                                echo $keywords;
                                                }
                                               break;
                               }
                          }
                           else{
                                     echo "please Upload a file with size less than 2MB"  ;
                             }
                       }else{
				                          	echo "Sorry Dude give a nicer file extention";
                       }

		}else{
  Echo "Fuch shit";

}

}
    function datapush($keywords,$newdestination)
    {

    }
?>
