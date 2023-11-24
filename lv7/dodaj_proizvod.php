<?php
session_start();

if (!isset($_SESSION['korisnik'])) {
    header("Location: prijava.php");
    exit();
}
$username = $_SESSION['korisnik'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skladiste";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Neuspjelo povezivanje na bazu podataka: " . $conn->connect_error);
    }

    $proizvod = $_POST['naziv_proizvoda'];
    $cijena = $_POST['cijena'];

    $sql = "INSERT INTO proizvodi (proizvod, cijena) VALUES ('$proizvod', '$cijena')";

    if ($conn->query($sql) === TRUE) {
        echo "Proizvod uspješno dodan.";
    } else {
        echo "Greška prilikom dodavanja proizvoda: " . $conn->error;
    }

    $conn->close();
}
$ime_prezime = $_SESSION['korisnik'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodajte Proizvod</title>
</head>
<body>

    <h1>Dobro došao admin</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="proizvod">Naziv proizvoda:</label>
        <input type="text" name="naziv_proizvoda" required><br>

        <label for="cijena">Cijena:</label>
        <input type="text" name="cijena" required><br>

        <input type="submit" value="Unesi proizvod">
    </form>

    <br>

    <a href="ispis.php">Pregledaj proizvode</a> |
    <a href="odjava.php">Odjava</a>

</body>
</html>