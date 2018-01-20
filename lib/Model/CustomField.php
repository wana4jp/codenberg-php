<?php

namespace Kanekoelastic\PhpCodenberg\Model;

class CustomField extends ModelBase implements ArrayAccess
{
    const DISCRIMINATOR = null;

    const FIELD_TYPE_TEXT = 'text';

    const FIELD_TYPE_IMAGE = 'image';

    const TEXT_ALIGN_RIGHT = 'right';

    const TEXT_ALIGN_CENTER = 'center';

    const TEXT_ALIGN_LEFT = 'left';

    const TEXT_ALIGN_JUSTIFY = 'justify';

    const WRITING_MODE_HORIZONTAL_TB = 'horizontal_tb';

    const WRITING_MODE_VERTICAL_RL = 'vertical_rl';

    const WRITING_MODE_VERTICAL_LR = 'vertical_lr';

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'CustomField';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $types = [
        'id' => 'int',
        'name' => 'string',
        'fieldType' => 'string',
        'defaultValue' => 'string',
        'height' => 'float',
        'width' => 'float',
        'x' => 'float',
        'y' => 'float',
        'rotate' => 'float',
        'page' => 'int',
        'isBackground' => 'bool',
        'colorC' => 'int',
        'colorM' => 'int',
        'colorY' => 'int',
        'colorK' => 'int',
        'font' => '\Kanekoelastic\PhpCodenberg\Model\CustomFieldFont',
        'maxLength' => 'int',
        'textAlign' => 'string',
        'textSize' => 'int',
        'tracking' => 'int',
        'writingMode' => 'string',
        'zIndex' => 'int',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $formats = [
        'id' => 'int64',
        'name' => null,
        'fieldType' => null,
        'defaultValue' => null,
        'height' => null,
        'width' => null,
        'x' => null,
        'y' => null,
        'rotate' => null,
        'page' => 'int64',
        'isBackground' => null,
        'colorC' => 'int64',
        'colorM' => 'int64',
        'colorY' => 'int64',
        'colorK' => 'int64',
        'font' => null,
        'maxLength' => 'int64',
        'textAlign' => null,
        'textSize' => 'int64',
        'tracking' => 'int64',
        'writingMode' => null,
        'zIndex' => 'int64',
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'name' => 'name',
        'fieldType' => 'field_type',
        'defaultValue' => 'default_value',
        'height' => 'height',
        'width' => 'width',
        'x' => 'x',
        'y' => 'y',
        'rotate' => 'rotate',
        'page' => 'page',
        'isBackground' => 'is_background',
        'colorC' => 'color_c',
        'colorM' => 'color_m',
        'colorY' => 'color_y',
        'colorK' => 'color_k',
        'font' => 'font',
        'maxLength' => 'max_length',
        'textAlign' => 'text_align',
        'textSize' => 'text_size',
        'tracking' => 'tracking',
        'writingMode' => 'writing_mode',
        'zIndex' => 'z_index',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'fieldType' => 'setFieldType',
        'defaultValue' => 'setDefaultValue',
        'height' => 'setHeight',
        'width' => 'setWidth',
        'x' => 'setX',
        'y' => 'setY',
        'rotate' => 'setRotate',
        'page' => 'setPage',
        'isBackground' => 'setIsBackground',
        'colorC' => 'setColorC',
        'colorM' => 'setColorM',
        'colorY' => 'setColorY',
        'colorK' => 'setColorK',
        'font' => 'setFont',
        'maxLength' => 'setMaxLength',
        'textAlign' => 'setTextAlign',
        'textSize' => 'setTextSize',
        'tracking' => 'setTracking',
        'writingMode' => 'setWritingMode',
        'zIndex' => 'setZIndex',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'fieldType' => 'getFieldType',
        'defaultValue' => 'getDefaultValue',
        'height' => 'getHeight',
        'width' => 'getWidth',
        'x' => 'getX',
        'y' => 'getY',
        'rotate' => 'getRotate',
        'page' => 'getPage',
        'isBackground' => 'getIsBackground',
        'colorC' => 'getColorC',
        'colorM' => 'getColorM',
        'colorY' => 'getColorY',
        'colorK' => 'getColorK',
        'font' => 'getFont',
        'maxLength' => 'getMaxLength',
        'textAlign' => 'getTextAlign',
        'textSize' => 'getTextSize',
        'tracking' => 'getTracking',
        'writingMode' => 'getWritingMode',
        'zIndex' => 'getZIndex',
    ];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['fieldType'] = isset($data['fieldType']) ? $data['fieldType'] : null;
        $this->container['defaultValue'] = isset($data['defaultValue']) ? $data['defaultValue'] : null;
        $this->container['height'] = isset($data['height']) ? $data['height'] : null;
        $this->container['width'] = isset($data['width']) ? $data['width'] : null;
        $this->container['x'] = isset($data['x']) ? $data['x'] : null;
        $this->container['y'] = isset($data['y']) ? $data['y'] : null;
        $this->container['rotate'] = isset($data['rotate']) ? $data['rotate'] : null;
        $this->container['page'] = isset($data['page']) ? $data['page'] : null;
        $this->container['isBackground'] = isset($data['isBackground']) ? $data['isBackground'] : null;
        $this->container['colorC'] = isset($data['colorC']) ? $data['colorC'] : null;
        $this->container['colorM'] = isset($data['colorM']) ? $data['colorM'] : null;
        $this->container['colorY'] = isset($data['colorY']) ? $data['colorY'] : null;
        $this->container['colorK'] = isset($data['colorK']) ? $data['colorK'] : null;
        $this->container['font'] = isset($data['font']) ? $data['font'] : null;
        $this->container['maxLength'] = isset($data['maxLength']) ? $data['maxLength'] : null;
        $this->container['textAlign'] = isset($data['textAlign']) ? $data['textAlign'] : null;
        $this->container['textSize'] = isset($data['textSize']) ? $data['textSize'] : null;
        $this->container['tracking'] = isset($data['tracking']) ? $data['tracking'] : null;
        $this->container['writingMode'] = isset($data['writingMode']) ? $data['writingMode'] : null;
        $this->container['zIndex'] = isset($data['zIndex']) ? $data['zIndex'] : null;
    }

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public function getFieldTypeAllowableValues()
    {
        return [
            self::FIELD_TYPE_TEXT,
            self::FIELD_TYPE_IMAGE,
        ];
    }

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public function getTextAlignAllowableValues()
    {
        return [
            self::TEXT_ALIGN_RIGHT,
            self::TEXT_ALIGN_CENTER,
            self::TEXT_ALIGN_LEFT,
            self::TEXT_ALIGN_JUSTIFY,
        ];
    }

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public function getWritingModeAllowableValues()
    {
        return [
            self::WRITING_MODE_HORIZONTAL_TB,
            self::WRITING_MODE_VERTICAL_RL,
            self::WRITING_MODE_VERTICAL_LR,
        ];
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getFieldTypeAllowableValues();

        if (!in_array($this->container['fieldType'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'fieldType', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getTextAlignAllowableValues();

        if (!in_array($this->container['textAlign'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'textAlign', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getWritingModeAllowableValues();

        if (!in_array($this->container['writingMode'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'writingMode', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        $allowedValues = $this->getFieldTypeAllowableValues();

        if (!in_array($this->container['fieldType'], $allowedValues)) {
            return false;
        }
        $allowedValues = $this->getTextAlignAllowableValues();

        if (!in_array($this->container['textAlign'], $allowedValues)) {
            return false;
        }
        $allowedValues = $this->getWritingModeAllowableValues();

        if (!in_array($this->container['writingMode'], $allowedValues)) {
            return false;
        }
        return true;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id.
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
     * Gets name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name.
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
     * Gets fieldType.
     *
     * @return string
     */
    public function getFieldType()
    {
        return $this->container['fieldType'];
    }

    /**
     * Sets fieldType.
     *
     * @param string $fieldType fieldType
     *
     * @return $this
     */
    public function setFieldType($fieldType)
    {
        $allowedValues = $this->getFieldTypeAllowableValues();

        if ($fieldType !== null && !in_array($fieldType, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'fieldType', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['fieldType'] = $fieldType;

        return $this;
    }

    /**
     * Gets defaultValue.
     *
     * @return string
     */
    public function getDefaultValue()
    {
        return $this->container['defaultValue'];
    }

    /**
     * Sets defaultValue.
     *
     * @param string $defaultValue defaultValue
     *
     * @return $this
     */
    public function setDefaultValue($defaultValue)
    {
        $this->container['defaultValue'] = $defaultValue;

        return $this;
    }

    /**
     * Gets height.
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->container['height'];
    }

    /**
     * Sets height.
     *
     * @param float $height height
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->container['height'] = $height;

        return $this;
    }

    /**
     * Gets width.
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->container['width'];
    }

    /**
     * Sets width.
     *
     * @param float $width width
     *
     * @return $this
     */
    public function setWidth($width)
    {
        $this->container['width'] = $width;

        return $this;
    }

    /**
     * Gets x.
     *
     * @return float
     */
    public function getX()
    {
        return $this->container['x'];
    }

    /**
     * Sets x.
     *
     * @param float $x x
     *
     * @return $this
     */
    public function setX($x)
    {
        $this->container['x'] = $x;

        return $this;
    }

    /**
     * Gets y.
     *
     * @return float
     */
    public function getY()
    {
        return $this->container['y'];
    }

    /**
     * Sets y.
     *
     * @param float $y y
     *
     * @return $this
     */
    public function setY($y)
    {
        $this->container['y'] = $y;

        return $this;
    }

    /**
     * Gets rotate.
     *
     * @return float
     */
    public function getRotate()
    {
        return $this->container['rotate'];
    }

    /**
     * Sets rotate.
     *
     * @param float $rotate rotate
     *
     * @return $this
     */
    public function setRotate($rotate)
    {
        $this->container['rotate'] = $rotate;

        return $this;
    }

    /**
     * Gets page.
     *
     * @return int
     */
    public function getPage()
    {
        return $this->container['page'];
    }

    /**
     * Sets page.
     *
     * @param int $page page
     *
     * @return $this
     */
    public function setPage($page)
    {
        $this->container['page'] = $page;

        return $this;
    }

    /**
     * Gets isBackground.
     *
     * @return bool
     */
    public function getIsBackground()
    {
        return $this->container['isBackground'];
    }

    /**
     * Sets isBackground.
     *
     * @param bool $isBackground isBackground
     *
     * @return $this
     */
    public function setIsBackground($isBackground)
    {
        $this->container['isBackground'] = $isBackground;

        return $this;
    }

    /**
     * Gets colorC.
     *
     * @return int
     */
    public function getColorC()
    {
        return $this->container['colorC'];
    }

    /**
     * Sets colorC.
     *
     * @param int $colorC colorC
     *
     * @return $this
     */
    public function setColorC($colorC)
    {
        $this->container['colorC'] = $colorC;

        return $this;
    }

    /**
     * Gets colorM.
     *
     * @return int
     */
    public function getColorM()
    {
        return $this->container['colorM'];
    }

    /**
     * Sets colorM.
     *
     * @param int $colorM colorM
     *
     * @return $this
     */
    public function setColorM($colorM)
    {
        $this->container['colorM'] = $colorM;

        return $this;
    }

    /**
     * Gets colorY.
     *
     * @return int
     */
    public function getColorY()
    {
        return $this->container['colorY'];
    }

    /**
     * Sets colorY.
     *
     * @param int $colorY colorY
     *
     * @return $this
     */
    public function setColorY($colorY)
    {
        $this->container['colorY'] = $colorY;

        return $this;
    }

    /**
     * Gets colorK.
     *
     * @return int
     */
    public function getColorK()
    {
        return $this->container['colorK'];
    }

    /**
     * Sets colorK.
     *
     * @param int $colorK colorK
     *
     * @return $this
     */
    public function setColorK($colorK)
    {
        $this->container['colorK'] = $colorK;

        return $this;
    }

    /**
     * Gets font.
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\CustomFieldFont
     */
    public function getFont()
    {
        return $this->container['font'];
    }

    /**
     * Sets font.
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\CustomFieldFont $font font
     *
     * @return $this
     */
    public function setFont($font)
    {
        $this->container['font'] = $font;

        return $this;
    }

    /**
     * Gets maxLength.
     *
     * @return int
     */
    public function getMaxLength()
    {
        return $this->container['maxLength'];
    }

    /**
     * Sets maxLength.
     *
     * @param int $maxLength maxLength
     *
     * @return $this
     */
    public function setMaxLength($maxLength)
    {
        $this->container['maxLength'] = $maxLength;

        return $this;
    }

    /**
     * Gets textAlign.
     *
     * @return string
     */
    public function getTextAlign()
    {
        return $this->container['textAlign'];
    }

    /**
     * Sets textAlign.
     *
     * @param string $textAlign textAlign
     *
     * @return $this
     */
    public function setTextAlign($textAlign)
    {
        $allowedValues = $this->getTextAlignAllowableValues();

        if ($textAlign !== null && !in_array($textAlign, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'textAlign', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['textAlign'] = $textAlign;

        return $this;
    }

    /**
     * Gets textSize.
     *
     * @return int
     */
    public function getTextSize()
    {
        return $this->container['textSize'];
    }

    /**
     * Sets textSize.
     *
     * @param int $textSize textSize
     *
     * @return $this
     */
    public function setTextSize($textSize)
    {
        $this->container['textSize'] = $textSize;

        return $this;
    }

    /**
     * Gets tracking.
     *
     * @return int
     */
    public function getTracking()
    {
        return $this->container['tracking'];
    }

    /**
     * Sets tracking.
     *
     * @param int $tracking tracking
     *
     * @return $this
     */
    public function setTracking($tracking)
    {
        $this->container['tracking'] = $tracking;

        return $this;
    }

    /**
     * Gets writingMode.
     *
     * @return string
     */
    public function getWritingMode()
    {
        return $this->container['writingMode'];
    }

    /**
     * Sets writingMode.
     *
     * @param string $writingMode writingMode
     *
     * @return $this
     */
    public function setWritingMode($writingMode)
    {
        $allowedValues = $this->getWritingModeAllowableValues();

        if ($writingMode !== null && !in_array($writingMode, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'writingMode', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['writingMode'] = $writingMode;

        return $this;
    }

    /**
     * Gets zIndex.
     *
     * @return int
     */
    public function getZIndex()
    {
        return $this->container['zIndex'];
    }

    /**
     * Sets zIndex.
     *
     * @param int $zIndex zIndex
     *
     * @return $this
     */
    public function setZIndex($zIndex)
    {
        $this->container['zIndex'] = $zIndex;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
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
     * @param int   $offset Offset
     * @param mixed $value  Value to be set
     */
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param int $offset Offset
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}
