<?php


//echo "Enter your value: ";
//$handle = fopen ("php://stdin","r");
//$line = fgets($handle);
//hi();
//	}
function hi(){
	echo "select from below
		1. Accounts
		2. Leads
                3. Tasks              
		Enter your value: ";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);	

if(trim($line) == '1'){
    	echo "You have selected Accounts module\n";
    	echo "		Enter 11 to create new Account
    		Enter 12 to View Account
		Enter 13 to edit Account
		Enter 14 to Import accounts
		enter 15 to detail view
		enter 16 to export
		Enter 00 to go back to Main Menu
    		Enter your value: ";
    	  $handle = fopen ("php://stdin","r");
			$line = fgets($handle);
			if(trim($line) == '11'){
    		echo "You have selected to create new account\n";
    		}
            else if(trim($line) == '12'){
            echo "You have selected to View account\n";
				
				$servername = "localhost";
				$username = "root";
				$password = "bhea@123";
				// establishing connection
				$conn = mysqli_connect('localhost','root','bhea@123','tasksql');
				$sql = "SELECT * FROM contacts";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				//table
				//echo 'Name: ', $tbl->contacts, ' (raw: ', $tbl->rawName, ')';
				// output data of each row
				//echo 'Fields: ', implode(', ', $tbl->Company_ID,first_name,last_name);
				while($row = $result->fetch_assoc()) {
				echo str_pad("\e[0;31m id: " . $row["Company_ID"],20). str_pad("\t\e[0;32m | \tFirst Name: " . $row["first_name"],20). "\t\e[0;34m | \tLast Name: " . $row["last_name"]. "\e[0m\n";
					
					}
					}
				else {
				echo "0 results";
				}
}
            else if(trim($line) == '13'){
            echo "You have selected to Edit account\n";
            
            } 
            
            
            
//load the database configuration file
//include 'dbConfig.php';

elseif(trim($line) == '14'){
   /* echo "enter path of file to enter: ";
   $uploadfile= fopen ("php://stdin","r");
			$line = fgets($uploadfile);
    //validate whether uploaded file is a csv file
    
    //$uploadfile= fopen("$pathfile","r");*/
    $conn = mysqli_connect('localhost','root','bhea@123','test');
/*
echo $filename=$_FILES["file"]["name"];
$ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
 
//we check,file must be have csv extention
if($ext=="csv")
{*/
echo "enter file name: ";
$filename= fopen ("php://stdin","r");
			$filenameline = fgets($filename);
			echo "$filenameline";
			//exit;
			
			
			//$filepath='/var/www/html/filenameline';
			//echo "$filepath";
			//exit;
  if($file = fopen($filenameline, "r")){
         while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            $sql = "INSERT into person(P_name,ID,address1,address2,email) values('$importdata[0]','$importdata[1]','$importdata[2]','$importdata[3]','$importdata[4]')";
            mysqli_query($conn,$sql);
         }
         fclose($file);
         echo "CSV File has been successfully Imported.";
	 }
	 else { echo "could not open";}
//}
/*else {
    echo "Error: Please Upload only CSV File";
}*/
}

/*$loadcases = "LOAD DATA LOCAL INFILE '$line'
                  INTO TABLE person
                  FIELDS TERMINATED BY ',' "
    or die("error loading file.");
    $importquery=mysqli_query($conn,$loadcases);
if(mysqli_query($conn, $loadcases)){

    echo "Records were imported successfully.";

} else {

    echo "ERROR: Could not able to execute $loadcases. " . mysqli_error($conn);

}
} 
}     
   */     
   
   else if( trim($line) == '15'){ 
	     $conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	     echo "enter id of the record you want to view: ";
            $editid = fopen ("php://stdin","r");
			$editidvalue =readline();
				$sql = "SELECT * FROM accounts where id=$editidvalue";						
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				//table
				//echo 'Name: ', $tbl->contacts, ' (raw: ', $tbl->rawName, ')';
				// output data of each row
				//echo 'Fields: ', implode(', ', $tbl->Company_ID,first_name,last_name);
				while($row = $result->fetch_assoc()) {
				print_r($row);
					
					}
					}
				else {
				echo "0 results";
				}
}

	 else if( trim($line) == '16'){ 
	     $conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	     echo "enter id of the record you want to view: "; 
	     
    $sql = "SELECT * FROM accounts";
    $rec = mysqli_query($conn,$sql) or die (mysqli_error());
    
    $num_fields = mysqli_num_fields($rec);
    
   for($i = 0; $i < $num_fields; $i++ )
    {
       // $header .= mysqli_field_name($rec,$i)."\\t";
       //$header .= mysqli_fetch_field($rec);	
       while ($property = mysqli_fetch_field($rec)) {
    echo $property->name;
}				
    }
  
    while($row = mysqli_fetch_row($rec))
    {
        $line = '';
        foreach($row as $value)
        {                                            
            if((!isset($value)) || ($value == ""))
            {
                $value = "\t";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $data .= trim( $line ) . "\n";
    }
    
    $data = str_replace("\\r" , "" , $data);
    
    if ($data == "")
    {
        $data = "\n No Record Found!\n";                        
    }
    
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=reports.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$header\n$data";	     
	    } 
	     
	     
	     
	     
	     
	        
            else if(trim($line) == '00'){
            hi();
            } 
            else 
                {
                    echo "Wrong input. Please select from above\n";
                }
    exit;
}
}
hi();
?>
