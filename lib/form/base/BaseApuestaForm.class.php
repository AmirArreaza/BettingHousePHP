<?php

/**
 * Apuesta form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseApuestaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'monto'     => new sfWidgetFormInput(),
      'fkUsuario' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
      'fkEvento'  => new sfWidgetFormPropelChoice(array('model' => 'Evento', 'add_empty' => false)),
      'fkEquipo'  => new sfWidgetFormPropelChoice(array('model' => 'Equipo', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Apuesta', 'column' => 'id', 'required' => false)),
      'monto'     => new sfValidatorNumber(),
      'fkUsuario' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'nick')),
      'fkEvento'  => new sfValidatorPropelChoice(array('model' => 'Evento', 'column' => 'id')),
      'fkEquipo'  => new sfValidatorPropelChoice(array('model' => 'Equipo', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('apuesta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Apuesta';
  }


}
