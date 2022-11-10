<?php
    include_once 'database.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    //RECEPCION DE LOS DATOS ENVIADOS MEDIANTE EL METODO POST DEL JS

    $Codigo_Producto = (isset($_POST['Codigo_Producto'])) ? $_POST['Codigo_Producto'] : '';
    $Nombre_Producto = (isset($_POST['Nombre_Producto'])) ? $_POST['Nombre_Producto'] : '';
    $Descripcion_Producto = (isset($_POST['Descripcion_Producto'])) ? $_POST['Descripcion_Producto'] : '';
    $Precio_Venta_Producto = (isset($_POST['Precio_Venta_Producto'])) ? $_POST['Precio_Venta_Producto'] : '';
    $Codigo_Categoria = (isset($_POST['Codigo_Categoria'])) ? $_POST['Codigo_Categoria'] : '';
    $Contenido_Producto = (isset($_POST['Contenido_Producto'])) ? $_POST['Contenido_Producto'] : '';
    $Codigo_Unidad_Medida = (isset($_POST['Codigo_Unidad_Medida'])) ? $_POST['Codigo_Unidad_Medida'] : '';

    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

    switch($opcion){
        case 1: //Nuevo
            $consulta = "INSERT INTO productos(Codigo_Producto,Nombre_Producto,Descripcion_Producto,Precio_Venta_Producto,Codigo_Categoria,Contenido_Producto,Codigo_Unidad_Medida) VALUES('$Codigo_Producto','$Nombre_Producto','$Descripcion_Producto','$Precio_Venta_Producto','$Codigo_Categoria','$Contenido_Producto','$Codigo_Unidad_Medida')";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $consulta = "SELECT Codigo_Producto,Nombre_Producto,Descripcion_Producto,Precio_Venta_Producto,Codigo_Categoria,Contenido_Producto,Codigo_Unidad_Medida FROM productos ORDER BY Codigo_Producto DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            console.log(data);
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //modificación
            $consulta = "UPDATE productos SET Codigo_Producto='$Codigo_Producto', Nombre_Producto='$Nombre_Producto', Descripcion_Producto='$Descripcion_Producto', Precio_Venta_Producto='$Precio_Venta_Producto',Codigo_Categoria='$Codigo_Categoria',Contenido_Producto='$Contenido_Producto',Codigo_Unidad_Medida='$Codigo_Unidad_Medida' WHERE Codigo_Producto='$Codigo_Producto' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT Codigo_Producto,Nombre_Producto,Descripcion_Producto,Precio_Venta_Producto,Codigo_Categoria,Contenido_Producto,Codigo_Unidad_Medida FROM productos WHERE Codigo_Producto='$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;        
        case 3://baja
            $consulta = "DELETE FROM productos WHERE Codigo_Producto = '$Codigo_Producto' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        

            break;        
    }
    
    print json_encode($data, JSON_UNESCAPED_UNICODE);//enviar el array final en formato json a JS
    $conexion = NULL;
?>