<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Lugar filter form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseLugarFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'ciudad'      => new sfWidgetFormFilterInput(),
      'estado'      => new sfWidgetFormFilterInput(),
      'pais'        => new sfWidgetFormFilterInput(),
      'avenida'     => new sfWidgetFormFilterInput(),
      'calle'       => new sfWidgetFormFilterInput(),
      'casa'        => new sfWidgetFormFilterInput(),
      'edificio'    => new sfWidgetFormFilterInput(),
      'apartamento' => new sfWidgetFormFilterInput(),
      'expires_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'ciudad'      => new sfValidatorPass(array('required' => false)),
      'estado'      => new sfValidatorPass(array('required' => false)),
      'pais'        => new sfValidatorPass(array('required' => false)),
      'avenida'     => new sfValidatorPass(array('required' => false)),
      'calle'       => new sfValidatorPass(array('required' => false)),
      'casa'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'edificio'    => new sfValidatorPass(array('required' => false)),
      'apartamento' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'expires_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('lugar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lugar';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'ciudad'      => 'Text',
      'estado'      => 'Text',
      'pais'        => 'Text',
      'avenida'     => 'Text',
      'calle'       => 'Text',
      'casa'        => 'Number',
      'edificio'    => 'Text',
      'apartamento' => 'Number',
      'expires_at'  => 'Date',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
