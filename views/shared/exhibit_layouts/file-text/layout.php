<?php
$position = isset($options['file-position'])
    ? html_escape($options['file-position'])
    : 'left';
$size = isset($options['file-size'])
    ? html_escape($options['file-size'])
    : 'fullsize';
$captionPosition = isset($options['captions-position'])
    ? html_escape($options['captions-position'])
    : 'center';
?>
<?php if($attachments): ?>
    <div class="exhibit-items <?php echo $position; ?> <?php echo $size; ?> captions-<?php echo $captionPosition; ?>">
        <?php foreach ($attachments as $attachment): ?>
            <?php
            echo $this->exhibitAttachment($attachment, array('imageSize' => $size, 'media_start_from' => $attachment['media_start_from']));

            $record = get_record_by_id('item', $attachment['item_id']);
            $link = link_to($record, 'show', 'Go to the item', array('class' => 'oda-button go-to-item-link'), array());

            echo $link;
            ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php echo $text; ?>
