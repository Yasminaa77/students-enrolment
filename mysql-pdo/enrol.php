<?php

$pdo = new PDO("mysql:host=localhost;dbname=lab6", "root", "");



// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted student and course IDs
    $studentId = $_POST['student'];
    $courseId = $_POST['course'];

    // Check if a record already exists for this student and course
    $stmt = $pdo->prepare("SELECT * FROM enrolments WHERE student = :student AND course = :course");
    $stmt->execute(['student' => $studentId, 'course' => $courseId]);
    $existingRecord = $stmt->fetch();
    //not prepared statement
    // $existingRecord = $pdo->query("SELECT * FROM enrolments WHERE student = '$studentId' AND course = '$courseId'")->fetch();



    if ($existingRecord) {
        echo "This student is already enrolled in this course.";
    } else {
        // Insert the new enrolment record
        $stmt = $pdo->prepare("INSERT INTO enrolments (student, course, semester) VALUES (:student, :course, 'Winter2023')");
        $stmt->execute(['student' => $studentId, 'course' => $courseId]);
        echo "Enrolment successfully added.";
    }
}

// Fetch all existing enrolments and display them in an HTML table
$stmt = $pdo->query("SELECT * FROM enrolments ORDER BY student");
$enrolments = $stmt->fetchAll();
echo "<style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px #ccc;
            overflow: hidden;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        h2 {
            text-align: center;
            margin-top: 30px;
        }
        .no-enrolments {
            text-align: center;
            margin-top: 30px;
        }
      </style>";

if (count($enrolments) > 0) {
    echo "<h2>Current Enrolments</h2>";
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Student</th><th>Course</th><th>Semester</th></tr></thead>";
    echo "<tbody>";
    foreach ($enrolments as $enrolment) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($enrolment['id']) . "</td>";
        echo "<td>" . htmlspecialchars($enrolment['student']) . "</td>";
        echo "<td>" . htmlspecialchars($enrolment['course']) . "</td>";
        echo "<td>" . htmlspecialchars($enrolment['semester']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "There are no current enrolments.";
}
?>