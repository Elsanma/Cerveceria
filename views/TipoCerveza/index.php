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
        <h3>Clase 1 <a href="<?php HOST_URL; ?>TipoCerveza/create">[Agregar]</a></h3>
        <table class="">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>descripcion</th>
				<th>precio x litro</th>
				<th>Acciones</th>
			</thead>
		<tbody>
		  <?php
			foreach($data['classTipoCerveza'] as $tipoCerveza)
			{
				echo '<tr>';
				echo '<td>'.$tipoCerveza->id.'</td>';
				echo '<td>'.$tipoCerveza->nombre.'</td>';
				echo '<td>'.$tipoCerveza->descripcion.'</td>';
				echo '<td>'.$tipoCerveza->precio_litro.'</td>';
				echo '<td ><form action='.HOST_URL.'/TipoCerveza/edit/'.$tipoCerveza->id.'><button type="submit">Editar</button></form>';
				echo '<form action='.HOST_URL.'/TipoCerveza/delete/'.$tipoCerveza->id.'><button type="submit">Eliminar</button></form></td>';
				echo '</tr>';
			}
		  ?>
		</tbody>
	</table>
      </div>
</body>
</html>
