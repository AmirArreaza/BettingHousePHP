<?php

/**
 * Formapago form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseFormapagoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'metodoPago'            => new sfWidgetFormInput(),
      'estado'                => new sfWidgetFormInputCheckbox(),
      'montoMax'              => new sfWidgetFormInput(),
      'usuarioformapago_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Usuario')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Formapago', 'column' => 'id', 'required' => false)),
      'metodoPago'            => new sfValidatorString(array('max_length' => 255)),
      'estado'                => new sfValidatorBoolean(),
      'montoMax'              => new sfValidatorNumber(),
      'usuarioformapago_list' => new sfValidatorPropelChoiceMany(array('model' => 'Usuario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('formapago[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Formapago';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['usuarioformapago_list']))
    {
      $values = array();
      foreach ($this->object->getUsuarioformapagos() as $obj)
      {
        $values[] = $obj->getFkusuario();
      }

      $this->setDefault('usuarioformapago_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveUsuarioformapagoList($con);
  }

  public function saveUsuarioformapagoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['usuarioformapago_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(UsuarioformapagoPeer::FKFORMAPAGO, $this->object->getPrimaryKey());
    UsuarioformapagoPeer::doDelete($c, $con);

    $values = $this->getValue('usuarioformapago_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Usuarioformapago();
        $obj->setFkformapago($this->object->getPrimaryKey());
        $obj->setFkusuario($value);
        $obj->save();
      }
    }
  }

}
