<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr =$dateErr = $degreeErr = $bloodgroupErr = $websiteErr = "";
$name = $email = $gender = $date = $degree = $bloodgroup = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $selectedCount = 0;
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }
  

        /*$date = new EJ\DatePicker("datePicker");
        echo $date->value(new DateTime())->minDate(new DateTime("11/1/2016"))->maxDate(new DateTime("11/24/2016"))->render();
            

  /*if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }*/

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["degree"])) {
    $degreeErr = "Degree is required";
  } else {
    $degree = test_input($_POST["degree"]);
  }

  if (empty($_POST["bloodgroup"])) {
    $genderErr = "bloodgroup is required";
  } else {
    $bloodgroup = test_input($_POST["bloodgroup"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

        
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  <!--Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>-->
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  Degree:
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="SSC") echo "checked";?> value="ssc">SSC
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="HSC") echo "checked";?> value="hsc">HSC
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="BSC") echo "checked";?> value="bsc">BSC 
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="MSC") echo "checked";?> value="msc">MSC
  <span class="checkbox">* <?php echo $degreeErr;?></span>
  <br><br>

  <!--BloodGroup:
  <label for="bloodGroup">Blood Group:</label>
        <select name="bloodGroup" required>
            <option value="">Select Blood Group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>-->
  <input type="submit" name="submit" value="Submit">  
</form>



<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
//echo $comment;
echo $degree;
echo "<br>";
echo $gender;
echo "<br>";
echo $bloodgroup;
?>

</body>
</html>