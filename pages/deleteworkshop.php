<?php
if (!isset($_SESSION['level']) || $_SESSION['level'] == 'user') {
    echo '<script>window.location = "index.php";</script>';
}
 require_once('./class/class.Workshop.php'); 
if(isset($_GET['id_workshop'])){
 $objWorkshop = new Workshop(); 
$objWorkshop->id_workshop = $_GET['id_workshop'];
 $objWorkshop->DeleteWorkshop();
 echo "<script> alert('$objWorkshop->message'); </script>";
 echo "<script>window.location = 'index.php?p=dashboard_admin'</script>";
 }
 else{
 echo '<script>window.history.back()</script>';
 }
 ?>