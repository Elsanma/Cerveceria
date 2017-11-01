<h3>Editar Clase 1, ID: <?php echo $data['class1']->id ?> </h3>
<form method="POST" action="<?php echo HOST_URL.'/class1/update/'.$data['class1']->id ?>">
  <table>
    <tr>
      <td><label for="columna1">ID</label></td>
      <td><input type="text" name="id" id="id" value="<?php echo $data['class1']->id ?>" readonly></td>
    </tr>
    <tr>
      <td><label for="columna1">Columna 1</label></td>
      <td><input type="text" name="columnaA" id="columnaA" value="<?php echo $data['class1']->columnaA ?>"></td>
    </tr>
    <tr>
      <td><label for="columna1">Columna 1</label></td>
      <td><input type="text" name="columnaB" id="columnaB" value="<?php echo $data['class1']->columnaB ?>"></td>
    </tr>
    <tr>
      <td><label for="columna1">Columna 3</label></td>
      <td><input type="text" name="columnaC" id="columnaC" value="<?php echo $data['class1']->columnaC ?>"></td>
    </tr>
    <tr>
      <td><button type="submit">Aceptar</button></td>
      <td></td>
    </tr>
  </table>
</form>
