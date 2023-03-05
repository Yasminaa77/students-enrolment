<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Form</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 20px;
            font-size: 18px;
        }

        input[type="text"], input[type="email"], input[type="date"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
        }

        button[type="submit"] {
            display: block;
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

    </style>
</head>
<body>
<h1>Enrollment Form</h1>
<form action="receive.php" method="POST">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname">

    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="birthdate">Birthdate:</label>
    <input type="date" id="birthdate" name="birthdate">

    <label for="student_id">Student ID:</label>
    <input type="text" id="student_id" name="student_id">

    <button type="submit">Submit</button>
</form>
</body>
</html>
