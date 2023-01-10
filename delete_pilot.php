<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "formula1";

                $conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_REQUEST['delpId']) and $_REQUEST['delpId']!=""){
$sqldb = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$sql = $sqldb->prepare("DELETE FROM drivers WHERE driverId = ?");
try {
$sql->bindParam(1, $_REQUEST['delpId']);
$sql->execute();
}
catch (PDOException $e) {
throw new RuntimeException("[".$e->getCode()."] : ". $e->getMessage());
}
header('Location: main.php');
exit;
}
?>