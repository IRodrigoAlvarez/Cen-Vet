<?php
    $conexion=mysqli_connect('localhost','root','','veterinaria');
?>

<link rel="stylesheet" href="css/style.css">
<body class="bodyventa">
    <div class="content">
        <h1 class="logo_h1">Ingreso de Mascotas</h1>
        <div class="contact-wrapper">
            <h3>Añadir mascota</h3>
            <center>

            <form action="mascotas.php" method="POST">

                <label>Rut Cliente</label>
                <input type="text" name="Rut_DM" placeholder="Ingrese Rut Cliente"><br>

                <label>Nombre Mascota</label>
                <input type="text" name="Name_M" placeholder="Ingrese Nombre Mascota"><br>

                <label>Tamaño mascota en CM:</label>
                <input type="text" name="tamaño_mascota" placeholder="Tamaño Mascota..."><br>

                <label>Peso mascota en Kg:</label>
                <input type="number" name="peso_mascota" placeholder="Peso Mascota..."><br>

                Especie:<select name="cod_especie">
                <?php
                   $sql="select * from especie";
                   $res=mysqli_query($conexion,$sql);
                   while($fila=mysqli_fetch_array($res)){
                       echo "<option value='".$fila['Codigo_Especie']."'>".$fila['Nombre_Especie']."</option>";
                   }
                ?>
                </select><br>

                Raza:<select name="cod_raza">
                <?php
                   $sql="select * from Raza";
                   $res=mysqli_query($conexion,$sql);
                   while($fila=mysqli_fetch_array($res)){
                       echo "<option value='".$fila['Codigo_Raza']."'>".$fila['Nombre_Raza']."</option>";
                   }
                ?>
                </select><br>

                Sexo:<select name="cod_Sexo">
                <?php
                   $sql="select * from Sexo";
                   $res=mysqli_query($conexion,$sql);
                   while($fila=mysqli_fetch_array($res)){
                       echo "<option value='".$fila['Codigo_Sexo']."'>".$fila['Nombre_Sexo']."</option>";
                   }
                ?>
                </select><br>
                <label>Fecha de nacimiento:</label>
                <input type="date"  name="date_nacimiento"><br>

                
                    
                   
            
                <input type="submit" name="boton_adM" value="<AÑADIR>">
            
            </form></center>
            </div>
    </div>

</body>