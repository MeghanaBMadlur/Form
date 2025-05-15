<?php
$db_file = 'form_data.db'; // SQLite database file

try {
    $pdo = new PDO("sqlite:$db_file");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS student_form (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        sem TEXT,
        mail TEXT,
        gender TEXT,
        tel TEXT
    )");

    // If form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"] ?? "";
        $sem = $_POST["sem"] ?? "";
        $mail = $_POST["mail"] ?? "";
        $gender = $_POST["Gender"] ?? "";
        $tel = $_POST["tel"] ?? "";

        $sql = "INSERT INTO student_form (name, sem, mail, gender, tel) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $sem, $mail, $gender, $tel]);

        echo "Data saved successfully!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!-- HTML form -->
<h2>Student Form</h2>
<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Semester: <input type="text" name="sem"><br><br>
    Email: <input type="email" name="mail"><br><br>
    Gender:
    <input type="radio" name="Gender" value="Male"> Male
    <input type="radio" name="Gender" value="Female"> Female<br><br>
    Phone: <input type="text" name="tel"><br><br>
    <input type="submit" value="Submit">
</form>
