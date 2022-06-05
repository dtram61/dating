<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>OOP in PHP</title>

    <?php include("class_lib.php"); ?>

</head>
<body>
<?php
$stefan = new person(); // this is an object
$jimmy = new person();

$stefan->set_name("Stefan Mischook");
$jimmy->set_name("Nick Waddles");

echo "Stefan's full name: " . $stefan->get_name();
echo "Nick's full name: " . $jimmy->get_name();

$stephen = new person("Stephen Prescott");
echo "Stephan's full name: " . $stephen->get_name();

$james = new employee("Johnny Fingers");
echo "--->" . $james->get_name();

?>
</body>

</html>
