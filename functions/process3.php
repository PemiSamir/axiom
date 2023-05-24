<?php
   
   $myFile = "data/data_classes.json";
   $arr_data = array(); // create empty array

  try
  {
	   //Get form data
	   $formdata = array(
	      'index'=> $_POST['index'],
	      'name'=> $_POST['name'],
          'description'=>$_POST['description'],
          'description'=>$_POST['description'],
          'synonyms'=>$_POST['synonyms'],
          'subcalsses'=>$_POST['subcalsses'],
          'validate'=>$_POST['validate']
	   );

	   //Get data from existing json file
	   $jsondata = file_get_contents($myFile);

	   // converts json data into array
	   $jsondata = json_decode($jsondata, true);

	   // Push user data to array
	   array_push($jsondata,$formdata);

       //Convert updated array to JSON
	   $jsondata = json_encode($jsondata, JSON_PRETTY_PRINT);
	   
	   //write json data into data.json file
	   if(file_put_contents($myFile, $jsondata)) {
	        echo 'Data successfully saved';
	    }
	   else 
	        echo "error";

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
   //header("location: ./" )
?>