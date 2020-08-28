<?php

/**
 * Equipoevento form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEquipoeventoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fkEquipo' => new sfWidgetFormInputHidden(),
      'fkEvento' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'fkEquipo' => new sfValidatorPropelChoice(array('model' => 'Equipo', 'column' => 'id', 'required' => false)),
      'fkEvento' => new sfValidatorPropelChoice(array('model' => 'Evento', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipoevento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipoevento';
  }


}
