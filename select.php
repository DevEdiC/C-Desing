
                //Iteraciones para los select
<?php
$query_genero = "SELECT * FROM tipo_genero ORDER BY genero ASC";
$genero = mysqli_query($conectar, $query_genero);
$row_genero = mysqli_fetch_assoc($genero);

?>
                
<select class="form-control" required="required" name="id_genero">
  <option value="">Seleccione su genero</option>
  <?php do{ ?>
  <option value="<?php echo $row_genero['id'] ?>"><?php echo $row_genero['genero'] ?></option>
  <?php }while($row_genero = mysqli_fetch_assoc($genero)) ?>
</select>