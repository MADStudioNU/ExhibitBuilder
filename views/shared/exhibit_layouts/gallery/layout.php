<?php
$showcasePosition = isset($options['showcase-position'])
    ? html_escape($options['showcase-position'])
    : 'none';
$showcaseFile = $showcasePosition !== 'none' && !empty($attachments);
$galleryPosition = isset($options['gallery-position'])
    ? html_escape($options['gallery-position'])
    : 'left';
$galleryFileSize = isset($options['gallery-file-size'])
    ? html_escape($options['gallery-file-size'])
    : null;
$captionPosition = isset($options['captions-position'])
    ? html_escape($options['captions-position'])
    : 'center';
?>

<div class="gallery-showcase <?php echo $showcasePosition; ?> <?php echo $galleryPosition; ?> captions-<?php echo $captionPosition; ?>">
    <ul class="oda-exhibit-gallery gallery <?php if ($showcaseFile || !empty($text)) echo "with-showcase $galleryPosition"; ?> captions-<?php echo $captionPosition; ?>">
        <?php echo $this->exhibitAttachmentGallery($attachments, array('imageSize' => 'fullsize')); ?>
    </ul>
</div>

<?php echo $text; ?>
