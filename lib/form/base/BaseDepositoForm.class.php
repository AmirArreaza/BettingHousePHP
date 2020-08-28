<?php

/**
 * Deposito form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDepositoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'monto'       => new sfWidgetFormInput(),
      'fecha'       => new sfWidgetFormDate(),
      'fkFormaPago' => new sfWidgetFormPropelChoice(array('model' => 'Formapago', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Deposito', 'column' => 'id', 'required' => false)),
      'monto'       => new sfValidatorNumber(),
      'fecha'       => new sfValidatorDate(),
      'fkFormaPago' => new sfValidatorPropelChoice(array('model' => 'Formapago', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('deposito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Deposito';
  }


}
