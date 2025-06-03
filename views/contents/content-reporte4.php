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
  Reporte de Propietarios Registrados
</div>

<table>
  <thead>
    <colgroup>
      <col style="width: 10%;">
      <col style="width: 50%;">
      <col style="width: 40%;">
    </colgroup>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellido</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($listaPropietarios)): ?>
      <?php foreach ($listaPropietarios as $Propietario): ?>
        <tr>
          <td><?php echo $Propietario['idpropietario']; ?></td>
          <td><?php echo htmlspecialchars($Propietario['nombres']); ?></td>
          <td><?php echo htmlspecialchars($Propietario['apellidos']); ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="6">No hay propietarios registrados</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<div style="text-align: center; margin-top: 20px; font-size: 10px;">
  Reporte generado el <?php echo date('d/m/Y H:i:s'); ?>
</div>