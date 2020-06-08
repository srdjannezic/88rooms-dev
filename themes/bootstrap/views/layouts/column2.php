<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="page-container row-fluid" id="main_content">
    <div id="flashAlert" style="display:none">
        <?php
        $this->widget('ext.bootstrap.widgets.TbAlert', array(
            'block' => true, // display a larger alert block?
            'fade' => true, // use transitions?
            'closeText' => '&times;', // close link text - if set to false, no close link is displayed
            'alerts' => array(// configurations per alert type
                'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
            ),
        ));
        ?>
    </div>        

    <div id="sidebar" class="page-sidebar nav-collapse collapse">        
        <?php
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => '',
            'items' => array(
                array('label' => ''),
                array('label' => __('Oglasi'),),
            ),
        ));
        ?>        
    </div><!-- sidebar -->

    <div class="page-content">        
        <div id="content" class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <h3 class="page-title">
                        Form Components
                        <small>form components and widgets</small>
                    </h3>
                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>
                </div>
            </div>
            <?php echo $content; ?>
        </div><!-- content -->
        <div id="footer">
            <hr/>
            Copyright &copy; <?php echo date('Y'); ?> by Kamionce. All Rights Reserved.
        </div><!-- footer -->

    </div>
</div>
<?php $this->endContent(); ?>