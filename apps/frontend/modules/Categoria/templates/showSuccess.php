<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $categoria->getId() ?></td>
      <th>Nombrecategoria:</th>
      <td><?php echo $categoria->getNombrecategoria() ?></td>
    </tr>
  </tbody>
</table>
<hr />
<a href="<?php echo url_for('Categoria/edit?id='.$categoria->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('Categoria/index') ?>">List</a>
