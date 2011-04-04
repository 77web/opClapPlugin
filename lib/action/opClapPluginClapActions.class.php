<?php

class opClapPluginClapActions extends sfActions
{
  public function executeRegist(sfWebRequest $request)
  {
    $this->form = new ClapForm();
    $this->form->bind($request->getParameter($this->form->getName()));
    if($this->form->isValid())
    {
      $clap = $this->form->save();
      $this->redirect($clap->getForeignUrl());
      return;
    }
    return sfView::ERROR;
  }
  
}