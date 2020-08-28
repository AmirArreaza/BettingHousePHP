<table>
  <tbody>
    <tr>
      <th>Nick:</th>
      <td><?php echo $usuario->getNick() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $usuario->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $usuario->getApellido() ?></td>
    </tr>
    <tr>
      <th>Correo:</th>
      <td><?php echo $usuario->getCorreo() ?></td>
    </tr>
    <tr>
      <th>Credito:</th>
      <td><?php echo $usuario->getCredito() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $usuario->getPassword() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $usuario->getEstado() ?></td>
    </tr>
    <tr>
      
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('usuario/edit?nick='.$usuario->getNick()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('usuario/index') ?>">List</a>
