<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skladiste";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Neuspjelo povezivanje na bazu podataka: " . $conn->connect_error);
    }

    $username = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];

    $sql = "SELECT * FROM korisnici WHERE k_ime = '$username' AND lozinka = '$lozinka'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['korisnik'] = $row['k_ime'];
        
        if ($row['uloga'] == 'admin') {
            header("Location: dodaj_proizvod.php");
        } else {
            header("Location: ispis.php");
        }
        exit();
    } else {
        echo "Pogrešno korisničko ime ili lozinka.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
</head>
<body>

    <h1>Prijava</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="korisnicko_ime">Korisničko ime:</label>
        <input type="text" name="korisnicko_ime" required><br>

        <label for="lozinka">Lozinka:</label>
        <input type="password" name="lozinka" required><br>

        <input type="submit" value="Prijavi se">
    </form>

</body>
</html>
