<?php
    include_once('Database.php');
?>

<?php 
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $genderErr = $addressErr = $passwordErr = $conpasswordErr = $mobileErr = "";
$First_Name = $Last_Name = $Email = $Gender = $Address = $Password = $Confirm_Password = $Phone_Number = "";
      
$zeroErr = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["First_Name"]))
    {
      $fnameErr = "First name is required";
    }
    else
    {

        $First_Name = test_input($_POST["First_Name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$First_Name))
        {
          $fnameErr = "Only letters and white space allowed"; 
        }
        $zeroErr +=1 ;
    }
    if (empty($_POST["Last_Name"]))
    {
      $lnameErr = "Last name is required";
    }
    else
    {

        $Last_Name = test_input($_POST["Last_Name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$Last_Name))
        {
          $lnameErr = "Only letters and white space allowed"; 
        }
        $zeroErr +=1 ;
    }
        
    if (empty($_POST["Email"]))
    {
      $emailErr = "Email is required";
    }
    else
    {
        $Email = test_input($_POST["Email"]);
        // check if e-mail address is well-formed
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
        {
          $emailErr = "Invalid email format"; 
        }
        $zeroErr +=1 ;
    }

    
    if (empty($_POST["Password"]))
    {
      $passwordErr = "Password is required";
    }
    else
    {
      $Password = test_input($_POST["Password"]);
      $zeroErr +=1 ;
    }

    if (empty($_POST["Confirm_Password"]))
    {
      $conpasswordErr = "Password is required";
    }
    else
    {
        if ($_POST["Confirm_Password"] != $_POST["Password"])
        {
            $conpasswordErr = "Passwords don't match";
        }
        else
        {
            $Confirm_Password = test_input($_POST["Confirm_Password"]);
            $zeroErr +=1 ;
        }
        
    }

    if (empty($_POST["Address"]))
    {
      $addressErr = "Address is required";
    }
    else
    {
      $Address = test_input($_POST["Address"]);
      $zeroErr +=1 ;
    }

     if(empty($_POST["Phone_Number"]))
    {
        $mobileErr = "Phone number is required";
    }
    else
    {
        $zeroErr +=1;
    }


    if ($zeroErr == 7)
    {
        //if no error occured (all data are correct) store data in the database
        $email = $_POST['Email'];
        $pwd = $_POST['Password'];
        $fname = $_POST['First_Name'];
        $lname = $_POST['Last_Name'];
        $gender = $_POST['Gender'];
        $contact = $_POST['Phone_Number'];
        $address = $_POST['Address'];


        
        $sql = "INSERT INTO user (u_email, u_pwd, u_fname, u_lname, u_gender, u_contact, u_city)
        VALUES ('$email', '$pwd', '$fname', '$lname', '$gender', '$contact', '$address')";
        $result = $conn->query($sql);

       
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_POST['First_Name']; // holds the user first name
            
        header('Location:HomePage.php');

        


        
    }
    else
    {
        $zeroErr +=1 ;
    }


}
      
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>