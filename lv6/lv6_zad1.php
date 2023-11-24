<?php
$student = array(
    "ime" => "Ime",
    "prezime" => "Prezime",
    "JMBG" => "JMBG",
    "broj_indeksa" => "BrojIndeksa",
    "godina_studija" => "GodinaStudija"
);

foreach ($student as $key => $value) {
    echo "$key: $value <br>";
}

$auto = array(
    "Citroen" => array(
        "tip_automobila" => "C4 kaktus",
        "kubikaza" => 1899,
        "boja" => "zelena",
        "godina_proizvodnje" => 2022,
        "motor" => "benzin"
    ),
    "Mercedes" => array(
        "tip_automobila" => "C63-AMG",
        "kubikaza" => 4998,
        "boja" => "plava",
        "godina_proizvodnje" => 2022,
        "motor" => "benzin"
    )
);

echo "Podaci o Citroenu: <br>";
foreach ($auto['Citroen'] as $indeks => $vrijednost) {
    echo "$indeks: $vrijednost <br>";
}
echo "<br>";

echo "Podaci o Mercedesu: <br>";
echo "tip_automobila: " . $auto['Mercedes']['tip_automobila'] . "<br>";
echo "kubikaza: " . $auto['Mercedes']['kubikaza'] . "<br>";
echo "motor: " . $auto['Mercedes']['motor'] . "<br>";
echo "boja: " . $auto['Mercedes']['boja'] . "<br>";
echo "godina_proizvodnje: " . $auto['Mercedes']['godina_proizvodnje']. "<br>";


function kvadrat($broj) {
    return $broj * $broj;
}

$broj = 42; 

echo "Kvadrat broja $broj je: " . kvadrat($broj);

class kupac{
    private $ime;
    private $prezime;
    
        public function __construct($ime,$prezime){
        $this->ime = $ime;
        $this->prezime = $prezime;
        }

        public function setIme($ime){
        $this->ime = $ime;
        }
        public function setPrezime($prezime){
        $this->prezime = $prezime;
        }
        public function ispis(){
        echo "Kupac je: ". $this->ime . " " . $this->prezime;
        }
    }
    
    $kupac = new kupac("Bruno", "Šarlija");
    $kupac->ispis();
?>
