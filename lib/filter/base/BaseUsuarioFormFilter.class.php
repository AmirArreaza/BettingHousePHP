<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Usuario filter form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                => new sfWidgetFormFilterInput(),
      'apellido'              => new sfWidgetFormFilterInput(),
      'correo'                => new sfWidgetFormFilterInput(),
      'credito'               => new sfWidgetFormFilterInput(),
      'password'              => new sfWidgetFormFilterInput(),
      'estado'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fkLugar'               => new sfWidgetFormPropelChoice(array('model' => 'Lugar', 'add_empty' => true)),
      'usuarioformapago_list' => new sfWidgetFormPropelChoice(array('model' => 'Formapago', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'apellido'              => new sfValidatorPass(array('required' => false)),
      'correo'                => new sfValidatorPass(array('required' => false)),
      'credito'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'password'              => new sfValidatorPass(array('required' => false)),
      'estado'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fkLugar'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Lugar', 'column' => 'id')),
      'usuarioformapago_list' => new sfValidatorPropelChoice(array('model' => 'Formapago', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addUsuarioformapagoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(UsuarioformapagoPeer::FKUSUARIO, UsuarioPeer::NICK);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsuarioformapagoPeer::FKFORMAPAGO, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsuarioformapagoPeer::FKFORMAPAGO, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'nick'                  => 'Text',
      'nombre'                => 'Text',
      'apellido'              => 'Text',
      'correo'                => 'Text',
      'credito'               => 'Number',
      'password'              => 'Text',
      'estado'                => 'Boolean',
      'fkLugar'               => 'ForeignKey',
      'usuarioformapago_list' => 'ManyKey',
    );
  }
}
