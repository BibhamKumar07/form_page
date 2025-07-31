<?php

require_once "config.php";
$username = $password = $confirm_password = "" ;
$username_err = $password_err = $confirm_password_err = "" ;

if ($_SERVER['REQUEST_METHOD'] == "POST"){

  if(empty(trim($_POST["username"]))){
    $username_err = "username cannot be blank";
  }else{
    $sql = "SELECT id FROM login WHERE username = ?";
    $stmt = mysqli_prepare($conn,$sql); 
    if($stmt)
    {
      mysqli_stmt_bind_param($stmt,"s",$param_username);


      $param_username = trim($_POST['username']);

      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1){
          $username_err = "This Username is Already Taken";
        }else{
          $username = trim($_POST['username']);
        }
      }else{
        echo "Something Went Worng";
      }
    }
  }
    mysqli_stmt_close($stmt);


if(empty(trim($_POST['password']))){
  $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) <5 ){
  $password_err = "Password cannot be less than 5 characters";
}
else{
  $password = trim($_POST['password']);
}

if (trim($_POST['password']) != trim($_POST['confirm_password'])){
  $password_err = "Password should match";
}

if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
 $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
  $stmt = mysqli_prepare($conn,$sql);
  if($stmt){
    mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_password);

    $param_username = $username;
    $param_password = password_hash($password,PASSWORD_DEFAULT);

    if(mysqli_stmt_execute($stmt)){
      header("location:register.php");
    }else{
      echo "Something Went Worng....";
    }

  }
  mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="form-container">
    <form action=""  method="POST">
      <h2>Student Registration</h2>

      <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname"  placeholder="Enter your First Name">
      </div>

      <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname"  placeholder="Enter your Last Name" >
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="username"  placeholder="Enter your Email" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone"  placeholder="Enter your Phone Number">
      </div>

      <div class="form-group">
        <label for="branch">Branch</label>
        <select id="branch" name="branch" >
          <option value="">--Select Your Branch--</option>
          <option value="Computer Science & Engg.">Computer Science & Engg.</option>
          <option value="Mechanical Engg.">Mechanical Engg.</option>
          <option value="Electrical Engg.">Electrical Engg.</option>
          <option value="Civil Engg.">Civil Engg.</option>
          <option value="Electronics Engg.">Electronics Engg.</option>
        </select>
      </div>

      <div class="form-group">
        <label for="semester">Semester</label>
        <select id="semester" name="semester" >
          <option value="">--Select Semester--</option>
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="4th">4th</option>
          <option value="5th">5th</option>
          <option value="6th">6th</option>
        </select>
      </div>
       <div class="form-group">
        <label for="rollno">Roll Number</label>
        <input type="text" id="roll" name="roll" >
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" >
      </div>

      <div class="form-group">
        <label>Gender</label>
        <div class="radio-group">
          <label><input type="radio" name="gender" value="Male"> Male</label>
          <label><input type="radio" name="gender" value="Female" > Female</label>
          <label><input type="radio" name="gender" value="Other" > Other</label>
        </div>
      </div>

      <div class="form-group">
        <label for="state">State</label>
        <select id="state" name="state" >
          <option value="">--Select State--</option>
          <option value="Bihar">Bihar</option>
        </select>
      </div>

      <div class="form-group">
        <label for="district">District</label>
        <select id="district" name="district" >
          <option value="">--Select District--</option>
          <option value="Araria">Araria</option>
          <option value="Arwal">Arwal</option>
          <option value="Aurangabad">Aurangabad</option>
          <option value="Banka">Banka</option>
          <option value="Begusarai">Begusarai</option>
          <option value="Bhagalpur">Bhagalpur</option>
          <option value="Bhojpur">Bhojpur</option>
          <option value="Buxar">Buxar</option>
          <option value="Darbhanga">Darbhanga</option>
          <option value="East Champaran">East Champaran (Motihari)</option>
          <option value="Gaya">Gaya</option>
          <option value="Gopalganj">Gopalganj</option>
          <option value="Jamui">Jamui</option>
          <option value="Jehanabad">Jehanabad</option>
          <option value="Kaimur">Kaimur (Bhabua)</option>
          <option value="Katihar">Katihar</option>
          <option value="Khagaria">Khagaria</option>
          <option value="Kishanganj">Kishanganj</option>
          <option value="Lakhisarai">Lakhisarai</option>
          <option value="Madhepura">Madhepura</option>
          <option value="Madhubani">Madhubani</option>
          <option value="Munger">Munger</option>
          <option value="Muzaffarpur">Muzaffarpur</option>
          <option value="Nalanda">Nalanda</option>
          <option value="Nawada">Nawada</option>
          <option value="Patna">Patna</option>
          <option value="Purnia">Purnia</option>
          <option value="Rohtas">Rohtas</option>
          <option value="Saharsa">Saharsa</option>
          <option value="Samastipur">Samastipur</option>
          <option value="Saran">Saran (Chhapra)</option>
          <option value="Sheikhpura">Sheikhpura</option>
          <option value="Sheohar">Sheohar</option>
          <option value="Sitamarhi">Sitamarhi</option>
          <option value="Siwan">Siwan</option>
          <option value="Supaul">Supaul</option>
          <option value="Vaishali">Vaishali</option>
          <option value="West Champaran">West Champaran (Bettiah)</option>
        </select>
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" name="address" rows="3" ></textarea>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm_password" required>
      </div>

      <button type="submit">Register</button>
    </form>
  </div>
  
</body>
</html>
