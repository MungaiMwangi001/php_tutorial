<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        /* Calculator styling */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #1c1c1c;
        }
        .calculator {
            width: 260px;
            padding: 20px;
            border-radius: 8px;
            background-color: #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .calculator-screen {
            width: 100%;
            height: 60px;
            background-color: #222;
            color: white;
            text-align: right;
            padding: 10px;
            font-size: 24px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .button-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .button {
            width: 100%;
            height: 50px;
            font-size: 18px;
            background-color: #444;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:active {
            background-color: #666;
        }
        .button.operation {
            background-color: #f1a33c;
        }
    </style>
</head>
<body>

<div class="calculator">
    <!-- Calculator Display -->
    <form method="post" id="calculatorForm">
        <input type="text" class="calculator-screen" name="display" value="<?php echo isset($_POST['display']) ? $_POST['display'] : '0'; ?>" readonly>
        
        <!-- Calculator Buttons -->
        <div class="button-grid">
            <!-- Row 1 -->
            <button type="button" class="button" onclick="clearDisplay()">AC</button>
            <button type="button" class="button" onclick="appendToDisplay('(')">(</button>
            <button type="button" class="button" onclick="appendToDisplay(')')">)</button>
            <button type="button" class="button operation" onclick="appendToDisplay('/')">÷</button>

            <!-- Row 2 -->
            <button type="button" class="button" onclick="appendToDisplay('7')">7</button>
            <button type="button" class="button" onclick="appendToDisplay('8')">8</button>
            <button type="button" class="button" onclick="appendToDisplay('9')">9</button>
            <button type="button" class="button operation" onclick="appendToDisplay('*')">×</button>

            <!-- Row 3 -->
            <button type="button" class="button" onclick="appendToDisplay('4')">4</button>
            <button type="button" class="button" onclick="appendToDisplay('5')">5</button>
            <button type="button" class="button" onclick="appendToDisplay('6')">6</button>
            <button type="button" class="button operation" onclick="appendToDisplay('-')">-</button>

            <!-- Row 4 -->
            <button type="button" class="button" onclick="appendToDisplay('1')">1</button>
            <button type="button" class="button" onclick="appendToDisplay('2')">2</button>
            <button type="button" class="button" onclick="appendToDisplay('3')">3</button>
            <button type="button" class="button operation" onclick="appendToDisplay('+')">+</button>

            <!-- Row 5 -->
            <button type="button" class="button" onclick="appendToDisplay('0')">0</button>
            <button type="button" class="button" onclick="appendToDisplay('.')">.</button>
            <button type="submit" class="button operation" name="equals" value="=">=</button>
        </div>
    </form>

    <?php
    // PHP code to handle calculations
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['display'])) {
            $display = $_POST['display'];
            
            // Evaluate the expression
            try {
                $result = eval("return $display;");
                echo "<script>document.getElementsByName('display')[0].value = '$result';</script>";
            } catch (Exception $e) {
                echo "<script>document.getElementsByName('display')[0].value = 'Error';</script>";
            }
        }
    }
    ?>
</div>

<script>
    // JavaScript to handle display updates
    function appendToDisplay(value) {
        const display = document.getElementsByName('display')[0];
        if (display.value === '0' || display.value === 'Error') {
            display.value = value;
        } else {
            display.value += value;
        }
    }

    function clearDisplay() {
        document.getElementsByName('display')[0].value = '0';
    }
</script>

</body>
</html>