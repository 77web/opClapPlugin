<form action="<?php echo url_for('@clap'); ?>" method="post" id="Clap">
<?php if($isClappable): ?>

<?php echo $newForm; ?>
<input type="submit" value="<?php echo __('%clap%', array('%clap%'=>sfConfig::get('app_clap_name'))); ?>" />
<?php else: ?>
<?php echo __('%clap%', array('%clap%'=>sfConfig::get('app_clap_name'))); ?>
<?php endif; ?>
(<?php echo (int)($clap->getClaps()); ?>)
</form>
