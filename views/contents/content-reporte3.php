<style>
  table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid rgb(8, 8, 8);

  }
  td,th{
    border: .5px solid rgb(8, 8, 8);
    padding: 8px;
  }
  thead th {
    background-color:rgb(87, 79, 201);
  }
</style>
<div>
  <table>
    <colgroup>
      <col style="width: 10%;">
      <col style="width: 30%;">
      <col style="width: 20%;">
      <col style="width: 20%;">
      <col style="width: 10%;">
      <col style="width: 10%;">
    </colgroup>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre Mascota</th>
        <th>Tipo</th>
        <th>Color</th>
        <th>Género</th>
        <th>Propietario</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listaMascotas as $mascota): ?>
        <tr>
          <td><?php echo $mascota['id']; ?></td>
          <td><?php echo $mascota['nombre']; ?></td>
          <td><?php echo $mascota['tipo']; ?></td>
          <td><?php echo $mascota['color']; ?></td>
          <td><?php echo $mascota['genero']; ?></td>
          <td><?php echo $mascota['propietario']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>