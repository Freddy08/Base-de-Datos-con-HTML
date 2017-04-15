<!DOCTYPE HTML>
<html>
    <?php
        include_once 'conexion.php';
        if(isset($_GET['delete_id']))
        {
            $mysqli = new mysqli($hotsdb,$usuariodb,$clavedb,$basededatos);
            $sql_query="DELETE FROM peliculas WHERE id_pelicula=".$_GET['delete_id'];
            $resultado=$mysqli->query($sql_query);
            header("Location: $_SERVER[PHP_SELF]");
        }
    
        if(isset($_POST['btn-guardar']))
        {
            $id = $_POST['id_pelicula'];
            $nombrepelicula = $_POST['nombre'];
            $nombreautor = $_POST['nombre_autor'];
            $anocreacion = $_POST['ano_creacion'];
            $duracion = $_POST['duracion'];
            $sipnasis = $_POST['sipnasis'];
            $mysqli = new mysqli($hostdb,$usuariodb,$clavedb,$basededatos);
            $sql_query = "INSERT INTO peliculas VALUES('$id','$nombrepelicula','$nombreautor','$anocreacion','$duracion','$sipnasis')";
            if($resultado=$mysqli->query($sql_query))
            {
                ?>
                    <script type="text/javascript">
                        alert('Datos insertados');
                        window.location.href='index.php';
                    </script>
                <?php
            }
        }
    ?>
<head>
	<title>Peliculas</title>
	<meta charset="utf-8">
    <!---<link rel="stylesheet" type="text/css" href="css/style.css"/>*--->
    <script type="text/javascript">
    function editar_id(id)
    {
          if(confirm('¿Desea modificar?'))
          {
          	   window.location.href='index.php?edit_id='+id;
          }
    }
    
    function eliminar_id(id)
    {
        if(confirm('¿Desea eliminar?'))
        {
          	  window.location.href='index.php?delete_id='+id;
        }
    }
    </script>	
    <style>
        *{
            margin: 0;
        }
        #encabezado{
            height: 220px;
            text-align: center;
            background-image: url("../DatosPeliculas/images/cabecera.png");
            background-repeat:round;
            width: auto; 
        }

        .letras{
            background-color: #02223a;
            bottom: 0;
            color: rgba(255,255,255,0.9);
            display: block;
            font-weight: bold;
            opacity: 0.76;
            text-align: center;
            text-shadow: 1px 1px 1px #666;
            text-transform: uppercase;
            width: 100%;
            font-size: 70px;
        }

        /*diseño tabla*/
        table{
	       border: 2px solid black;
        }

        table, td, th {
            margin: 7px;
            padding: 2px;
        }
    </style>
</head>
<body style="background-color:#70b8ff">
    <div id="encabezado"> 
    </div>
    <p class="letras">Lista de  Peliculas</p>
	<section>
			<div>
				<table>
                <tr>
                    <th>ID</th>
					<th>Nombre de la pelicula</th>
                    <th>Nombre del autor</th>
                    <th>Año de creacion</th>
                    <th>Duración</th>
                    <th>Sipnasis</th>
                    <th colspan="2">OPCIONES</th>
				</tr>
                <?php
				    include_once 'conexion.php';
					$mysqli = new mysqli($hostdb,$usuariodb,$clavedb,$basededatos);
					if ($mysqli -> connect_errno) {
					die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno(). ") " . $mysqli -> mysqli_connect_error());			
					}else
					{
					    $sql_query="SELECT * FROM peliculas";
				        $resultado=$mysqli->query($sql_query);
						while($registro = $resultado->fetch_assoc()) 
						{
						?>
								<tr>
								<td><?php echo $registro["id_pelicula"]; ?></td>
								<td><?php echo $registro["nombre"]; ?></td>
                                <td><?php echo $registro["nombre_autor"]; ?></td>
                                <td><?php echo $registro["ano_creacion"]; ?></td>
                                <td><?php echo $registro["duracion"]; ?></td>
                                <td><?php echo $registro["sipnasis"]; ?></td>
                                <td><a href="javascript:editar_id('<?php echo $registro["id_pelicula"]; ?>')"><img src="../DatosPeliculas/images/Editar.png" align="EDIT" /></a></td>
								<td><a href="javascript:eliminar_id('<?php echo $registro["id_pelicula"]; ?>')"><img src="../DatosPeliculas/images/Cancelar.png" align="DELETE" /></a></td>                   
						<?php
						}
				    }
				 ?>
				</table>
            </div>
    </section>	
    <p class="letras">INGRESO DE PELICULAS</p>
    <section>
	<div>
		<header>
				<form method="post">
                <table class="demo">                          
                <tr>
                    <td>
                        <input type="text" name="id_pelicula" placeholder="Id" required/>
                        <input type="text" name="nombre" placeholder="Nombre de la pelicula" required />
                        <input type="text" name="nombre_autor" placeholder="Nombre del autor" required />
                        <input type="text" name="ano_creacion" placeholder="Año de estreno" required />
                        <input type="text" name="duracion" placeholder="Duracion de la pelicula" required />
                        <input type="text" name="sipnasis" placeholder="Sipnasis de la pelicula" required />
                    </td>
                </tr>
                <tr>
                        <td><button type="submit" name="btn-guardar"><strong>Guardar</strong></button></td>
                </tr>
                </table>
                </form>
        </header>									
    </div>
	</section>
	</body>
</html>