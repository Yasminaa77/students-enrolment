<?php

// Connect to database
$conn = new mysqli("localhost", "root", "", "lab6");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Check if all fields are filled out
    if (
        empty($_POST['firstname']) ||
        empty($_POST['lastname']) ||
        empty($_POST['email']) ||
        empty($_POST['birthdate']) ||
        empty($_POST['student_id'])
    ) {
        die('All fields are required.');
    }


// Check if the first character of the student id is 'a'
    if ($_POST["student_id"][0] !== "A") {
        die("Student ID must start with 'A'.");
    }


// Capitalize the first letter of the student id
    $studentId = ucfirst($_POST["student_id"]);


// Check if student record already exists
    $resultCount = $conn->query("SELECT COUNT(*) FROM students WHERE student_id = '$studentId'");
    $countRow = $resultCount->fetch_row();
    if ($countRow[0] > 0) die("A student with this ID already exists.");

// Insert new student record
    $studentId = $_POST["student_id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];

    $sql = "INSERT INTO students (student_id, firstname, lastname, birthdate, email) VALUES ('$studentId', '$firstname', '$lastname', '$birthdate', '$email')";
    $result = $conn->query($sql);

}

// Fetch and display all existing students
echo "<h2>Current Students</h2>";

$students = $conn->query("SELECT * FROM students");
if ($students->num_rows == 0){
    die("No students found.");
}


    ?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #0074D9;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
    <table>
        <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthdate</th>
            <th>Email</th>
        </tr>
        <?php while($row = $students->fetch_array()): ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

<?php $conn->close(); ?>