<?php

/**
 * Lugar form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseLugarForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'ciudad'      => new sfWidgetFormInput(),
      'estado'      => new sfWidgetFormInput(),
      'pais'        => new sfWidgetFormInput(),
      'avenida'     => new sfWidgetFormInput(),
      'calle'       => new sfWidgetFormInput(),
      'casa'        => new sfWidgetFormInput(),
      'edificio'    => new sfWidgetFormInput(),
      'apartamento' => new sfWidgetFormInput(),
      'expires_at'  => new sfWidgetFormDateTime(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Lugar', 'column' => 'id', 'required' => false)),
      'ciudad'      => new sfValidatorString(array('max_length' => 255)),
      'estado'      => new sfValidatorString(array('max_length' => 255)),
      'pais'        => new sfValidatorString(array('max_length' => 255)),
      'avenida'     => new sfValidatorString(array('max_length' => 255)),
      'calle'       => new sfValidatorString(array('max_length' => 255)),
      'casa'        => new sfValidatorInteger(array('required' => false)),
      'edificio'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apartamento' => new sfValidatorInteger(array('required' => false)),
      'expires_at'  => new sfValidatorDateTime(),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lugar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lugar';
  }


}
