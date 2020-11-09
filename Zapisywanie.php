<?php


$imie=$_POST['imie'];
$nazw=$_POST['nazw'];
$Pesel=$_POST['Pesel'];





@$con = new mysqli( 'localhost' , 'root' , 'Root123' , 'dane' );

if (mysqli_connect_errno()) {
    echo "<p>Błąd: Połączenie z bazą danych nie powiodło się.<br />
    Spróbuj jeszcze raz później.<p />";
    exit;
}

 
$polecenie = $con->prepare("INSERT INTO Dane VALUES (?,?,?)");
$polecenie->bind_param('sssd',$imie, $nazw, $Pesel);
$polecenie->execute();

if ($polecenie->affected_rows > 0) {
    echo "<p> Dane zostały zapisany<p />";
} else {
    echo "<p> Wystapił błąd.<p />";
}

$con->close();

?>