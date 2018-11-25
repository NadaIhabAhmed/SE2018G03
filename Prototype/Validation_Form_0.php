<?php 
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $genderErr = $addressErr = $passwordErr = $conpasswordErr = $mobileErr = "";
$fname = $lname = $email = $gender = $address = $password = $conpassword = $mobile = "";
      
$zeroErr = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["fname"]))
    {
      $fnameErr = "First name is required";
    }
    else
    {

        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$fname))
        {
          $fnameErr = "Only letters and white space allowed"; 
        }
        $zeroErr +=1 ;
    }
    if (empty($_POST["lname"]))
    {
      $lnameErr = "Last name is required";
    }
    else
    {

        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lname))
        {
          $lnameErr = "Only letters and white space allowed"; 
        }
        $zeroErr +=1 ;
    }
        
    if (empty($_POST["email"]))
    {
      $emailErr = "Email is required";
    }
    else
    {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
          $emailErr = "Invalid email format"; 
        }
        $zeroErr +=1 ;
    }

    
    if (empty($_POST["password"]))
    {
      $passwordErr = "Password is required";
    }
    else
    {
      $password = test_input($_POST["password"]);
      $zeroErr +=1 ;
    }

    if (empty($_POST["conpassword"]))
    {
      $conpasswordErr = "Password is required";
    }
    else
    {
        if ($_POST["conpassword"] != $_POST["password"])
        {
            $conpasswordErr = "Passwords don't match";
        }
        else
        {
            $conpassword = test_input($_POST["conpassword"]);
            $zeroErr +=1 ;
        }
        
    }

    if (empty($_POST["address"]))
    {
      $addressErr = "Address is required";
    }
    else
    {
      $address = test_input($_POST["address"]);
      $zeroErr +=1 ;
    }

    if ($zeroErr == 6)
    {
        header("location:user_interface_1.php");
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