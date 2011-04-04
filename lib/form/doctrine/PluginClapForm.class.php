<?php

/**
 * PluginClap form.
 *
 * @package    opClapPlugin
 * @subpackage form
 * @author     Hiromi Hishida<info@77-web.com>
 * @version    0.9.0
 */
abstract class PluginClapForm extends BaseClapForm
{
  public function setup()
  {
    parent::setup();
    unset($this['id']);
    $this->useFields(array('foreign_table', 'foreign_id'));
    $this->setWidget('foreign_table', new sfWidgetFormInputHidden());
    $this->setWidget('foreign_id', new sfWidgetFormInputHidden());
    
    $this->getValidator('foreign_table')->setOption('required', true);
    $this->getValidator('foreign_id')->setOption('required', true);
  }
  
  public function save($con = null)
  {
    return Doctrine::getTable('Clap')->clapTo($this->getValue('foreign_table'), $this->getValue('foreign_id'));
  }
}
