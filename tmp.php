<?php
if(isset($_POST["txtSearch"])){
    $search = $_POST["txtSearch"];
    header('Location: http://localhost/joomla25/index.php?option=com_cvnusers&view=topplayer&search='.$search);
}
?>