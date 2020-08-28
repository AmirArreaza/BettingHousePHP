<?php include_stylesheets_for_form($form) ?>
<?php include_stylesheets() ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('Categoria/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post"
<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <a href="<?php echo url_for('Categoria/index') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            <?php echo link_to('Delete', 'Categoria/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input id="searchsubmit" type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
