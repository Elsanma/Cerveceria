<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type=text/css href="css/style.css">
    <style>
          section {
              width: 100%;
              height: 100vh;
              position: relative;
          }
          form {
            width: 300px;
            height: 120px;
            position: absolute;
            margin: auto;
            top: 0;
            bottom: 350;
            left: 0;
            right: 1000;
          }
          input {
              width: 100%;
              margin-bottom: 10px;
              padding: 5px;
              box-sizing: border-box;
          }
        </style>
</head>
<body>
      <div class="" style="">
        <h3>Clase 1 <a href="<?php HOST_URL; ?>class1/create">[Agregar]</a></h3>
        <table class="">
	<thead>
		<th>Id</th>
		<th>Columna A</th>
		<th>Columna B</th>
		<th>Columna C</th>
		<th>Acciones</th>
	</thead>
	<tbody>
	  <?php
		foreach($data['class1'] as $class1)
		{
			echo '<tr>';
			echo '<td>'.$class1->id.'</td>';
			echo '<td>'.$class1->columnaA.'</td>';
			echo '<td>'.$class1->columnaB.'</td>';
			echo '<td>'.$class1->columnaC.'</td>';
			echo '<td><form action='.HOST_URL.'/class1/edit/'.$class1->id.'><button type="submit">Editar</button></form></td>';
			echo '<td><form action='.HOST_URL.'/class1/delete/'.$class1->id.'><button type="submit">Eliminar</button></form></td>';
			echo '</tr>';
		}
	  ?>
	</tbody>
</table>
      </div>

</body>
</html>
