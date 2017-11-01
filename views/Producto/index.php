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
        <h3>Productos <a href="<?php HOST_URL; ?>Producto/create">[Agregar]</a></h3>
        <table class="">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Capacidad</th>
				<th>Acciones</th>
			</thead>
			<tbody>
	  		<?php
				foreach($data['classProducto'] as $producto)
				{
					echo '<tr>';
					echo '<td>'.$producto->id.'</td>';
					echo '<td>'.$producto->nombre.'</td>';
					echo '<td>'.$producto->capacidad.'</td>';
					echo '<td ><form action='.HOST_URL.'/Producto/edit/'.$producto->id.'><button type="submit">Editar</button></form>';
					echo '<form action='.HOST_URL.'/Producto/delete/'.$producto->id.'><button type="submit">Eliminar</button></form></td>';
					echo '</tr>';
				}
		  		?>
			</tbody>
		</table>
      </div>
</body>
</html>
