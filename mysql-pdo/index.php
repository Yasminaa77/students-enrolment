<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Form</title>
    <style>
        h1 {
            text-align: center;
            margin-top: 30px;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #cccccc;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            background-color: #f9f9f9;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: #ffffff;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Enrollment Form</h1>
<form action="enrol.php" method="post">
    <label for="student">Select Student:</label>
    <select id="student" name="student">
        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=lab6", "root", "");
        $stmt = $pdo->query('SELECT id, firstname, lastname, student_id  FROM students');

        foreach ($stmt as $row) {
            echo "<option value=\"{$row['id']}\">{$row['firstname']} {$row['lastname']}, {$row['student_id']}</option>";
        }
        ?>
    </select>
    <br><br>
    <label for="course">Select Course:</label>
    <select id="course" name="course">
        <option value="FSWD101">FSWD101</option>
        <option value="FSWD201">FSWD201</option>
        <option value="FSWD301">FSWD301</option>
        <option value="FSWD401">FSWD401</option>
    </select>
    <br><br>
    <input type="submit" value="Enroll">
</form>
</body>
</html>
