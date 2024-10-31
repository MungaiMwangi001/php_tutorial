// scripts.js

function sendGradeData() {
    const studentName = document.getElementById("studentName").value.trim();
    const score = document.getElementById("score").value;

    if (studentName === "" || score === "") {
        alert("Please enter both the student's name and score.");
        return false;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "calculate_grade.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };

    const data = `studentName=${encodeURIComponent(studentName)}&score=${encodeURIComponent(score)}`;
    xhr.send(data);

    return false; // Prevent form submission
}
