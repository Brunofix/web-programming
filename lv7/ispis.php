<?php
session_start();

if (!isset($_SESSION['korisnik'])) {
    header("Location: prijava.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skladiste";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Neuspjelo povezivanje na bazu podataka: " . $conn->connect_error);
    }

    $naziv_proizvoda = $_POST['naziv_proizvoda'];
    $cijena = $_POST['cijena'];

    $sql = "INSERT INTO proizvodi (naziv_proizvoda, cijena) VALUES ('$naziv_proizvoda', '$cijena')";

    if ($conn->query($sql) === TRUE) {
        $poruka = "Proizvod uspješno unesen.";
    } else {
        $poruka = "Greška prilikom unosa proizvoda: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos Proizvoda</title>
</head>
<body>

    <?php
    if (isset($poruka)) {
        echo "<p>$poruka</p>";
    }
    ?>

    <p>Odaberite opciju:</p>

    <a href="dodaj_proizvod.php">Unos proizvoda</a> |

</body>
</html>
<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skladiste";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Neuspjelo povezivanje na bazu podataka: " . $conn->connect_error);
}

// Write the query
$sql = "SELECT * FROM proizvodi";

// Execute the query and get the result
$result = $conn->query($sql);

// Start the table
echo "<table>";
echo "<tr><th>Naziv Proizvoda</th><th>Cijena</th></tr>";

// Loop through the result set
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["proizvod"]. "</td><td>" . $row["cijena"]. "</td></tr>";
    }
} else {
    echo "No results";
}

// Close the table
echo "</table>";

$conn->close();
?>