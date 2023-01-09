<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "formula1";

                $conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
$sqldb = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$sql = $sqldb->prepare("DELETE FROM users WHERE UserId = ?");
try {
$sql->bindParam(1, $_REQUEST['delId']);
$sql->execute();
}
catch (PDOException $e) {
throw new RuntimeException("[".$e->getCode()."] : ". $e->getMessage());
}
header('Location: Product.php');
exit;
}
?>