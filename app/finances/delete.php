<?php
    include("../bd.php");

    $id=$_GET['registerId'];

    $query = $conection->prepare("UPDATE `finances` SET `active`='0' WHERE id = ?");
    $query->bind_param('i', $id);

    if($query->execute()){

        echo "<script lenguaje='JavaScript'>
            alert('Los datos se eliminaron correctamente');
            location.assign('\list.php');
            </script>
        ";

    }else{
        echo "<script lenguaje='JavaScript'>
            alert('Error, los datos no se eliminaron');
            location.assign('\list.php');
            </script>
        ";

    }

?>