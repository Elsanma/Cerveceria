<h3>Editar Producto, ID: <?php echo $data['Producto']->id ?> </h3>
<form method="POST" action="<?php echo HOST_URL.'/Producto/update/'.$data['Producto']->id ?>">
  <table>
    <tr>
      <td><label for="editar_producto">ID</label></td>
      <td><input type="text" name="id" id="id" value="<?php echo $data['Producto']->id ?>" readonly></td>
    </tr>
    <tr>
      <td><label for="editar_producto">Nombre</label></td>
      <td><input type="text" name="nombre" id="nombre" value="<?php echo $data['Producto']->nombre ?>"></td>
    </tr>
    <tr>
      <td><label for="editar_producto">Capacidad</label></td>
      <td><input type="text" name="capacidad" id="capacidad" value="<?php echo $data['Producto']->capacidad ?>"></td>
    </tr>
    <tr>
      <td><button type="submit">Aceptar</button></td>
      <td></td>
    </tr>
  </table>
</form>