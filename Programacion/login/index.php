


<?php



require_once("C:/xampp/htdocs/login/view/head/header.php");



?>


<?php






require_once("C:/xampp/htdocs/login/view/head/footer.php");

?>

<?php




if(!isset($_SESSION["id_cargo"])){

}else{
  if($_SESSION["id_cargo"]){
    header("Location: view/home/login.php");

  }
}
?>