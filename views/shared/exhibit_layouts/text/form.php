<div class="block-text">
    <h4><?php echo __('Text'); ?></h4>
    <?php echo $this->exhibitFormText($block); ?>
</div>
<?php
$formStem = $block->getFormStem();
$options = $block->getOptions();
?>
<div class="block-text">
    <h4><?php echo __('Text'); ?></h4>
    <?php echo $this->exhibitFormText($block); ?>
</div>
<div class="layout-options">
    <div class="block-header">
        <h4><?php echo __('Layout Options'); ?></h4>
        <div class="drawer"></div>
    </div>

    <div class="separator">
        <?php echo $this->formLabel($formStem . '[options][separator]', __('Block separator')); ?>
        <?php
        echo $this->formSelect($formStem . '[options][separator]',
            @$options['separator'], array(),
            array('yes' => __('Print'), 'no' => __('Don\'t print')));
        ?>
    </div>
</div>
