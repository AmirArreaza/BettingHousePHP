<?php

/**
 * Equipo form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEquipoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'nombre'            => new sfWidgetFormInput(),
      'nivel'             => new sfWidgetFormInput(),
      'equipoevento_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Evento')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Equipo', 'column' => 'id', 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 255)),
      'nivel'             => new sfValidatorInteger(),
      'equipoevento_list' => new sfValidatorPropelChoiceMany(array('model' => 'Evento', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipo';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['equipoevento_list']))
    {
      $values = array();
      foreach ($this->object->getEquipoeventos() as $obj)
      {
        $values[] = $obj->getFkevento();
      }

      $this->setDefault('equipoevento_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveEquipoeventoList($con);
  }

  public function saveEquipoeventoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['equipoevento_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(EquipoeventoPeer::FKEQUIPO, $this->object->getPrimaryKey());
    EquipoeventoPeer::doDelete($c, $con);

    $values = $this->getValue('equipoevento_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Equipoevento();
        $obj->setFkequipo($this->object->getPrimaryKey());
        $obj->setFkevento($value);
        $obj->save();
      }
    }
  }

}
