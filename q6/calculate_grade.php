<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentName = $_POST['studentName'];
    $score = floatval($_POST['score']);

    function calculateGrade($score) {
        if ($score >= 90 && $score <= 100) {
            return "A+ (Excellent)";
        } elseif ($score >= 80 && $score < 90) {
            return "A (Very Good)";
        } elseif ($score >= 70 && $score < 80) {
            return "B (Good)";
        } elseif ($score >= 60 && $score < 70) {
            return "C (Satisfactory)";
        } elseif ($score >= 50 && $score < 60) {
            return "D (Pass)";
        } elseif ($score >= 0 && $score < 50) {
            return "F (Fail)";
        } else {
            return "Invalid score. Please enter a score between 0 and 100.";
        }
    }

    $grade = calculateGrade($score);
    echo "Student: " . htmlspecialchars($studentName) . "<br> Score: " . htmlspecialchars($score) . "<br> Grade: " . $grade;
}
