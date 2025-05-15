<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? "";
    $sem = $_POST["sem"] ?? "";
    $mail = $_POST["mail"] ?? "";
    $gender = $_POST["Gender"] ?? "";
    $tel = $_POST["tel"] ?? "";

    // 🔐 Replace with your own DB credentials from Render
    $host = "dpg-d0ip8815pdvs739o2aog-a";
    $port = "5432"; // usually 5432 for PostgreSQL
    $dbname = "studentform_db";
    $user = "studentform_db_user";
    $password = "AE2Ejq9TsTtQ8VAAEMzg41aIQTq8KVgP";

    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // ✅ Create table if not exists
        $pdo->exec("CREATE TABLE IF NOT EXISTS student_form (
            id SERIAL PRIMARY KEY,
            name TEXT,
            sem TEXT,
            mail TEXT,
            gender TEXT,
            tel TEXT
        )");

        // ✅ Insert the submitted data
        $sql = "INSERT INTO student_form (name, sem, mail, gender, tel) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $sem, $mail, $gender, $tel]);

        echo "Data saved successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Show the form
    ?>
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
    <?php
}
?>
