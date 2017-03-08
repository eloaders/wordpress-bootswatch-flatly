<?php
    $jumbotron_main_text = trim(of_get_option('jumbotron_main_text')); if(($jumbotron_main_text == "")) unset($jumbotron_main_text);
	$jumbotron_long_text = trim(of_get_option('jumbotron_long_text')); if(($jumbotron_long_text == "")) unset($jumbotron_long_text);
	$jumbotron_button_link = trim(of_get_option('jumbotron_button_link')); if(($jumbotron_button_link == "")) unset($jumbotron_button_link);
	$jumbotron_button_title = trim(of_get_option('jumbotron_button_title')); if(($jumbotron_button_title == "")) unset($jumbotron_button_title);	
?>
<?php if(isset($jumbotron_main_text) || isset($jumbotron_long_text) || isset($jumbotron_button_link) || isset($jumbotron_button_title)) :?>	
<div class="container">
        <div class="jumbotron">
          <?php if(isset($jumbotron_main_text)): ?>
          <h2 class="text-center"><?php echo of_get_option('jumbotron_main_text'); ?></h2>
          <?php endif;?>
          <?php if(isset($jumbotron_long_text)): ?>
          <p><?php echo of_get_option('jumbotron_long_text'); ?></p>
          <?php endif;?>
          <?php if(isset($jumbotron_button_link) || isset($jumbotron_button_title)) :?>	
          <p class="text-center"><a href="<?php echo get_permalink( trim(of_get_option('jumbotron_button_link'))); ?>" class="btn btn-primary btn-lg" role="button"><?php echo of_get_option('jumbotron_button_title'); ?></a></p>
          <?php endif;?>
        </div>
</div>
<?php endif;?>	
