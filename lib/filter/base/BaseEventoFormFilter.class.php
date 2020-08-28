<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Evento filter form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEventoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'            => new sfWidgetFormFilterInput(),
      'fechaIni'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'horaIni'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'resultado'         => new sfWidgetFormFilterInput(),
      'fkCategoria'       => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => true)),
      'equipoevento_list' => new sfWidgetFormPropelChoice(array('model' => 'Equipo', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'fechaIni'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'horaIni'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'resultado'         => new sfValidatorPass(array('required' => false)),
      'fkCategoria'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categoria', 'column' => 'id')),
      'equipoevento_list' => new sfValidatorPropelChoice(array('model' => 'Equipo', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('evento_filters[%s]');

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

    $criteria->addJoin(EquipoeventoPeer::FKEVENTO, EventoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EquipoeventoPeer::FKEQUIPO, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EquipoeventoPeer::FKEQUIPO, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Evento';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'nombre'            => 'Text',
      'fechaIni'          => 'Date',
      'horaIni'           => 'Date',
      'resultado'         => 'Text',
      'fkCategoria'       => 'ForeignKey',
      'equipoevento_list' => 'ManyKey',
    );
  }
}
