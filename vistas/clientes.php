<?php

  $conexion=mysqli_connect('localhost','root','','veterinaria');
  
  if(isset($_POST['boton_adC']))
    {
        $rutP=$_POST['rut_Cliente'];
        $NombreP=$_POST['name_Cliente'];
        $apellidoP=$_POST['name2_Cliente'];
        $telefono=$_POST['telefono_Cliente'];
        $email=$_POST['email_Cliente'];
        $direccion=$_POST['direccion_Cliente'];

        $sql="INSERT INTO cliente VALUES ('$rutP','$NombreP','$apellidoP','$telefono','$email','$direccion')";
        $conexion->query($sql);
        echo $conexion->error;

    }


    if(isset($_POST['boton_eliminar'])){

        $rutC=$_POST['rutC'];
        $delete="DELETE FROM cliente WHERE Rut_Cliente='$rutC'";
        $conexion->query($delete);
        echo $conexion->error;
        
        
    }
?>

<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
<link rel="stylesheet" type="text/css" href="../css/dataTable.css">
<body>


<div class="cont-producto">
    <h1 class="logo_h1">Clie<span>ntes</span></h1>
    <div class="cont-ban-pro">
        
        <div class="cont-botones-pro">
            <i class="material-icons boton_ban">queue</i>  
            <a href="addcliente.php">Nuevo</a>
            
        </div>
    </div>
    <div class="cont-grid-producto">
        <table id="table_id" class="table">
            <thead>
                <tr>
                    
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Direccion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $consulta=mysqli_query($conexion,"select * from cliente");
                    while ($fila=mysqli_fetch_array($consulta)){
                        echo '<tr>';
                            
                            echo '<td>'.$fila['Rut_Cliente'].'</td>';
                            echo '<td>'.$fila['Nombre_Cliente'].'</td>';
                            echo '<td>'.$fila['Apellido_Cliente'].'</td>';
                            echo '<td>'.$fila['Telefono_Cliente'].'</td>';
                            echo '<td>'.$fila['Email_Cliente'].'</td>';
                            echo '<td>'.$fila['Direccion_Cliente'].'</td>';
                            echo '<td>

                            <form action="clientes.php" method="post">
                            <input type="hidden" name="rutC" value="'.$fila['Rut_Cliente'].'">
                            <input type="submit" name="boton_eliminar" value="Borrar">
                            </form>
                            
                            
                            
                            </td>';
                            
                    }?>
            </tbody>
        </table>
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