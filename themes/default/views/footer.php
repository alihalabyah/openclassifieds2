<?php defined('SYSPATH') or die('No direct script access.');?>
<hr>
<footer>
<p>
&copy; <a href="http://open-classifieds.com" title="Open Source PHP Classifieds">Open Classifieds</a> 
2009 - <?=date('Y')?>
</p>
<!--LOAD ACTIVE WIDGETS-->
<?$view = Widget::get('footer') ?>
<?foreach ( $view as $view => $val):?>
	<?=$val->class; // load widget class?> 
	<?=$val; // load widget view?>
<?endforeach?>
</footer>