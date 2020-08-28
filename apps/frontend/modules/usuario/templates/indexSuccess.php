<h1>Usuario List</h1>

<table>
  <thead>
    <tr>
      <th>Nick</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Correo</th>
      <th>Credito</th>
      <th>Password</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuario_list as $usuario): ?>
    <tr>
      <td><a href="<?php echo url_for('usuario/show?nick='.$usuario->getNick()) ?>"><?php echo $usuario->getNick() ?></a></td>
      <td><?php echo $usuario->getNombre() ?></td>
      <td><?php echo $usuario->getApellido() ?></td>
      <td><?php echo $usuario->getCorreo() ?></td>
      <td><?php echo $usuario->getCredito() ?></td>
      <td><?php echo $usuario->getPassword() ?></td>
      <td><?php echo $usuario->getEstado() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('usuario/new') ?>">New</a>
