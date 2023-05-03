<?php
/**
 * @copyright Roy Rosenzweig Center for History and New Media, 2007-2012
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package ExhibitBuilder
 */
 
/**
 * ExhibitBlockAttachment model.
 * 
 * @package ExhibitBuilder
 */
class ExhibitBlockAttachment extends Omeka_Record_AbstractRecord
{
    /**
     * ID of the block this attachment belongs to.
     *
     * @var integer
     */
    public $block_id;

    /**
     * ID of the attached item.
     *
     * @var integer
     */
    public $item_id;

    /**
     * ID of the attached file, if any.
     *
     * @var integer
     */
    public $file_id;

    /**
     * User-specified HTML caption for the attachment.
     *
     * @var string
     */
    public $caption;

    /**
     * User-specified number that represents starting point of an attachment "playback".
     * In case of HTML5 media this will become a second to start the playback from (via native method of mediaelement object)
     * In case of PDF.js reader this will become a page number to set the viewer to when iframe loads (via URL parameter)
     *
     * @var integer
     */
    public $media_start_from;

    /**
     * Order of this attachment within the block.
     *
     * @var integer
     */
    public $order;

    /**
     * Related records mappings.
     *
     * @var array
     */
    protected $_related = array(
        'Item' => 'getItem',
        'File' => 'getFile'
    );

    /**
     * Get the attached item
     *
     * @return Item|null
     */
    public function getItem()
    {
        if ($this->item_id) {
            return $this->getTable('Item')->find($this->item_id);
        } else {
            return null;
        }
    }

    /**
     * Get the attached file.
     *
     * @return File|null
     */
    public function getFile()
    {
        $file = null;
        if ($this->file_id) {
            $file = $this->getTable('File')->find($this->file_id);
        }

        // Fallback if specified file missing or no file specified.
        if (!$file && ($item = $this->getItem()) && ($files = $item->Files)) {
            $file = $files[0];
        }

        return $file;
    }

    /**
     * Validate the attachment data.
     *
     * A valid attachment has a numeric block ID, a numeric order, and a
     * numeric item ID.
     */
    protected function _validate()
    {
        if (empty($this->block_id) || !is_numeric($this->block_id)) {
            $this->addError('page_id', "Must be associated with an exhibit block.");
        }

        if ($this->order === null || !is_numeric($this->order)) {
            $this->addError('order', "Must be ordered within the block.");
        }

        if (empty($this->item_id) || !is_numeric($this->item_id)) {
            $this->addError(null, 'item_id field must be a valid foreign key');
        }
    }

    /**
     * Get the owning block.
     *
     * @return ExhibitPageBlock
     */
    protected function getBlock()
    {
        return $this->getTable('ExhibitPage')->find($this->block_id);
    }

    /**
     * Set this attachment's data by key-value array.
     *
     * @param array $data
     */
    public function setData($data)
    {
        if (!empty($data['item_id'])) {
            $this->item_id = (int) $data['item_id'];
        } else {
            $this->item_id = null;
        }

        if (!empty($data['file_id'])) {
            $this->file_id = (int) $data['file_id'];
        } else {
            $this->file_id = null;
        }

        if (!empty($data['caption'])) {
            $this->caption = $data['caption'];
        } else {
            $this->caption = null;
        }

        // todo: Not sure what to do here. If not number is entered we need to handle that here or DB will take care of it since we told it to expect an integer with default value of 0
        if (!empty($data['media_start_from'])) {
            $this->media_start_from = (int) $data['media_start_from'];
        } else {
            // Default pointer should be 0
            $this->media_start_from = 0;
        }

        if (!empty($data['order'])) {
            $this->order = $data['order'];
        }
    }
}
