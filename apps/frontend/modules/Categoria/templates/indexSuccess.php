<h1>Lista de categorias</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre Categoria</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categoria_list as $categoria): ?>
    <tr>
      <td><a href="<?php echo url_for('Categoria/show?id='.$categoria->getId()) ?>">
      <?php echo $categoria->getId() ?></a></td>
      <td><?php echo $categoria->getNombrecategoria() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('Categoria/new') ?>">Crear nueva categoria</a>
