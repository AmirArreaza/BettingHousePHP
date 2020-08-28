<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Deposito filter form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDepositoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'monto'       => new sfWidgetFormFilterInput(),
      'fecha'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fkFormaPago' => new sfWidgetFormPropelChoice(array('model' => 'Formapago', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'monto'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fecha'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fkFormaPago' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Formapago', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('deposito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Deposito';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'monto'       => 'Number',
      'fecha'       => 'Date',
      'fkFormaPago' => 'ForeignKey',
    );
  }
}
