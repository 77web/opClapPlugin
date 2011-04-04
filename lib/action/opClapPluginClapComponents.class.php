<?php

class opClapPluginClapComponents extends sfComponents
{
  public function executeShow($request)
  {
    if(isset($this->diary))
    {
      $this->target = $this->diary;
    }
    elseif(isset($this->communityEvent))
    {
      $this->target = $this->communityEvent;
    }
    elseif(isset($this->communityTopic))
    {
      $this->target = $this->communityTopic;
    }
    
    $this->foreignTable = get_class($this->target);
    $this->foreignId = $this->target->getId();
    
    $this->clap = Doctrine::getTable('Clap')->getObject($this->foreignTable, $this->foreignId);
    
    $this->isMine = $this->target->getMemberId() == $this->getUser()->getMemberId();
    $this->isClappable = !$this->isMine;
    
    if($this->isClappable)
    {
      //new form
      $this->newForm = new ClapForm();
      $this->newForm->setDefaults(array('foreign_table'=>$this->foreignTable, 'foreign_id'=>$this->foreignId));
    }
  }
}