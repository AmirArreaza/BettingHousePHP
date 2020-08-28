<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Apuesta filter form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseApuestaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'monto'     => new sfWidgetFormFilterInput(),
      'fkUsuario' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fkEvento'  => new sfWidgetFormPropelChoice(array('model' => 'Evento', 'add_empty' => true)),
      'fkEquipo'  => new sfWidgetFormPropelChoice(array('model' => 'Equipo', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'monto'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fkUsuario' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'nick')),
      'fkEvento'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Evento', 'column' => 'id')),
      'fkEquipo'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Equipo', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('apuesta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Apuesta';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'monto'     => 'Number',
      'fkUsuario' => 'ForeignKey',
      'fkEvento'  => 'ForeignKey',
      'fkEquipo'  => 'ForeignKey',
    );
  }
}
