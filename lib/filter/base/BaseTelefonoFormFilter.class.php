<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Telefono filter form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTelefonoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Telefono'  => new sfWidgetFormFilterInput(),
      'fkUsuario' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'Telefono'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fkUsuario' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'nick')),
    ));

    $this->widgetSchema->setNameFormat('telefono_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Telefono';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'Telefono'  => 'Number',
      'fkUsuario' => 'ForeignKey',
    );
  }
}
