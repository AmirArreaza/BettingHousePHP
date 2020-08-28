<?php

/**
 * Usuario form base class.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nick'                  => new sfWidgetFormInputHidden(),
      'nombre'                => new sfWidgetFormInput(),
      'apellido'              => new sfWidgetFormInput(),
      'correo'                => new sfWidgetFormInput(),
      'credito'               => new sfWidgetFormInput(),
      'password'              => new sfWidgetFormInput(),
      'estado'                => new sfWidgetFormInputCheckbox(),
      'fkLugar'               => new sfWidgetFormPropelChoice(array('model' => 'Lugar', 'add_empty' => false)),
      'usuarioformapago_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Formapago')),
    ));

    $this->setValidators(array(
      'nick'                  => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'nick', 'required' => false)),
      'nombre'                => new sfValidatorString(array('max_length' => 255)),
      'apellido'              => new sfValidatorString(array('max_length' => 255)),
      'correo'                => new sfValidatorString(array('max_length' => 255)),
      'credito'               => new sfValidatorNumber(),
      'password'              => new sfValidatorString(array('max_length' => 255)),
      'estado'                => new sfValidatorBoolean(),
      'fkLugar'               => new sfValidatorPropelChoice(array('model' => 'Lugar', 'column' => 'id')),
      'usuarioformapago_list' => new sfValidatorPropelChoiceMany(array('model' => 'Formapago', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['usuarioformapago_list']))
    {
      $values = array();
      foreach ($this->object->getUsuarioformapagos() as $obj)
      {
        $values[] = $obj->getFkformapago();
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
    $c->add(UsuarioformapagoPeer::FKUSUARIO, $this->object->getPrimaryKey());
    UsuarioformapagoPeer::doDelete($c, $con);

    $values = $this->getValue('usuarioformapago_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Usuarioformapago();
        $obj->setFkusuario($this->object->getPrimaryKey());
        $obj->setFkformapago($value);
        $obj->save();
      }
    }
  }

}
