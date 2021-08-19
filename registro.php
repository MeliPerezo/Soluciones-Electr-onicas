<html>
<head>
  <title>Consulta a la base de datos</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">

    <center><h1>Consulta a la base de datos</h1></center>

    <form method="POST" action="registro.php" >

    <div class="form-group">
      <label for="fecha">Fecha</label>
      <input type="date" name="fecha" class="form-control" id="fecha">
  </div>

  <div class="form-group">
      <label for="numero">Numero de tarifa de categoria</label>
      <input type="number" name="numero" class="form-control" id="numero" >
  </div>

   <div class="form-group">
      <label for="descripcion">Descripcion</label>
      <input type="text" name="descripcion" class="form-control" id="descripcion">
  </div>

  <div class="form-group">
      <label for="relacionado">Relacionado</label>
      <input type="number" name="relacionado" class="form-control" id="relacionado">
  </div>
    
    <center>
      <input type="submit" value="Enviar" class="btn btn-success" name="btn1">
      <input type="submit" value="Consultar" class="btn btn-info" name="btn2">
    </center>

  </form>



  <?php

    if(isset($_POST['btn1']))
    {
      include("abrir_conexion.php");

      $doc = $_POST['doc'];
      $nombre = $_POST['nombre'];
      $dir = $_POST['dir'];
      $tel = $_POST['tel'];

      mysqli_query($conexion, "INSERT INTO $tabla_db1 (doc,nombre,direccion,telefono) values ('$doc','$nombre','$dir','$tel')");
      //La variable $Conexion viene del archivo "Abrir_Conexion", la cual nos conectara a la base de datos
      //y de paso hacemos el registro de datos.
      
      include("cerrar_conexion.php");
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
      include("abrir_conexion.php");

        $doc = $_POST['fecha'];
        if($doc=="") //VERIFICO QUE AGREGEN UN DOCUMENTO OBLIGATORIAMENTE.
          {echo "Digita un documento por favor. (Ej: 123)";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE Fecha = $fecha");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Documento</center></b></td>
                  <td><b><center>Nombre</center></b></td>
                  <td><b><center>Direccion</center></b></td>
                  <td><b><center>Telefono</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['Fecha']."</td>
                  <td>".$consulta['Numero_de_tarifa_de_categoria']."</td>
                  <td>".$consulta['Descripcion']."</td>
                  <td>".$consulta['Relacionado']."</td>
                </tr>
              </table>
            ";
          }
        }

      include("cerrar_conexion.php");
    }
  ?>



  </div>
  <div class="col-md-4"></div>
</div>
  
</body>
</html>