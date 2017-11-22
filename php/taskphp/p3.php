<?php
    $username="root";
    $password="bhea@123";
    $database="test";
    $servername="localhost";

    #get the data from form fields
    $Id=$_POST['Id'];
    $P_name=$_POST['P_name'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $email=$_POST['email'];

   mysqli_connect($servername,$username,$password,$database);
    

    if($_POST['insertrecord']=="insert"){
        $query="insert into person values('$Id','$P_name','$address1','$address2','$email')";
        echo "inside";
        mysql_query($query);
        $query1="select * from person";
        $result=mysql_query($query1);
        $num= mysql_numrows($result);

        #echo"<b>output</b>";
        print"<table border size=1 > 
        <tr><th>Id</th>
        <th>P_name</th>
        <th>address1</th>
        <th>address2</th>
        <th>email</th>
        </tr>";
        $i=0;
        while($i<$num)
        {
            $Id=mysql_result($result,$i,"Id");
            $P_name=mysql_result($result,$i,"P_name");
            $address1=mysql_result($result,$i,"address1");
            $address2=mysql_result($result,$i,"address2");
            $email=mysql_result($result,$i,"email");
            echo"<tr><td>$Id</td>
            <td>$P_name</td>
            <td>$address1</td>
            <td>$address2</td>
            <td>$email</td>
            </tr>";
            $i++;
        }
        print"</table>";
    }

    if($_POST['searchdata']=="Search")
    {
        $P_name=$_POST['name'];
        $query="select * from person where P_name='$P_name'";
        $result=mysql_query($query);
        print"<table border size=1><tr><th>Id</th>
        <th>P_name</th>
        <th>address1</th>
        <th>address2</th>
        <th>email</th>
        </tr>";
        while($row=mysql_fetch_array($result))
        {
            $Id=$row[Id];
            $P_name=$row[P_name];
            $address1=$row[address1];
            $address2=$row[address2];
            $email=$row[email];
            echo"<tr><td>$Id</td>
            <td>$P_name</td>
            <td>$address1</td>
            <td>$address2</td>
            <td>$email</td>
            </tr>";
        }
        echo"</table>";
    }
    echo"<a href=lab2.html> Back </a>";
?>
