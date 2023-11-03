


<?php



require_once($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/header.php');




?>


<?php







require_once($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/footer.php');

?>

<?php




if(!isset($_SESSION["id_cargo"])){

}else{
  if($_SESSION["id_cargo"]){
    header("Location: view/home/login.php");

  }
}
?>