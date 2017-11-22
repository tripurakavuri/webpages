<?php

/**
 * php task for creating menu
 * created by Tripura
 * menu created for 3 modules
 * Accounts, leads and tasks
 */
 
//	welcome note

echo "SUGAR CRM\n";
welcome();	//	login function

function welcome()
{
	echo "Username: ";
	$username = fopen ("php://stdin","r");
	$usernamevalue = fgets ($username);	
	echo "Password: ";
	$password = fopen ("php://stdin","r");
	$passwordvalue =readline();
	
	//	checking for credentials
	
	if(trim($usernamevalue) == 'sugar' and trim($passwordvalue) == 'sugar@123')
	{	
		echo "\nYou have successfully login to your account\n";
		mainmenu();
	}
	else
	{
		echo "Invalid credentials\n";
		welcome();
	}
}

function mainmenu()
{	
	echo "\n\tselect from below\n";
	echo "\t1.Accounts\t2.Leads\t   3.Tasks\t4.Quick Create\t   5.Logout\n\n";
	echo "\tEnter your value: ";
	$handle = fopen ("php://stdin","r");
	$line =readline();
	
	//	selecting module
	
	if(trim($line) == '1')
	{
		echo "You have selected Accounts module\n";
		accounts();
	}
	else if(trim($line) == '2')
	{
		echo "You have selected Leads module\n";
		leads();
	}
	else if(trim($line) == '3')
	{
		echo "You have selected Tasks module\n";
		tasks();
	}
	else if(trim($line) == '4')
	{
		echo "Select the module module\n
		1. Accounts
		2. Leads
		3. Tasks\n
		Enter your value: ";
		$handle = fopen ("php://stdin","r");
		$line =readline();
		if(trim($line) == '1')
		{
			echo "You have selected to create new account\n";
			createaccount();
		}
		else if(trim($line) == '2')
		{
			echo "You have selected to create new Lead\n";
			createlead();
		}
		else if(trim($line) == '3')
		{
			echo "You have selected to create new Task\n";
			createtask();
		}
	}
	else if(trim($line) == '5')
	{
		echo "\nYou have successfully loggedout\n\n";
		echo "\t\t\tEnter 1 to re-login
			Enter 0 to close\n
			Enter your value: ";
		$handle = fopen ("php://stdin","r");
		$line =readline();
		if(trim($line) == '1')
		{
			welcome();
		}
		else if(trim($line) == '0')
		{
			exit;
		}
	}
	else
	{
		echo "Wrong input\n";
		mainmenu();
	}  
}

/*function submenu($modulename)
{
	echo "\t\tEnter 11 to create new $modulename
    		Enter 12 to View $modulename
		Enter 13 to edit $modulename
		Enter 14 to import $modulename
		Enter 00 to go back to Main Menu
    		Enter your value: ";
    	  $handle = fopen ("php://stdin","r");
			$line =readline();
			if(trim($line) == '11'){
    		echo "You have selected to create new $modulename\n";
    		createmodule($modulename);
			}
			 else if(trim($line) == '12'){
            echo "You have selected to View $modulename\n";
  
            viewmodule($modulename);
			}
			else if(trim($line) == '13'){
            echo "You have selected to Edit $modulename\n";
            editmodule($modulename);
			}
			else if(trim($line) == '14'){
            echo "You have selected to Import $modulename\n";
            importmodule($modulename);
			}
			else if(trim($line) == '00'){
            mainmenu();
            } 
            else{
				echo "Wrong input\n";
				submenu($modulename);
			}
		}*/
		
function accounts()
{	
	echo "\tEnter 11 to create new Account
	Enter 12 to View Account
	Enter 13 to edit Account
	Enter 14 to import Accounts
	Enter 00 to go back to Main Menu
	Enter your value: ";
	$handle = fopen ("php://stdin","r");
	$line =readline();
	if(trim($line) == '11')
	{
		echo "You have selected to create new account\n";
		createaccount();
	}
	else if(trim($line) == '12')
	{
		echo "You have selected to View account\n";
		viewaccount();
	}
	else if(trim($line) == '13')
	{
		echo "You have selected to Edit account\n";
		editaccount();
	}
	else if(trim($line) == '14')
	{
		echo "You have selected to Import account\n";
		importaccount();
	}
	else if(trim($line) == '00')
	{
		mainmenu();
	} 
	else
	{
		echo "Wrong input\n";
		accounts();
	}
}
	
function createaccount()
{	
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "enter id: ";
	$ID = fopen ("php://stdin","r");
	$IDline = readline();
	echo "enter name: ";
	$name = fopen ("php://stdin","r");
	$nameline=readline();
	echo "enter office number: ";
	$phone = fopen ("php://stdin","r");
	$phoneline =readline();	
	echo "enter address: ";
	$address = fopen ("php://stdin","r");
	$addressline =readline();
	echo "enter email: ";
	$email = fopen ("php://stdin","r");
	$emailline=readline();
	$createrecord="insert into accounts values('$IDline','$nameline','$phoneline','$addressline','$emailline')";
	$createquery=mysqli_query($conn, $createrecord);
	echo "You have successfully created one record\n";
	accounts();
}		
		
function viewaccount()
{         
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	$sql = "SELECT * FROM accounts";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo str_pad("\e[0;31m id: " . $row["id"],5). str_pad("\t\e[0;32m | Name: " . $row["account_name"],5). str_pad("\t\e[0;34m | phone: " . $row["office_phone"],5). "\t\e[0;33m | mail: " . $row["email"]. "\e[0m\n";
		}
		echo "\n\t\tEnter 1 to copy
		Enter 2 to delete
		Enter 3 to go back\n
		Enter value: ";
		$handle = fopen ("php://stdin","r");
		$line =readline();
		if(trim($line) == '1')
		{
			echo "You have selected to copy account\n";
			copyaccount();
		}
		else if(trim($line) == '2')
		{
			echo "You have selected to delete account\n";
			deleteaccount();
		}			
		else if(trim($line) == '3')
		{
			echo "You have selected to go back\n";
			accounts();
		}
		else
		{
			echo "wrong input\n";
			viewaccount();
		}			
	}
	else
	{
		echo "0 results";
	}
	accounts();
}

function editaccount()
{
	$conne = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "enter id of the record you want to edit: ";
	$editid = fopen ("php://stdin","r");
	$editidvalue =readline();
	echo "enter 1 to edit name
	enter 2 to edit Office phone
	enter 3 to edit address
	enter 4 to edit email
	enter 0 to cancel
	Enter your value: ";
	$handle = fopen ("php://stdin","r");
	$line=readline();
	if(trim($line) == '1')
	{  		
		echo "Edit name: ";
		$editname = fopen ("php://stdin","r");
		$editnamevalue =readline();
		$editrecord = "UPDATE accounts SET account_name='".$editnamevalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		accounts();
	}
	else if(trim($line) == '2')
	{
		echo "Edit phone: ";
		$editphone = fopen ("php://stdin","r");
		$editphonevalue=readline();
		$editrecord = "UPDATE accounts SET office_phone='".$editphonevalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		accounts();
	}
	else if(trim($line) == '3')
	{
		echo "Edit address: ";
		$editaddress = fopen ("php://stdin","r");
		$editaddressvalue =readline();
		$editrecord = "UPDATE accounts SET address_country='".$editaddressvalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		accounts();
	}
	else if(trim($line) == '4')
	{
		echo "Edit email: ";
		$editemail = fopen ("php://stdin","r");
		$editemailvalue =readline();
		//echo $editnamevalue.$editidvalue.$editemailvalue;
		$editrecord = "UPDATE accounts SET email='".$editemailvalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		accounts();
	} 
	else if(trim($line) == '0')
	{
		accounts();
	}
	else
	{
		echo "wrong input\n";
		accounts();
	}
}
			
function importaccount()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	if($file = fopen('/var/www/html/import.csv', "r"))
	{
		while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
		{
			$sql = "INSERT into accounts(id,account_name,office_phone,address_country,email) values('$importdata[0]','$importdata[1]','$importdata[2]','$importdata[3]','$importdata[4]')";
			mysqli_query($conn,$sql);
		}
		fclose($file);
		echo "CSV File has been successfully Imported.\n";
		accounts();
	}
	else
	{
		echo "could not open";
	}   
} 

function copyaccount()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "Enter id of the record to copy: ";
	$handle = fopen ("php://stdin","r");
	$oldid =readline();
	$newid=rand(50,1000);
	//echo "$oldid";
	//echo "$newid";
	$createrecord="insert into accounts (id,account_name,office_phone,address_country,email)
	SELECT '$newid',account_name,office_phone,address_country,email FROM accounts
	WHERE id=$oldid";
	//echo "$createrecord";
	if(mysqli_query($conn, $createrecord))
	{
		echo "You have successfully copied one record\n";
		accounts();
	}
	else
	{
		echo "ERROR: Could not able to execute $createrecord. " . mysqli_error($conn)."\n";
	}
}

function deleteaccount()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "Enter id of the record to delete: ";
	$handle = fopen ("php://stdin","r");
	$deleteid =readline();
	$sql="delete from accounts where id='$deleteid'";
	if(mysqli_query($conn, $sql))
	{
		echo "Record was deleted successfully\n";
	}
	else
	{
		echo "ERROR: Could not able to execute $sql\n" . mysqli_error($conn);
	}
	mysqli_close($conn);  
} 
       
function leads()
{
	echo "\tEnter 21 to create new Lead
	Enter 22 to view Lead
	Enter 23 to edit Lead
	Enter 24 to import Lead
	Enter 00 to go back to Main Menu
	Enter your value: ";
	$handle = fopen ("php://stdin","r");
	$line =readline();
	if(trim($line) == '21')
	{
		echo "You have selected to create new Lead\n";
		createlead();
	}
	else if(trim($line) == '22')
	{
		echo "You have selected to View Lead\n";
		viewlead();
	} 
	else if(trim($line) == '23')
	{
		echo "You have selected to Edit Lead\n";
		editlead();
	} 
	else if(trim($line) == '24')
	{
		echo "You have selected to Import Lead\n";
		importlead();
	} 
	else if(trim($line) == '00')
	{
		mainmenu();
	} 
	else 
	{
		echo "Wrong input. Please select from above\n";
		leads();
	}
}

function createlead()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "enter id: ";
	$ID = fopen ("php://stdin","r");
	$IDline = readline();
	echo "enter salutation: ";
	$sal = fopen ("php://stdin","r");
	$salline =readline();
	echo "enter first name: ";
	$fname = fopen ("php://stdin","r");
	$fnameline =readline();
	echo "enter last name: ";
	$lname = fopen ("php://stdin","r");
	$lnameline =readline();
	echo "enter lead source: ";
	$lsource = fopen ("php://stdin","r");
	$lsourceline =readline();
	echo "enter company name: ";
	$compname = fopen ("php://stdin","r");
	$compnameline =readline();
	echo "enter email: ";
	$email = fopen ("php://stdin","r");
	$emailline =readline();
	echo "enter mobile number: ";
	$phone = fopen ("php://stdin","r");
	$phoneline =readline();	
	$createrecord="insert into leads values('$IDline','$salline','$fnameline','$lnameline','$lsourceline','$compnameline','$emailline','$phoneline')";
	$createquery=mysqli_query($conn, $createrecord);
	echo "You have successfully created one record\n";
	leads();
}	

function viewlead()
{         
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	$sql = "SELECT * FROM leads";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo str_pad("\e[0;31m id: " . $row["id"],1). str_pad("\t\e[0;32m | FName: " . $row["first_name"],1).str_pad("\t\e[0;32m | LName: " . $row["last_name"],1). str_pad("\t\e[0;32m | leadsource: " . $row["lead_source"],5).str_pad("\t\e[0;32m | company: " . $row["company_name"],5). str_pad("\t\e[0;34m | phone: " . $row["mobile_number"],1). "\t\e[0;33m | mail: " . $row["email"]. "\e[0m\n";
		}
		echo "\n\t\tEnter 1 to copy
		Enter 2 to delete
		Enter 3 to go back\n
		Enter value: ";
		$handle = fopen ("php://stdin","r");
		$line =readline();
		if(trim($line) == '1')
		{
			echo "You have selected to copy lead\n";
			copylead();
		}
		else if(trim($line) == '2')
		{
			echo "You have selected to delete lead\n";
			deletelead();
		}			
		else if(trim($line) == '3')
		{
			echo "You have selected to go back\n";
			leads();
		}
		else
		{
			echo "wrong input\n";
			viewlead();
		}			
	}
	else
	{
		echo "0 results";
	}
	leads();
}
	
function editlead()
{
	$conne = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "enter id of the record you want to edit: ";
	$editid = fopen ("php://stdin","r");
	$editidvalue =readline();
	echo "enter 1 to edit firstname
	enter 2 to edit lastname
	enter 3 to edit leadsource
	enter 4 to edit company name
	enter 5 to edit email
	enter 6 to edit mobile number
	enter 0 to cancel
	Enter your value: ";
	$handle = fopen ("php://stdin","r");
	$line=readline();
	if(trim($line) == '1')
	{  		
		echo "Edit First name: ";
		$editname = fopen ("php://stdin","r");
		$editnamevalue =readline();
		$editrecord = "UPDATE accounts SET first_name='".$editnamevalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		leads();
	}
	else if(trim($line) == '2')
	{  		
		echo "Edit Last name: ";
		$editname = fopen ("php://stdin","r");
		$editnamevalue =readline();
		$editrecord = "UPDATE leads SET last_name='".$editnamevalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		leads();
	}

	else if(trim($line) == '3')
	{
		echo "Edit lead source: ";
		$editaddress = fopen ("php://stdin","r");
		$editaddressvalue =readline();
		$editrecord = "UPDATE leads SET lead_source='".$editaddressvalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		leads();
	}
	else if(trim($line) == '4')
	{
		echo "Edit company name: ";
		$editaddress = fopen ("php://stdin","r");
		$editaddressvalue =readline();
		$editrecord = "UPDATE leads SET company_name='".$editaddressvalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		leads();
	}
	else if(trim($line) == '5')
	{
		echo "Edit email: ";
		$editemail = fopen ("php://stdin","r");
		$editemailvalue =readline();
		//echo $editnamevalue.$editidvalue.$editemailvalue;
		$editrecord = "UPDATE leads SET email='".$editemailvalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		accounts();
	} 
	else if(trim($line) == '6')
	{
		echo "Edit phone: ";
		$editphone = fopen ("php://stdin","r");
		$editphonevalue=readline();
		$editrecord = "UPDATE leads SET mobile_number='".$editphonevalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		leads();
	}
	else if(trim($line) == '0')
	{
		leads();
	}
	else
	{
		echo "wrong input\n";
		leads();
	}
}

function importlead()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	if($file = fopen('/var/www/html/importleads.csv', "r"))
	{
		while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
		{
		$sql = "INSERT into leads(id,salutation,first_name,last_name,lead_source,company_name,email,mobile_number) values('$importdata[0]','$importdata[1]','$importdata[2]','$importdata[3]','$importdata[4]','$importdata[5]','$importdata[6]','$importdata[7]')";
		mysqli_query($conn,$sql);
		}
		fclose($file);
		echo "CSV File has been successfully Imported.\n";
		leads();
	}
	else
	{
		echo "could not open";
	}   
} 

function copylead()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "Enter id of the record to copy: ";
	$handle = fopen ("php://stdin","r");
	$oldid =readline();
	$newid=rand(50,1000);
	//echo "$oldid";
	//echo "$newid";
	$createrecord="insert into leads (id,salutation,first_name,last_name,lead_source,company_name,email,mobile_number)
	SELECT '$newid',salutation,first_name,last_name,lead_source,company_name,email,mobile_number FROM leads
	WHERE id=$oldid";
	//echo "$createrecord";
	if(mysqli_query($conn, $createrecord))
	{
		echo "You have successfully copied one record\n";
		leads();
	}
	else
	{
		echo "ERROR: Could not able to execute $createrecord. " . mysqli_error($conn)."\n";
	}
}

function deletelead()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "Enter id of the record to delete: ";
	$handle = fopen ("php://stdin","r");
	$deleteid =readline();
	$sql="delete from leads where id='$deleteid'";
	if(mysqli_query($conn, $sql))
	{
		echo "Record was deleted successfully\n";
	}
	else
	{
		echo "ERROR: Could not able to execute $sql\n" . mysqli_error($conn);
	}
	mysqli_close($conn);  
} 


function tasks()
{	
	echo "\tEnter 31 to create new Task
	Enter 32 to view Task
	Enter 33 to edit Task
	Enter 34 to import Tasks
	Enter 00 to go back to Main Menu
	Enter your value: ";
	$handle = fopen ("php://stdin","r");
	$line =readline();
	if(trim($line) == '31')
	{
		echo "You have selected to create new Task\n";
		createtask();
	}
	else if(trim($line) == '32')
	{
		echo "You have selected to View Task\n";
		viewtask();
	} 
	else if(trim($line) == '33')
	{
		echo "You have selected to Edit Task\n";
		edittask();
	} 
	else if(trim($line) == '34')
	{
		echo "You have selected to Import Tasks\n";
		importtask();
	} 
	else if(trim($line) == '00')
	{
		mainmenu();
	} 
	else 
	{
		echo "Wrong input. Please select from above\n";
		tasks();
	}
}

function createtask()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "enter id: ";
	$ID = fopen ("php://stdin","r");
	$IDline = readline();
	echo "enter name: ";
	$name = fopen ("php://stdin","r");
	$nameline =readline();
	echo "enter priority: ";
	$priority = fopen ("php://stdin","r");
	$priorityline =readline();
	echo "enter status: ";
	$status = fopen ("php://stdin","r");
	$statusline =readline();
	echo "enter contact name: ";
	$contact = fopen ("php://stdin","r");
	$contactline =readline();	
	$createrecord="insert into tasks values('$IDline','$nameline','$priorityline','$statusline','$contactline')";
	$createquery=mysqli_query($conn, $createrecord);
	echo "You have successfully created one record\n";
	tasks();
}	


function viewtask()
{         
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	$sql = "SELECT * FROM tasks";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo str_pad("\e[0;31m id: " . $row["id"],1). str_pad("\t\e[0;32m | Name: " . $row["name"],1). str_pad("\t\e[0;32m | Priority: " . $row["priority"],5).str_pad("\t\e[0;32m | status: " . $row["status"],5). "\t\e[0;34m | contact name: " . $row["contact_name"]. "\e[0m\n";
		}
		echo "\n\t\tEnter 1 to copy
		Enter 2 to delete
		Enter 3 to go back\n
		Enter value: ";
		$handle = fopen ("php://stdin","r");
		$line =readline();
		if(trim($line) == '1')
		{
			echo "You have selected to copy task\n";
			copytask();
		}
		else if(trim($line) == '2')
		{
			echo "You have selected to delete task\n";
			deletetask();
		}			
		else if(trim($line) == '3')
		{
			echo "You have selected to go back\n";
			tasks();
		}
		else
		{
			echo "wrong input\n";
			viewtask();
		}	
	}
	else
	{
		echo "0 results";
	}
	tasks();
}

function edittask()
{
	$conne = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "enter id of the record you want to edit: ";
	$editid = fopen ("php://stdin","r");
	$editidvalue =readline();
	echo "			enter 1 to edit name
	enter 2 to edit priority
	enter 3 to edit status
	enter 4 to edit contact name
	enter 0 to cancel
	Enter your value: ";
	$handle = fopen ("php://stdin","r");
	$line=readline();
	if(trim($line) == '1')
	{  		
		echo "Edit name: ";
		$editname = fopen ("php://stdin","r");
		$editnamevalue =readline();
		$editrecord = "UPDATE tasks SET name='".$editnamevalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		tasks();
	}
	if(trim($line) == '2')
	{  		
		echo "Edit Priority: ";
		$editname = fopen ("php://stdin","r");
		$editnamevalue =readline();
		$editrecord = "UPDATE tasks SET priority='".$editnamevalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		tasks();
	}

	else if(trim($line) == '3')
	{
		echo "Edit Status: ";
		$editaddress = fopen ("php://stdin","r");
		$editaddressvalue =readline();
		$editrecord = "UPDATE tasks SET status='".$editaddressvalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		tasks();
	}
	else if(trim($line) == '4')
	{
		echo "Edit contact name: ";
		$editaddress = fopen ("php://stdin","r");
		$editaddressvalue =readline();
		$editrecord = "UPDATE tasks SET contact_name='".$editaddressvalue."' WHERE id='".$editidvalue."'";
		$editquery=mysqli_query($conne, $editrecord);
		echo "You have successfully edited one record\n";
		tasks();
	}
	else if(trim($line) == '0')
	{
		tasks();
	}
	else
	{
		echo "wrong input\n";
		tasks();
	}
}

function importtask()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	if($file = fopen('/var/www/html/importtasks.csv', "r"))
	{
		while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
		{
			$sql = "INSERT into tasks(id,name,priority,status,contact_name) values('$importdata[0]','$importdata[1]','$importdata[2]','$importdata[3]','$importdata[4]')";
			mysqli_query($conn,$sql);
		}
		fclose($file);
		echo "CSV File has been successfully Imported.\n";
		tasks();
	}
	else
	{
		echo "could not open";
	}   
}  

function copytask()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "Enter id of the record to copy: ";
	$handle = fopen ("php://stdin","r");
	$oldid =readline();
	$newid=rand(50,1000);
	//echo "$oldid";
	//echo "$newid";
	$createrecord="insert into tasks (id,name,priority,status,contact_name)
	SELECT '$newid',name,priority,status,contact_name FROM tasks
	WHERE id=$oldid";
	//echo "$createrecord";
	if(mysqli_query($conn, $createrecord))
	{
		echo "You have successfully copied one record\n";
		leads();
	}
	else
	{
		echo "ERROR: Could not able to execute $createrecord. " . mysqli_error($conn)."\n";
	}
}

function deletetask()
{
	$conn = mysqli_connect('localhost','root','bhea@123','taskphp');
	echo "Enter id of the record to delete: ";
	$handle = fopen ("php://stdin","r");
	$deleteid =readline();
	$sql="delete from tasks where id='$deleteid'";
	if(mysqli_query($conn, $sql))
	{
		echo "Record was deleted successfully\n";
	}
	else
	{
		echo "ERROR: Could not able to execute $sql\n" . mysqli_error($conn);
	}
	mysqli_close($conn);  
} 
?>
