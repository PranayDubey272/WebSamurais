
<?php
//db connectivity
if(isset($_POST['submit']))
{
$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);

if (!$conn) {
die("Connection failed: ");
}
}
?>