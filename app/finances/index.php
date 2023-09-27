<?php
include("../bd.php");

?>


<?php include("../sections/header.php"); ?>

  <br/>
  <div class="card">
    <div class="card-header">
      Finanzas
    </div>
    <div class="card-body">
      <form method="post" action="result_month.php">
        <label for="month">Mes a consultar:</label>
        <input type="month" max=<?php echo date('Y-m'); ?> class="form-control" name="month" id="month" aria-describedby="helpId" placeholder="" required>

        <button type="submit" class="btn btn-success" style="margin-top: 15px;float: right;">Buscar</button>
      </form>
    </div>
  </div>
  

<?php include("../sections/footer.php"); ?>