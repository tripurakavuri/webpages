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
    echo "enter path of file to enter: ";
   $uploadfile= fopen ("php://stdin","r");
			$line = fgets($uploadfile);
    //validate whether uploaded file is a csv file
    
    //$uploadfile= fopen("$pathfile","r");
/*    $conn = mysqli_connect('localhost','root','bhea@123','test','--local-infile');

$loadcases = "LOAD DATA LOCAL INFILE '$line'
                  INTO TABLE person
                  FIELDS TERMINATED BY ',' "
    or die("error loading file.");
    $importquery=mysqli_query($conn,$loadcases);
if(mysqli_query($conn, $loadcases)){

    echo "Records were imported successfully.";

} else {

    echo "ERROR: Could not able to execute $loadcases. " . mysqli_error($conn);

}*/
$conn = mysqli_connect('localhost','root','bhea@123','test');
$file = fopen("/var/www/html/import.csv","r");
while(($emapData = fgetcsv($file,1000,",")) !== FALSE){
	$sql = "INSERT into person(P_name,ID,address1,address2,email) values('$empData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]')";
	mysqli_query($conn,$sql);
}
fclose($file);
echo "CSV file has been Successfully Imported.";
} 
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

hi();







