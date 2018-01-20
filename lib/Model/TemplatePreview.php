<?php

namespace Kanekoelastic\PhpCodenberg\Model;

class TemplatePreview extends ModelBase implements ArrayAccess
{
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'TemplatePreview';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $types = [
        'id' => 'int',
        'templateId' => 'string',
        'generated' => 'bool',
        'images' => 'string[]',
        'error' => '\Kanekoelastic\PhpCodenberg\Model\ErrorMessage',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $formats = [
        'id' => 'int64',
        'templateId' => null,
        'generated' => null,
        'images' => null,
        'error' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'templateId' => 'template_id',
        'generated' => 'generated',
        'images' => 'images',
        'error' => 'error',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'templateId' => 'setTemplateId',
        'generated' => 'setGenerated',
        'images' => 'setImages',
        'error' => 'setError',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'templateId' => 'getTemplateId',
        'generated' => 'getGenerated',
        'images' => 'getImages',
        'error' => 'getError',
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
        $this->container['templateId'] = isset($data['templateId']) ? $data['templateId'] : null;
        $this->container['generated'] = isset($data['generated']) ? $data['generated'] : null;
        $this->container['images'] = isset($data['images']) ? $data['images'] : null;
        $this->container['error'] = isset($data['error']) ? $data['error'] : null;
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
     * Gets templateId.
     *
     * @return string
     */
    public function getTemplateId()
    {
        return $this->container['templateId'];
    }

    /**
     * Sets templateId.
     *
     * @param string $templateId templateId
     *
     * @return $this
     */
    public function setTemplateId($templateId)
    {
        $this->container['templateId'] = $templateId;

        return $this;
    }

    /**
     * Gets generated.
     *
     * @return bool
     */
    public function getGenerated()
    {
        return $this->container['generated'];
    }

    /**
     * Sets generated.
     *
     * @param bool $generated generated
     *
     * @return $this
     */
    public function setGenerated($generated)
    {
        $this->container['generated'] = $generated;

        return $this;
    }

    /**
     * Gets images.
     *
     * @return string[]
     */
    public function getImages()
    {
        return $this->container['images'];
    }

    /**
     * Sets images.
     *
     * @param string[] $images images
     *
     * @return $this
     */
    public function setImages($images)
    {
        $this->container['images'] = $images;

        return $this;
    }

    /**
     * Gets error.
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\ErrorMessage
     */
    public function getError()
    {
        return $this->container['error'];
    }

    /**
     * Sets error.
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\ErrorMessage $error error
     *
     * @return $this
     */
    public function setError($error)
    {
        $this->container['error'] = $error;

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
