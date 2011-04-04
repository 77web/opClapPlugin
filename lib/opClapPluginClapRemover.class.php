<?php

class opClapPluginClapRemover
{
  public static function listenToDiaryDelete($args)
  {
    $obj = $args['actionInstance']->getVar("diary");
    self::removeClap($obj);
  }
  
  public static function listenToCommunityEventDelete($args)
  {
    $obj = $args['actionInstance']->getVar("communityEvent");
    self::removeClap($obj);
  }
  
  public static function listenToCommunityTopicDelete($args)
  {
    $obj = $args['actionInstance']->getVar("communityTopic");
    self::removeClap($obj);
  }
  
  private function removeClap($obj)
  {
    $clap = Doctrine::getTable('Clap')->getObject(get_class($obj), $obj->getId());
    if(!$clap->isNew())
    {
      $clap->delete();
    }
  }
}