<?php
$formStem = $block->getFormStem();
$options = $block->getOptions();
?>
<div class="selected-items">
    <h4><?php echo __('Items'); ?></h4>
    <?php echo $this->exhibitFormAttachments($block); ?>
</div>

<div class="block-text">
    <h4><?php echo __('Text'); ?></h4>
    <?php echo $this->exhibitFormText($block); ?>
</div>

<div class="layout-options closed">
    <div class="block-header">
        <h4><?php echo __('Layout Options'); ?></h4>
        <button class="block-drawer-toggle opened" role="button" title="<?php echo __('Expand/Collapse'); ?>"></button>
    </div>
    <div class="block-drawer-contents opened">
        <div class="file-position">
            <?php echo $this->formLabel($formStem . '[options][file-position]', __('File position')); ?>
            <?php
            echo $this->formSelect($formStem . '[options][file-position]',
                @$options['file-position'], array(),
                array('left' => __('Left'), 'right' => __('Right')));
            ?>
        </div>
        
        <div class="file-size">
            <?php echo $this->formLabel($formStem . '[options][file-size]', __('File size')); ?>
            <?php
            echo $this->formSelect($formStem . '[options][file-size]',
                @$options['file-size'], array(),
                array(
                    'fullsize' => __('Fullsize'),
                    'thumbnail' => __('Thumbnail'),
                    'square_thumbnail' => __('Square Thumbnail')
                ));
            ?>
        </div>

        <div class="captions-position">
            <?php echo $this->formLabel($formStem . '[options][captions-position]', __('Captions position')); ?>
            <?php
            echo $this->formSelect($formStem . '[options][captions-position]',
                @$options['captions-position'], array(),
                array(
                    'center' => __('Center'),
                    'left' => __('Left'),
                    'right' => __('Right')
                ));
            ?>
        </div>
    </div>

</div>
