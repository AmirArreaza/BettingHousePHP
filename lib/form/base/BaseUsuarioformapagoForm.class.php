<?php

/**
 * Usuarioformapago form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUsuarioformapagoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fkUsuario'   => new sfWidgetFormInputHidden(),
      'fkFormaPago' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'fkUsuario'   => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'nick', 'required' => false)),
      'fkFormaPago' => new sfValidatorPropelChoice(array('model' => 'Formapago', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuarioformapago[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuarioformapago';
  }


}
