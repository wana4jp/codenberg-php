<?php

namespace Kanekoelastic\PhpCodenberg\Model;

class TemplateThumb extends ModelBase implements ArrayAccess
{
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'Template_thumb';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $types = [
        'small' => 'string',
        'large' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $formats = [
        'small' => null,
        'large' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'small' => 'small',
        'large' => 'large',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'small' => 'setSmall',
        'large' => 'setLarge',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'small' => 'getSmall',
        'large' => 'getLarge',
    ];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['small'] = isset($data['small']) ? $data['small'] : null;
        $this->container['large'] = isset($data['large']) ? $data['large'] : null;
    }

    /**
     * Gets small.
     *
     * @return string
     */
    public function getSmall()
    {
        return $this->container['small'];
    }

    /**
     * Sets small.
     *
     * @param string $small small
     *
     * @return $this
     */
    public function setSmall($small)
    {
        $this->container['small'] = $small;

        return $this;
    }

    /**
     * Gets large.
     *
     * @return string
     */
    public function getLarge()
    {
        return $this->container['large'];
    }

    /**
     * Sets large.
     *
     * @param string $large large
     *
     * @return $this
     */
    public function setLarge($large)
    {
        $this->container['large'] = $large;

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
