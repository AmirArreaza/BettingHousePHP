<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Equipo filter form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEquipoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'            => new sfWidgetFormFilterInput(),
      'nivel'             => new sfWidgetFormFilterInput(),
      'equipoevento_list' => new sfWidgetFormPropelChoice(array('model' => 'Evento', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'nivel'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'equipoevento_list' => new sfValidatorPropelChoice(array('model' => 'Evento', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addEquipoeventoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(EquipoeventoPeer::FKEQUIPO, EquipoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EquipoeventoPeer::FKEVENTO, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EquipoeventoPeer::FKEVENTO, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Equipo';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'nombre'            => 'Text',
      'nivel'             => 'Number',
      'equipoevento_list' => 'ManyKey',
    );
  }
}
