<?php
/**
 * Template Name: Install I-Nex Template
 *
 * Page template for
 *
 * @package Openstrap
 * @since Openstrap 0.1
 */

get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>


	<!-- Main Content -->	

	<!-- End Main Content -->	

<div class="container">

    <!-- Page header -->
    <div class="page-header">
        <h2>Install I-Nex in your favorite linux distribution</h2>
    </div>
    <!-- /Page header -->

    <!-- Timeline -->
    <div class="timeline">
    
        <!-- Line component -->
        <div class="line text-muted"></div>
        <?php if(of_get_option('display_arch_linux_download') == '1'): ?>
        <!-- Panel -->
        <article class="panel panel-primary">
    
            <!-- Icon -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->
    
            <!-- Heading -->
            <div class="panel-heading">
                <h2 class="panel-title">Arch Linux</h2>
            </div>
            <!-- /Heading -->
    
            <!-- Body -->
            <div class="panel-body">
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="media col-md-3">
                            <figure>
                                <img class="media-object img-rounded img-responsive "  src="<?php echo of_get_option('arch_linux_sticker'); ?>">
                            </figure>
                        </div>
                        <div class="col-md-9">
                            <?php echo of_get_option('arch_linux_install_instructions'); ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- /Body -->
            
            <!-- Footer -->
            <div class="panel-footer">
                <div class="col-md-3 text-center">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-primary btn-xs">Repository</a>
                    <a href="#" class="btn btn-success btn-xs">Download</a>
                    <a href="#" class="btn btn-info btn-xs">Source</a>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /Footer -->
                
        </article>
        <!-- /Panel -->
        <?php endif; ?>
        <?php if(of_get_option('display_manjaro_linux_download') == '1'): ?>
        <!-- Panel -->
        <article class="panel panel-primary">
    
            <!-- Icon -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->
    
            <!-- Heading -->
            <div class="panel-heading">
                <h2 class="panel-title">Manjaro</h2>
            </div>
            <!-- /Heading -->
    
            <!-- Body -->
            <div class="panel-body">
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="media col-md-3">
                            <figure>
                                <img class="media-object img-rounded img-responsive "  src="<?php echo of_get_option('manjaro_linux_sticker'); ?>">
                            </figure>
                        </div>
                        <div class="col-md-9">
                            <?php echo of_get_option('manjaro_install_instructions'); ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- /Body -->
    
            <!-- Footer -->
            <div class="panel-footer">
                <div class="col-md-3 text-center">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-primary btn-xs">Repository</a>
                    <a href="#" class="btn btn-success btn-xs">Download</a>
                    <a href="#" class="btn btn-info btn-xs">Source</a>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /Footer -->
    
        </article>
        <!-- /Panel -->
        <?php endif; ?>
        
        <?php if(of_get_option('display_linux_mint_download') == '1'): ?>
        <!-- Panel -->
        <article class="panel panel-primary">
    
            <!-- Icon -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->
    
            <!-- Heading -->
            <div class="panel-heading">
                <h2 class="panel-title">Mint</h2>
            </div>
            <!-- /Heading -->
    
            <!-- Body -->
            <div class="panel-body">
                <div class="list-group-item">
                    <div class="media col-xs-12 col-md-3">
                        <figure>
                            <img class="media-object img-rounded img-responsive" src="<?php echo of_get_option('linux_mint_sticker'); ?>">
                        </figure>
                    </div>
                    <div class="col-md-9">
                        <?php echo of_get_option('linux_mint_install_instructions'); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /Body -->
    
            <!-- Footer -->
            <div class="panel-footer">
                <div class="col-md-3 text-center">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-primary btn-xs">Repository</a>
                    <a href="#" class="btn btn-success btn-xs">Download</a>
                    <a href="#" class="btn btn-info btn-xs">Source</a>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /Footer -->
    
        </article>
        <!-- /Panel -->
        <?php endif; ?>
        <?php if(of_get_option('display_ubuntu_download') == '1'): ?>
        <!-- Panel -->
        <article class="panel panel-primary">
    
            <!-- Icon -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->
    
            <!-- Heading -->
            <div class="panel-heading">
                <h2 class="panel-title">Ubuntu</h2>
            </div>
            <!-- /Heading -->
    
            <!-- Body -->
            <div class="panel-body">
                <div class="list-group-item">
                    <div class="media col-xs-12 col-md-3">
                        <figure>
                            <img class="media-object img-rounded img-responsive" src="<?php echo of_get_option('ubuntu_sticker'); ?>">
                        </figure>
                    </div>
                    <div class="col-md-9">
                        <?php echo of_get_option('ubuntu_install_instructions'); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /Body -->
    
            <!-- Footer -->
            <div class="panel-footer">
                <div class="col-md-3 text-center">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-primary btn-xs">Repository</a>
                    <a href="#" class="btn btn-success btn-xs">Download</a>
                    <a href="#" class="btn btn-info btn-xs">Source</a>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /Footer -->
    
        </article>
        <!-- /Panel -->
        <?php endif; ?>
        <?php if(of_get_option('display_fedora_linux_download') == '1'): ?>
        <!-- Panel -->
        <article class="panel panel-primary">
    
            <!-- Icon -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->
    
            <!-- Heading -->
            <div class="panel-heading">
                <h2 class="panel-title">Fedora</h2>
            </div>
            <!-- /Heading -->
    
            <!-- Body -->
            <div class="panel-body">
                <div class="list-group-item">
                    <div class="media col-xs-12 col-md-3">
                        <figure>
                            <img class="media-object img-rounded img-responsive" src="<?php echo of_get_option('fedora_sticker'); ?>">
                        </figure>
                    </div>
                    <div class="col-md-9">
                        <?php echo of_get_option('fedora_install_instructions'); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /Body -->
    
            <!-- Footer -->
            <div class="panel-footer">
                <div class="col-md-3 text-center">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-primary btn-xs">Repository</a>
                    <a href="#" class="btn btn-success btn-xs">Download</a>
                    <a href="#" class="btn btn-info btn-xs">Source</a>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /Footer -->
    
        </article>
        <!-- /Panel -->
        <?php endif; ?>
        <?php if(of_get_option('display_opensuse_download') == '1'): ?>
        <!-- Panel -->
        <article class="panel panel-primary">
    
            <!-- Icon -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->
    
            <!-- Heading -->
            <div class="panel-heading">
                <h2 class="panel-title">OpenSUSE</h2>
            </div>
            <!-- /Heading -->
    
            <!-- Body -->
            <div class="panel-body">
                <div class="list-group-item">
                    <div class="media col-xs-12 col-md-3">
                        <figure>
                            <img class="media-object img-rounded img-responsive" src="<?php echo of_get_option('opensuse_sticker'); ?>">
                        </figure>
                    </div>
                    <div class="col-md-9">
                        <?php echo of_get_option('opensuse_install_instructions'); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /Body -->
    
            <!-- Footer -->
            <div class="panel-footer">
                <div class="col-md-3 text-center">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-primary btn-xs">Repository</a>
                    <a href="#" class="btn btn-success btn-xs">Download</a>
                    <a href="#" class="btn btn-info btn-xs">Source</a>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /Footer -->
    
        </article>
        <!-- /Panel -->
        <?php endif; ?>
        <?php if(of_get_option('display_slackware_download') == '1'): ?>
        <!-- Panel -->
        <article class="panel panel-primary">
    
            <!-- Icon -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->
    
            <!-- Heading -->
            <div class="panel-heading">
                <h2 class="panel-title">Slackware</h2>
            </div>
            <!-- /Heading -->
    
            <!-- Body -->
            <div class="panel-body">
                <div class="list-group-item">
                    <div class="media col-xs-12 col-md-3">
                        <figure>
                            <img class="media-object img-rounded img-responsive" src="<?php echo of_get_option('slackware_sticker'); ?>">
                        </figure>
                    </div>
                    <div class="col-md-9">
                        <?php echo of_get_option('slackware_install_instructions'); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /Body -->
    
            <!-- Footer -->
            <div class="panel-footer">
                <div class="col-md-3 text-center">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-primary btn-xs">Repository</a>
                    <a href="#" class="btn btn-success btn-xs">Download</a>
                    <a href="#" class="btn btn-info btn-xs">Source</a>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /Footer -->
    
        </article>
        <!-- /Panel -->
        <?php endif; ?>
    
    </div>
    <!-- /Timeline -->

</div>
</div>
<?php get_footer(); ?>

