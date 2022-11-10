<link rel="stylesheet" href="css/style.css">
<body class="bodyventa">
    <div class="content">
        <h1 class="logo_h1">Ingreso de Clientes</h1>
        <div class="contact-wrapper">
            <h3>Añadir cliente</h3>
            <center>

            <form action="clientes.php" method="POST">
                <label >Rut Cliente:</label>
                <input type="text" name="rut_Cliente" placeholder="Ingrese rut Cliente"><br>

                <label >Nombre Cliente:</label>
                <input type="text" name="name_Cliente" placeholder="Ingrese nombre Cliente"><br>

                <label >Apellido Cliente:</label>
                <input type="text" name="name2_Cliente" placeholder="Ingrese Apellido Cliente"><br>

                <label >Telefono Cliente:</label>
                <input type="text" name="telefono_Cliente" placeholder="Telefono Cliente"><br>

                <label >Email Cliente:</label>
                <input type="text" name="email_Cliente" placeholder="Ingrese email Cliente"><br>

                <label >Direccion Cliente:</label>
                <input type="text" name="direccion_Cliente" placeholder="Ingrese dirección Cliente"><br>

                

                <input type="submit" name="boton_adC" value="<AÑADIR>">
            
            </form></center>
            </div>
    </div>

</body>