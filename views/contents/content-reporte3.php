<style>
  body {
    font-family: Arial, sans-serif;
    margin: 20px;
  }

  .reporte-titulo {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
  }

  th, td {
    border: 1px solid #333;
    padding: 8px;
    text-align: center;
  }

  thead th {
    background-color: #f0f0f0;
    font-weight: bold;
  }

  tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }
</style>

<div class="reporte-titulo">
  Reporte de Mascotas Registradas
</div>

<table>
  <thead>
    <colgroup>
      <col style="width: 10%;">
      <col style="width: 20%;">
      <col style="width: 10%;">
      <col style="width: 17%;">
      <col style="width: 13%;">
      <col style="width: 30%;">
    </colgroup>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Tipo</th>
      <th>Color</th>
      <th>Género</th>
      <th>Propietario</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($listaMascotas)): ?>
      <?php foreach ($listaMascotas as $mascota): ?>
        <tr>
          <td><?php echo $mascota['idmascota']; ?></td>
          <td><?php echo htmlspecialchars($mascota['nombre']); ?></td>
          <td><?php echo htmlspecialchars($mascota['tipo']); ?></td>
          <td><?php echo htmlspecialchars($mascota['color']); ?></td>
          <td><?php echo strtoupper($mascota['genero']); ?></td>
          <td><?php echo htmlspecialchars($mascota['propietario']); ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="6">No hay mascotas registradas</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<div style="text-align: center; margin-top: 20px; font-size: 10px;">
  Reporte generado el <?php echo date('d/m/Y H:i:s'); ?>
</div>