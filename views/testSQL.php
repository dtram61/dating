<?php

// Add new student to the database
// Step 1 Define the query
$sql = "INSERT INTO member (member_id,fname,lname,age,gender,phone,email,state,
                    seeking,bio,premium,interestsIndoor,interestsOutdoor)
    VALUES (:member_id, :fname, :lname, :age, :gender, :phone,
            :email, :state, :seeking, :bio, :premium, :interestsIndoor,:interestsOutdoor)";

// 2. Prepare the statement, this helps precompile step 1.
$statement = $dbh->prepare($sql);

// 3. Bind the parameters

$member_id = $_POST['member_id'];
$statement->bindParam(':member_id', $member_id, PDO::PARAM_STR); // this is for passing data into parameters
$fname = $_POST['fname'];
$statement->bindParam(':fname', $fname, PDO::PARAM_STR);
$lname = $_POST['lname'];
$statement->bindParam(':lname', $lname, PDO::PARAM_STR); // this prevents sql injections
$age = $_POST['age'];
$statement->bindParam(':age', $age, PDO::PARAM_STR); // this prevents sql injections
$gender = $_POST['gender'];
$statement->bindParam(':gender', $gender, PDO::PARAM_STR); // this prevents sql injections
$phone = $_POST['phone'];
$statement->bindParam(':phone', $phone, PDO::PARAM_STR); // this prevents sql injections$member_Id = $_POST['member_id'];
$email = $_POST['email'];
$statement->bindParam(':email', $email, PDO::PARAM_STR); // this is for passing data into parameters
$state = $_POST['state'];
$statement->bindParam(':state', $state, PDO::PARAM_STR);
$seeking = $_POST['seeking'];
$statement->bindParam(':seeking', $seeking, PDO::PARAM_STR); // this prevents sql injections
$bio = $_POST['bio'];
$statement->bindParam(':bio', $bio, PDO::PARAM_STR); // this prevents sql injections
$premium = $_POST['premium'];
$statement->bindParam(':premium', $premium, PDO::PARAM_STR); // this prevents sql injections
$interestsIndoor = $_POST['interestsIndoor'];
$statement->bindParam(':interestsIndoor', $interestsIndoor, PDO::PARAM_STR);
$interestsOutdoor = $_POST['interestsOutdoor'];
$statement->bindParam(':interestsOutdoor', $interestsOutdoor, PDO::PARAM_STR); // this prevents sql injections

$statement->execute();



// conditional statement for server request
// checks if request method is post
// put in insert query statement
// list all the students in the table
// close off php quote
// add in form with hard html
// using post array to add a student to the database
//
?>

<h1>Member Database Test</h1>

<form method="post" action="testSQL.php">
    <label>Member_id</label><input type="text" name="member_id"><br>
    <label>First Name</label><input type="text" name="fname"><br>
    <label>Last Name</label><input type="text" name="lname"><br>
    <label>Age</label><input type="text" name="age"><br>
    <label>Gender</label><input type="text" name="gender"><br>
    <label>Phone</label><input type="text" name="phone"><br>
    <label>Email</label><input type="text" name="email"><br>
    <label>State</label><input type="text" name="state"><br>
    <label>Seeking</label><input type="text" name="seeking"><br>
    <label>Biography</label><input type="text" name="bio"><br>
    <label>Premium (enter 1 or 0)</label><input type="text" name="premium"><br>
    <label>Interests Indoor</label><input type="text" name="interestsIndoor"><br>
    <label>Interests Outdoor</label><input type="text" name="interestsOutdoor"><br>

    <input type="submit" name="submit" value="Submit">
</form>








