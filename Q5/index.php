<!DOCTYPE html>
<html>
<head>
    <title>Compare Three Numbers</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="scripts.js"></script>
</head>
<body>

<form method="post" action="" onsubmit="return validateForm()">
    <label for="num1">Enter first number:</label>
    <input type="number" id="num1" name="num1" ><br><br>

    <label for="num2">Enter second number:</label>
    <input type="number" id="num2" name="num2" ><br><br>

    <label for="num3">Enter third number:</label>
    <input type="number" id="num3" name="num3" ><br><br>

    <input type="submit" value="Compare">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];

    function compareThreeNumbers($a, $b, $c) {
        if ($a == $b && $b == $c) {
            return "All three numbers are equal.";
        } elseif ($a >= $b && $a >= $c) {
            return "The largest number is: $a";
        } elseif ($b >= $a && $b >= $c) {
            return "The largest number is: $b";
        } else {
            return "The largest number is: $c";
        }
    }

    echo "<h2>Result:</h2>";
    echo compareThreeNumbers($num1, $num2, $num3);
}
?>

</body>
</html>
