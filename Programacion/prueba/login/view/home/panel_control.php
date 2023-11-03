<?php

include($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/header.php');

?>


<h1 class="text-center mt-4">Bienvenido Usuario <?= $_SESSION["usuario"] ?></h1>


<a href="/login/view/home/logout.php" class="boton">Cerrar Session</a>

<?php

include($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/footer.php');

?>