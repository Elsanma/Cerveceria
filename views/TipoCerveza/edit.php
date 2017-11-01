<h3>Editar Cerveza, ID: <?php echo $data['TipoCerveza']->id ?> </h3>
<form method="POST" action="<?php echo HOST_URL.'/TipoCerveza/update/'.$data['TipoCerveza']->id ?>">
  <table>
    <tr>
      <td><label for="editar_cerveza">ID</label></td>
      <td><input type="text" name="id" id="id" value="<?php echo $data['TipoCerveza']->id ?>" readonly></td>
    </tr>
    <tr>
      <td><label for="editar_cerveza">Nombre</label></td>
      <td><input type="text" name="nombre" id="nombre" value="<?php echo $data['TipoCerveza']->nombre ?>"></td>
    </tr>
    <tr>
      <td><label for="editar_cerveza">Descripcion</label></td>
      <td><input type="text" name="descripcion" id="descripcion" value="<?php echo $data['TipoCerveza']->descripcion ?>"></td>
    </tr>
    <tr>
      <td><label for="editar_cerveza">Precio/Litro</label></td>
      <td><input type="text" name="precio_litro" id="precio_litro" value="<?php echo $data['TipoCerveza']->precio_litro ?>"></td>
    </tr>
    <tr>
      <td><button type="submit">Aceptar</button></td>
      <td></td>
    </tr>
  </table>
</form>
