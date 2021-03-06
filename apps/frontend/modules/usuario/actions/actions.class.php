<?php

/**
 * usuario actions.
 *
 * @package    ProyectoCasaApuesta
 * @subpackage usuario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class usuarioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->usuario_list = UsuarioPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->usuario = UsuarioPeer::retrieveByPk($request->getParameter('nick'));
    $this->forward404Unless($this->usuario);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UsuarioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new UsuarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($usuario = UsuarioPeer::retrieveByPk($request->getParameter('nick')), sprintf('Object usuario does not exist (%s).', $request->getParameter('nick')));
    $this->form = new UsuarioForm($usuario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($usuario = UsuarioPeer::retrieveByPk($request->getParameter('nick')), sprintf('Object usuario does not exist (%s).', $request->getParameter('nick')));
    $this->form = new UsuarioForm($usuario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($usuario = UsuarioPeer::retrieveByPk($request->getParameter('nick')), sprintf('Object usuario does not exist (%s).', $request->getParameter('nick')));
    $usuario->delete();

    $this->redirect('usuario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $usuario = $form->save();

      $this->redirect('usuario/edit?nick='.$usuario->getNick());
    }
  }
}
