<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? "";
    $sem = $_POST["sem"] ?? "";
    $mail = $_POST["mail"] ?? "";
    $gender = $_POST["Gender"] ?? "";
    $tel = $_POST["tel"] ?? "";

    // Save data (you can add code here if saving to file/database)
    echo "Data saved successfully!";
} else {
    // Show the form when the page is opened
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
