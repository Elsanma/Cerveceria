<h3>Pedido<a href="<?php HOST_URL; ?>Pedido/create">[Agregar]</a></h3>
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
  <!-- Aca empieza el encabezado con la imagen de fondo -->
    <header class="" id="home">
      <div class="" style="">


      </div>

    </header>
    <!-- Aca termina el encabezado con la imagen de fondo -->
<table class="">
	<thead>
		<th>Id Pedido</th>
		<th>Cantidad</th>
		<th>Importe</th>
		<th>Columna C</th>

	</thead>
	<tbody>
	  <?php
		foreach($data['ClassPedido'] as $class1)
		{
			echo '<tr>';
			echo '<td>'.$class1->id.'</td>';
			foreach ($class1->lineaPedido['ClassLineaPedido'] as $class2)
			{?>

				<table><?php
					echo '<td>'.$class2->nombre.'</td>';
					echo '<td>'.$class2->cantidad.'</td>';
					echo '<td>'.$class2->importe.'</td>';?>
				</table>
				<?php
			}
			echo '<td ><form action='.HOST_URL.'/class1/edit/'.$class1->id.'><button type="submit">Editar</button></form>';
			echo '<form action='.HOST_URL.'/class1/delete/'.$class1->id.'><button type="submit">Eliminar</button></form></td>';
			echo '</tr>';
		}
	  ?>
	</tbody>
</table>
