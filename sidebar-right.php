<?php
    global $dm_settings;
    if ($dm_settings['right_sidebar'] != 0) : ?>
    <div class="col-md-<?php echo $dm_settings['right_sidebar_width']; ?> dmbs-right">
        <div class="panel panel-danger">
            <div class="panel-body">
            <ul class="list-group">
            <?php //get the right sidebar
                dynamic_sidebar( 'Right Sidebar' ); ?>
            </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
