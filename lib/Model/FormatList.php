<?php

namespace Kanekoelastic\PhpCodenberg\Model;

use ArrayAccess;
use Kanekoelastic\PhpCodenberg\ObjectSerializer;

class FormatList implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'FormatList';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $types = [
        'count' => 'int',
        'page' => 'int',
        'perPage' => 'int',
        'results' => '\Kanekoelastic\PhpCodenberg\Model\Format[]',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $formats = [
        'count' => 'int64',
        'page' => 'int64',
        'perPage' => 'int64',
        'results' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'count' => 'count',
        'page' => 'page',
        'perPage' => 'per_page',
        'results' => 'results',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'count' => 'setCount',
        'page' => 'setPage',
        'perPage' => 'setPerPage',
        'results' => 'setResults',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'count' => 'getCount',
        'page' => 'getPage',
        'perPage' => 'getPerPage',
        'results' => 'getResults',
    ];

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['count'] = isset($data['count']) ? $data['count'] : null;
        $this->container['page'] = isset($data['page']) ? $data['page'] : null;
        $this->container['perPage'] = isset($data['perPage']) ? $data['perPage'] : null;
        $this->container['results'] = isset($data['results']) ? $data['results'] : null;
    }

    /**
     * Gets the string presentation of the object.
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

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function types()
    {
        return self::$types;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function formats()
    {
        return self::$formats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
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
        return self::$modelName;
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
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return true;
    }

    /**
     * Gets count.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->container['count'];
    }

    /**
     * Sets count.
     *
     * @param int $count count
     *
     * @return $this
     */
    public function setCount($count)
    {
        $this->container['count'] = $count;

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
     * Gets perPage.
     *
     * @return int
     */
    public function getPerPage()
    {
        return $this->container['perPage'];
    }

    /**
     * Sets perPage.
     *
     * @param int $perPage perPage
     *
     * @return $this
     */
    public function setPerPage($perPage)
    {
        $this->container['perPage'] = $perPage;

        return $this;
    }

    /**
     * Gets results.
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\Format[]
     */
    public function getResults()
    {
        return $this->container['results'];
    }

    /**
     * Sets results.
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\Format[] $results results
     *
     * @return $this
     */
    public function setResults($results)
    {
        $this->container['results'] = $results;

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
