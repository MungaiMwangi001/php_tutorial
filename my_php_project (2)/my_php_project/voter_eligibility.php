<?php
// Initialize variables
$message = '';
$messageClass = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $citizenship = filter_input(INPUT_POST, 'citizenship', FILTER_SANITIZE_STRING);
    $registered = filter_input(INPUT_POST, 'registered', FILTER_SANITIZE_STRING);
    
    // Validate input
    if ($age && $citizenship && $registered) {
        // Check eligibility
        if ($age >= 18 && $citizenship === 'yes' && $registered === 'yes') {
            $message = "You are eligible to vote!";
            $messageClass = "success";
        } else {
            $message = "You are not eligible to vote. Requirements:";
            if ($age < 18) {
                $message .= "<br>- Must be 18 or older";
            }
            if ($citizenship !== 'yes') {
                $message .= "<br>- Must be a citizen";
            }
            if ($registered !== 'yes') {
                $message .= "<br>- Must be registered to vote";
            }
            $messageClass = "error";
        }
    } else {
        $message = "Please fill out all fields.";
        $messageClass = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Eligibility Checker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>
<body>
    <h1>Voter Eligibility Checker</h1>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" min="0" max="120" required>
        </div>

        <div class="form-group">
            <label for="citizenship">Are you a citizen?</label>
            <select id="citizenship" name="citizenship" required>
                <option value="">Select...</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="registered">Are you registered to vote?</label>
            <select id="registered" name="registered" required>
                <option value="">Select...</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <button type="submit">Check Eligibility</button>
    </form>

    <?php if ($message): ?>
        <div class="message <?php echo $messageClass; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
</body>
</html>