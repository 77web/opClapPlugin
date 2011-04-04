<?php


class opClapPluginConfiguration extends sfPluginConfiguration
{
  public function initialize()
  {
    $this->dispatcher->connect('op_action.post_execute_diary_delete', array("opClapPluginClapRemover", "listenToDiaryDelete"));
    
    $this->dispatcher->connect('op_action.post_execute_communityEvent_delete', array("opClapPluginClapRemover", "listenToCommunityEventDelete"));
    
    $this->dispatcher->connect('op_action.post_execute_communityTopic_delete', array("opClapPluginClapRemover", "listenToCommunityTopicDelete"));
  }

}