<?php

/**
 * Evento form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEventoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'nombre'            => new sfWidgetFormInput(),
      'fechaIni'          => new sfWidgetFormDate(),
      'horaIni'           => new sfWidgetFormTime(),
      'resultado'         => new sfWidgetFormInput(),
      'fkCategoria'       => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => false)),
      'equipoevento_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Equipo')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Evento', 'column' => 'id', 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 255)),
      'fechaIni'          => new sfValidatorDate(),
      'horaIni'           => new sfValidatorTime(),
      'resultado'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fkCategoria'       => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id')),
      'equipoevento_list' => new sfValidatorPropelChoiceMany(array('model' => 'Equipo', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('evento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Evento';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['equipoevento_list']))
    {
      $values = array();
      foreach ($this->object->getEquipoeventos() as $obj)
      {
        $values[] = $obj->getFkequipo();
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
    $c->add(EquipoeventoPeer::FKEVENTO, $this->object->getPrimaryKey());
    EquipoeventoPeer::doDelete($c, $con);

    $values = $this->getValue('equipoevento_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Equipoevento();
        $obj->setFkevento($this->object->getPrimaryKey());
        $obj->setFkequipo($value);
        $obj->save();
      }
    }
  }

}
