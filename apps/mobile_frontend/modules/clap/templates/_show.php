<?php if($isClappable): ?>

<form action="<?php echo url_for('@clap'); ?>" method="post" id="Clap">
<?php echo $newForm; ?>
<input type="submit" value="<?php echo __('%clap%', array('%clap%'=>sfConfig::get('app_clap_name'))); ?>" />
</form>

<?php else: ?>

<?php echo __('%clap%', array('%clap%'=>sfConfig::get('app_clap_name'))); ?>

<?php endif; ?>

(<?php echo (int)($clap->getClaps()); ?>)