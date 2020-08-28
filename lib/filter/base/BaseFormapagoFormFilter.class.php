<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Formapago filter form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseFormapagoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'metodoPago'            => new sfWidgetFormFilterInput(),
      'estado'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'montoMax'              => new sfWidgetFormFilterInput(),
      'usuarioformapago_list' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'metodoPago'            => new sfValidatorPass(array('required' => false)),
      'estado'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'montoMax'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'usuarioformapago_list' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('formapago_filters[%s]');

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

    $criteria->addJoin(UsuarioformapagoPeer::FKFORMAPAGO, FormapagoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsuarioformapagoPeer::FKUSUARIO, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsuarioformapagoPeer::FKUSUARIO, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Formapago';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'metodoPago'            => 'Text',
      'estado'                => 'Boolean',
      'montoMax'              => 'Number',
      'usuarioformapago_list' => 'ManyKey',
    );
  }
}
