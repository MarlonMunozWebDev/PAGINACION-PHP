<?php
  include_once 'conexion.php';

  $sql = 'SELECT * FROM conceptos';
  $sentencia = $pdo->prepare($sql);
  $sentencia->execute();

  $resultado = $sentencia->fetchAll();
  //var_dump($resultado);

  //DEFINIENDO EL NUMERO DE PAGINACION Y CUANTOS ELEMENTOS POR CADA SECCION
  $conceptos_x_pagina = 3;

  //CONTAMOS CUANTOS FILAS TIENE NUESTRA TABLA
  $total_conceptos_db = $sentencia->rowCount();
  //echo $total_conceptos_db;

  //ESTABLECIENDO EL NUMERO DE PAGINAS SEGUN LAS FILAS OBTENIDAS
  $paginas = $total_conceptos_db/3;
  $paginas = ceil($paginas);
  echo $paginas;
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>PAGINACION</title>
  </head>
  <body class="bg-light">
    <div class="container my-5">
      <h1 class="mb-5">PRODUCTOS</h1>

      <?php //RECORREMOS EL ARRAY Y MOSTRAMOS UN ALERT POR CADA ELEMENTO ?>
      <?php foreach($resultado as $articulo): ?>
      <div class="alert alert-primary" role="alert">
        <?php echo$articulo['concepto']?>
      </div>
    <?php endforeach ?>

      <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item
            <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
              <?php //CHECA QUE PAGINA ESTA Y RESTALE UNO Y REDIRECCIONAME A EL RESULTADO ?>
              <a class="page-link" href="index.php?pagina=<?php  echo $_GET['pagina']-1 ?>">
                Anterior</a></li>

            <?php for($i=0;$i<$paginas;$i++): ?>

              <?php //SI GET-PAGINA = i COLOCALE LA CLASE ACTIVE Y SI NO SOLO
              ?>
            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
              <?php //GET - INDEX.PHP VA A COLOCAR UNA VARIABLE PAGINA SEGUN LA PAGINA EN LA QUE SE ENCUENTRE  ?>
              <a class="page-link" href="index.php?pagina=<?php echo$i+1 ?> ">
                <?php echo$i+1 ?></a>
            </li>
          <?php endfor ?>

            <li class="page-item
              <?php // SI LA PAGINA ES MAYOR O IGUAL AL NUMERO DE PAGINAS PINTA DESABILTADO SI NO NADA  ?>
              <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>">
              <a class="page-link"
              href="index.php?pagina=<?php  echo $_GET['pagina']+1 ?>">
              Siguiente</a>
            </li>
          </ul>
        </nav>
    </div>
  </body>
</html>
