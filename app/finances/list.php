<?php
include("../bd.php");

$query = $conection->prepare("SELECT * FROM `finances` WHERE active = 1 ORDER BY registration_date ASC");
$query->execute();
$resultados = $query->get_result()->fetch_all(MYSQLI_ASSOC);

?>

<?php include("../sections/header.php"); ?>

    <br>
    <div class="card">
        <div class="card-header">
            Listado registros
        </div>
        <div class="card-body">

            <div class="table-responsive-sm">
                <table class="table table">
                    <thead>
                        <tr>
                            <th scope="col">Ingresos</th>
                            <th scope="col">Egresos</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($resultados as $registro){ ?>
                        <tr class="">
                            <td scope="row">$<?php echo number_format($registro['income'], 0, ',', '.') ?></td>
                            <td>$<?php echo number_format($registro['expenses'], 0, ',', '.') ?></td>
                            <td><?php echo date("d-m-Y", strtotime($registro['registration_date'])) ?></td>
                            <td><a name="delete" id="delete" class="btn btn-danger" href="delete.php?registerId=<?php echo $registro['id']; ?>" role="button">Borrar</a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            

        </div>
    </div>   
    

<?php include("../sections/footer.php"); ?>