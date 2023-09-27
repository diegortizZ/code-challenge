<?php 
  include("../bd.php");

  $monthYear = $_POST["month"];
  $fechaFormateada = date("m-Y", strtotime($monthYear));
  $query = $conection->prepare("SELECT COUNT(*) AS movimientos, SUM(income) AS total_income, SUM(expenses) AS total_expenses, SUM(total) AS total_amount FROM finances WHERE DATE_FORMAT(registration_date, '%Y-%m') = ? AND active = 1");
  $query->bind_param('s', $monthYear);
  $query->execute();
  
  $resultado = $query->get_result()->fetch_assoc();

?>

<?php include("../sections/header.php"); ?>

<br>
    <div class="card">
        <div class="card-header">
            Resumen financiero <?php echo $fechaFormateada ?>
        </div>
        <div class="card-body">

            <div class="table-responsive-sm">
                <table class="table table">
                    <thead>
                        <tr>
                            <th scope="col">Movimientos</th>
                            <th scope="col">Ingresos</th>
                            <th scope="col">Egresos</th>
                            <th scope="col">Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row"><?php echo $resultado['movimientos'] ?></td>
                            <td scope="row">$<?php echo number_format($resultado['total_income'], 0, ',', '.') ?></td>
                            <td>$<?php echo number_format($resultado['total_expenses'], 0, ',', '.') ?></td>
                            <td>$<?php echo number_format($resultado['total_amount'], 0, ',', '.') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
          <a name="" id="" class="btn btn-primary" href="index.php" role="button" style="float: right;">Volver</a>
        </div>
    </div>   
    

<?php include("../sections/footer.php"); ?>