<?php 
include("../bd.php");


if($_SERVER["REQUEST_METHOD"] == "POST")
{
  //variables a insertar
  $income = $_POST["income"];
  $expenses = $_POST["expenses"];
  $registration_date = $_POST["date"];
  
  //antes de hacer el insert verifica que los numeros sean enteros
  if(is_int($income) && is_int($expenses)){
    $total = $income - $expenses;

    $insert = "INSERT INTO `finances` (`income`, `expenses`, `total`, `registration_date`) VALUES (?, ?, ?, ?)";
    $status = $conection->prepare($insert);
    $status->bind_param('iiss', $income, $expenses, $total, $registration_date);

    if ($status->execute()) {
      echo'<script type="text/javascript">
            alert("Registro insertado");
            </script>';
    } else {
      echo "Error al ejecutar la consulta: " . $status->error;
    }

    $status->close();

  }else{
    echo'<script type="text/javascript">
              alert("Ingresar solo números enteros");
              </script>';
  }

}

?>

<?php include("../sections/header.php"); ?>

  <br/>
  <div class="card">
    <div class="card-header">
      Registrar Finanzas
    </div>
    <div class="card-body">

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="income" class="form-label">Ingresos</label>
          <input type="number" min=0 class="form-control" name="income" id="income" aria-describedby="helpId" placeholder="Ingresos" required>
        </div>
        <div class="mb-3">
          <label for="expenses" class="form-label">Egresos</label>
          <input type="number" min=0 class="form-control" name="expenses" id="expenses" aria-describedby="helpId" placeholder="Egresos" required>
        </div>
        <div class="mb-3">
          <label for="date" class="form-label">Fecha registro</label>
          <input type="date" max=<?php echo date('Y-m-d'); ?> class="form-control" 
          name="date" id="date" aria-describedby="helpId" placeholder="" required>
        </div>

        <button type="submit" class="btn btn-success" style="float: right;">Guardar</button>
      </form>

    </div>
    <div class="card-footer text-muted"></div>
  </div>

<?php include("../sections/footer.php"); ?>