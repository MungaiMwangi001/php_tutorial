<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Variables</title>
</head>
<body>

<h2>Your Information</h2>

<?php
// Create variables
$favourite_color = "Blue"; 
$birth_year = 2000; // 
$is_student = true; // 

// Display the variables
echo "Favorite Color: " . $favourite_color . "<br>";
echo "Birth Year: " . $birth_year . "<br>";
echo "Are you a student? " . ($is_student ? "Yes" : "No") . "<br>";
?>

</body>
</html>