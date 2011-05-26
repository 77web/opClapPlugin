<?php

class opClapPluginClapActions extends sfActions
{
  public function executeRegister(sfWebRequest $request)
  {
    $this->form = new ClapForm();
    $this->form->bind($request->getParameter($this->form->getName()));
    if($this->form->isValid())
    {
      $clap = $this->form->save();
      
      $alerts = sfConfig::get('app_clap_count_alerts', array());
      if(count($alerts)>0 && in_array($clap->getClaps(), $alerts))
      {
        sfContext::getInstance()->getEventDispatcher()->notify(new sfEvent($this, 'opClapPlugin.clapAlert', array('clap'=>$clap)));
      }
      
      $this->redirect($clap->getForeignUrl());
      return;
    }
    return sfView::ERROR;
  }
  
}