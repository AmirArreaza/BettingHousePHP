<?php

/**
 * Telefono form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTelefonoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'Telefono'  => new sfWidgetFormInput(),
      'fkUsuario' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Telefono', 'column' => 'id', 'required' => false)),
      'Telefono'  => new sfValidatorInteger(),
      'fkUsuario' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'nick')),
    ));

    $this->widgetSchema->setNameFormat('telefono[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Telefono';
  }


}
