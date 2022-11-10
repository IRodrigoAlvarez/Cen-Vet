
<?php
  $conexion=mysqli_connect('localhost','root','','veterinaria');


  if(isset($_POST['boton_adM']))
  {
    $rut=$_POST['Rut_DM'];
    $nombre=$_POST['Name_M'];
    $codE=$_POST['cod_especie'];
    $codR=$_POST['cod_raza'];
    $codS=$_POST['cod_Sexo'];
    $date=$_POST['date_nacimiento'];
    $tamaño=$_POST['tamaño_mascota'];
    $peso=$_POST['peso_mascota'];

    $sql="INSERT INTO mascota(Rut_Cliente, Nombre, Codigo_Especie, Codigo_Raza, Codigo_Sexo, Fecha_Nacimiento_Mascota, Tamano_Mascota, Peso_Mascota)
     VALUES('$rut','$nombre','$codE','$codR','$codS','$date','$tamaño','$peso')";


    $conexion->query($sql);
    echo $conexion->error;

  }

  if(isset($_POST['boton_eliminar'])){

    $cod=$_POST['cod_mas'];

    $sql="DELETE FROM mascota WHERE Codigo_Mascota='$cod'";
    $conexion->query($sql);
    echo $conexion->error;
  }


?>


<body>

<div class="cont-producto">
    <h1 class="logo_h1">Masc<span>otas</span></h1>
    <div class="cont-ban-pro">
        
        <div class="cont-botones-pro">
            <i class="material-icons boton_ban">queue</i>  
            <a href="addMascota.php">AñadirMascota</a>
            
        </div>
    </div>
    <div class="cont-grid-producto">
        <table id="table_id" class="table">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Rut Cliente</th>
                        <th>Nombre Mascota</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Sexo</th>
                        <th>Fecha Nacimiento</th>
                        <th>Tamaño (Cm)</th>
                        <th>Peso (kg)</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT * FROM mascota";
                        $consulta=mysqli_query($conexion,$sql);
                        while ($fila=mysqli_fetch_array($consulta))
                        {  
                        ?>
                            <tr>
                                <td><?php echo $fila['Codigo_Mascota']?></td>
                                <td><?php echo $fila['Rut_Cliente']?></td>
                                <td><?php echo $fila['Nombre']?></td>
                                <td><?php
                                    $xd=$fila['Codigo_Especie'];
                                    $esp="SELECT * FROM especie WHERE Codigo_especie='$xd'";
                                    $cons=mysqli_query($conexion,$esp);
                                    while ($fil=mysqli_fetch_array($cons))
                                    {
                                        echo $fil['Nombre_Especie'];
                                    }
                                   
                                    
                                    
                                    ?></td>

                                <td>
                                    <?php 
                                        $xd=$fila['Codigo_Raza'];
                                        $esp="SELECT * FROM Raza WHERE Codigo_Raza='$xd'";
                                        $cons=mysqli_query($conexion,$esp);
                                        while ($fil=mysqli_fetch_array($cons))
                                        {
                                            echo $fil['Nombre_Raza'];
                                        }
                                   

                                    ?></td>
                                <td>
                                    <?php 
                                        $xd=$fila['Codigo_Sexo'];
                                        $esp="SELECT * FROM sexo WHERE Codigo_sexo='$xd'";
                                        $cons=mysqli_query($conexion,$esp);
                                        while ($fil=mysqli_fetch_array($cons))
                                        {
                                            echo $fil['Nombre_Sexo'];
                                        }
                                    ?></td>
                                <td><?php echo $fila['Fecha_Nacimiento_Mascota']?></td>
                                <td><?php echo $fila['Tamano_Mascota']?></td>
                                <td><?php echo $fila['Peso_Mascota']?></td>
                                <td>
                                    <form action="mascotas.php" method="post">
                                    <input type="hidden" name="cod_mas" value="<?php echo $fila['Codigo_Mascota']?>">
                                    <input type="submit" name="boton_eliminar" value="Borrar">
                                    </form>

                                </td>

                            </tr>

                    <?php
                        }
                    ?>
                </tbody>
            </table>
    </div>
</div>
<!-- Bootstrap y JQuery -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
</body>

</html>