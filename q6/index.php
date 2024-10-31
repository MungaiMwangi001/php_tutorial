<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Calculator</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>

<div class="container">
    <h1>Student Grade Calculator</h1>
    <form id="gradeForm" onsubmit="return sendGradeData();">
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" required><br><br>

        <label for="score">Enter Score:</label>
        <input type="number" id="score" name="score" min="0" max="100" required><br><br>

        <button type="submit">Calculate Grade</button>
    </form>

    <div id="result" class="result"></div>
</div>

</body>
</html>
