// scripts.js

function validateForm() {
    const num1 = document.getElementById("num1").value;
    const num2 = document.getElementById("num2").value;
    const num3 = document.getElementById("num3").value;

    if (num1 === "" || num2 === "" || num3 === "") {
        alert("Please enter all three numbers.");
        return false;
    }

    if (isNaN(num1) || isNaN(num2) || isNaN(num3)) {
        alert("Please enter valid numbers only.");
        return false;
    }

    return true; // All validations passed
}
