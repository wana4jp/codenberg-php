<?php

namespace Kanekoelastic\PhpCodenberg\Model;

use \ArrayAccess;
use \Kanekoelastic\PhpCodenberg\ObjectSerializer;

class Format implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Format';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
        'displayId' => 'string',
        'name' => 'string',
        'category' => 'string',
        'width' => 'int',
        'height' => 'int',
        'depth' => 'int',
        'moq' => 'int',
        'spq' => 'int',
        'lotPrice' => '\Kanekoelastic\PhpCodenberg\Model\LotPrice[]',
        'purpose' => 'string[]',
        'note' => 'string',
        'file' => 'string',
        'mainImage' => 'string',
        'selectablePapers' => '\Kanekoelastic\PhpCodenberg\Model\Paper[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => 'int64',
        'displayId' => null,
        'name' => null,
        'category' => null,
        'width' => 'int64',
        'height' => 'int64',
        'depth' => 'int64',
        'moq' => 'int64',
        'spq' => 'int64',
        'lotPrice' => null,
        'purpose' => null,
        'note' => null,
        'file' => null,
        'mainImage' => null,
        'selectablePapers' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'displayId' => 'display_id',
        'name' => 'name',
        'category' => 'category',
        'width' => 'width',
        'height' => 'height',
        'depth' => 'depth',
        'moq' => 'moq',
        'spq' => 'spq',
        'lotPrice' => 'lot_price',
        'purpose' => 'purpose',
        'note' => 'note',
        'file' => 'file',
        'mainImage' => 'main_image',
        'selectablePapers' => 'selectable_papers'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'displayId' => 'setDisplayId',
        'name' => 'setName',
        'category' => 'setCategory',
        'width' => 'setWidth',
        'height' => 'setHeight',
        'depth' => 'setDepth',
        'moq' => 'setMoq',
        'spq' => 'setSpq',
        'lotPrice' => 'setLotPrice',
        'purpose' => 'setPurpose',
        'note' => 'setNote',
        'file' => 'setFile',
        'mainImage' => 'setMainImage',
        'selectablePapers' => 'setSelectablePapers'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'displayId' => 'getDisplayId',
        'name' => 'getName',
        'category' => 'getCategory',
        'width' => 'getWidth',
        'height' => 'getHeight',
        'depth' => 'getDepth',
        'moq' => 'getMoq',
        'spq' => 'getSpq',
        'lotPrice' => 'getLotPrice',
        'purpose' => 'getPurpose',
        'note' => 'getNote',
        'file' => 'getFile',
        'mainImage' => 'getMainImage',
        'selectablePapers' => 'getSelectablePapers'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['displayId'] = isset($data['displayId']) ? $data['displayId'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['category'] = isset($data['category']) ? $data['category'] : null;
        $this->container['width'] = isset($data['width']) ? $data['width'] : null;
        $this->container['height'] = isset($data['height']) ? $data['height'] : null;
        $this->container['depth'] = isset($data['depth']) ? $data['depth'] : null;
        $this->container['moq'] = isset($data['moq']) ? $data['moq'] : null;
        $this->container['spq'] = isset($data['spq']) ? $data['spq'] : null;
        $this->container['lotPrice'] = isset($data['lotPrice']) ? $data['lotPrice'] : null;
        $this->container['purpose'] = isset($data['purpose']) ? $data['purpose'] : null;
        $this->container['note'] = isset($data['note']) ? $data['note'] : null;
        $this->container['file'] = isset($data['file']) ? $data['file'] : null;
        $this->container['mainImage'] = isset($data['mainImage']) ? $data['mainImage'] : null;
        $this->container['selectablePapers'] = isset($data['selectablePapers']) ? $data['selectablePapers'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets displayId
     *
     * @return string
     */
    public function getDisplayId()
    {
        return $this->container['displayId'];
    }

    /**
     * Sets displayId
     *
     * @param string $displayId displayId
     *
     * @return $this
     */
    public function setDisplayId($displayId)
    {
        $this->container['displayId'] = $displayId;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string $category カテゴリ名
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->container['width'];
    }

    /**
     * Sets width
     *
     * @param int $width 幅
     *
     * @return $this
     */
    public function setWidth($width)
    {
        $this->container['width'] = $width;

        return $this;
    }

    /**
     * Gets height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->container['height'];
    }

    /**
     * Sets height
     *
     * @param int $height 高さ
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->container['height'] = $height;

        return $this;
    }

    /**
     * Gets depth
     *
     * @return int
     */
    public function getDepth()
    {
        return $this->container['depth'];
    }

    /**
     * Sets depth
     *
     * @param int $depth 奥行き
     *
     * @return $this
     */
    public function setDepth($depth)
    {
        $this->container['depth'] = $depth;

        return $this;
    }

    /**
     * Gets moq
     *
     * @return int
     */
    public function getMoq()
    {
        return $this->container['moq'];
    }

    /**
     * Sets moq
     *
     * @param int $moq 最小注文数
     *
     * @return $this
     */
    public function setMoq($moq)
    {
        $this->container['moq'] = $moq;

        return $this;
    }

    /**
     * Gets spq
     *
     * @return int
     */
    public function getSpq()
    {
        return $this->container['spq'];
    }

    /**
     * Sets spq
     *
     * @param int $spq 注文単位
     *
     * @return $this
     */
    public function setSpq($spq)
    {
        $this->container['spq'] = $spq;

        return $this;
    }

    /**
     * Gets lotPrice
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\LotPrice[]
     */
    public function getLotPrice()
    {
        return $this->container['lotPrice'];
    }

    /**
     * Sets lotPrice
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\LotPrice[] $lotPrice 注文数別の注文価格
     *
     * @return $this
     */
    public function setLotPrice($lotPrice)
    {
        $this->container['lotPrice'] = $lotPrice;

        return $this;
    }

    /**
     * Gets purpose
     *
     * @return string[]
     */
    public function getPurpose()
    {
        return $this->container['purpose'];
    }

    /**
     * Sets purpose
     *
     * @param string[] $purpose 目的
     *
     * @return $this
     */
    public function setPurpose($purpose)
    {
        $this->container['purpose'] = $purpose;

        return $this;
    }

    /**
     * Gets note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->container['note'];
    }

    /**
     * Sets note
     *
     * @param string $note 備考
     *
     * @return $this
     */
    public function setNote($note)
    {
        $this->container['note'] = $note;

        return $this;
    }

    /**
     * Gets file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->container['file'];
    }

    /**
     * Sets file
     *
     * @param string $file プロダクトのテンプレートファイル
     *
     * @return $this
     */
    public function setFile($file)
    {
        $this->container['file'] = $file;

        return $this;
    }

    /**
     * Gets mainImage
     *
     * @return string
     */
    public function getMainImage()
    {
        return $this->container['mainImage'];
    }

    /**
     * Sets mainImage
     *
     * @param string $mainImage プロダクトのサムネール画像
     *
     * @return $this
     */
    public function setMainImage($mainImage)
    {
        $this->container['mainImage'] = $mainImage;

        return $this;
    }

    /**
     * Gets selectablePapers
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\Paper[]
     */
    public function getSelectablePapers()
    {
        return $this->container['selectablePapers'];
    }

    /**
     * Sets selectablePapers
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\Paper[] $selectablePapers 利用可能な紙
     *
     * @return $this
     */
    public function setSelectablePapers($selectablePapers)
    {
        $this->container['selectablePapers'] = $selectablePapers;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


