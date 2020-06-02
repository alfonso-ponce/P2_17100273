<?php
// Paso 1 Conectarnos al servidor
$link = new mysqli('localhost','root','123','WEBVENTAS');
if($link -> connect_errno)
{
    echo 'no se pudo establecer conexcion con el servidor:';
    exit();
}
else
{
        //paso 2 hacer la sentencia sql y ejecutarla
        $sql = 'SELECT * FROM aguasweb';
         $ejecuta_sentencia = mysqli_query($link,$sql);
         if(!$ejecuta_sentencia)
         {
             echo 'hay un error en la sentencia de sql' . $sql();
         }
         else
         {
             //paso 3 traer los datos en forma de un array para poder imprimirlos en pantalla

             $lista_Aguas = mysqli_fetch_array($ejecuta_sentencia);
         }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mostrar Datos</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <h1>Mostrar Datos De Una Base De Datos</h1>
        <h2>Tabla De Aguas</h2>
        <table>
            <tr>
                <th>IdAgua</th>
                <?php
                  for($i=0;$i < $lista_Aguas; $i++)
                  {
                      echo "<tr>";
                          echo "<td>";
                          echo $lista_Aguas['IdAgua'];
                          echo "</td>";

                          echo "<td>";
                          echo $lista_Aguas['Sabor'];
                          echo "</td>";
                      echo "</tr>";
                    $lista_Aguas = mysqli_fetch_array($ejecuta_sentencia); 
                  }
                ?>
            </tr>
        </table>
    </body>
</html>