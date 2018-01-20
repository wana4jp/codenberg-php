<?php

namespace Kanekoelastic\PhpCodenberg\Model;

class CustomFieldFont extends ModelBase implements \ArrayAccess
{
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'CustomField_font';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $types = [
        'id' => 'int',
        'wid' => 'int',
        'name' => 'string',
        'nameAlias' => 'string',
        'weight' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $formats = [
        'id' => 'int64',
        'wid' => 'int64',
        'name' => null,
        'nameAlias' => null,
        'weight' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'wid' => 'wid',
        'name' => 'name',
        'nameAlias' => 'name_alias',
        'weight' => 'weight',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'wid' => 'setWid',
        'name' => 'setName',
        'nameAlias' => 'setNameAlias',
        'weight' => 'setWeight',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'wid' => 'getWid',
        'name' => 'getName',
        'nameAlias' => 'getNameAlias',
        'weight' => 'getWeight',
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
        $this->container['wid'] = isset($data['wid']) ? $data['wid'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['nameAlias'] = isset($data['nameAlias']) ? $data['nameAlias'] : null;
        $this->container['weight'] = isset($data['weight']) ? $data['weight'] : null;
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
     * Gets wid.
     *
     * @return int
     */
    public function getWid()
    {
        return $this->container['wid'];
    }

    /**
     * Sets wid.
     *
     * @param int $wid wid
     *
     * @return $this
     */
    public function setWid($wid)
    {
        $this->container['wid'] = $wid;

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
     * Gets nameAlias.
     *
     * @return string
     */
    public function getNameAlias()
    {
        return $this->container['nameAlias'];
    }

    /**
     * Sets nameAlias.
     *
     * @param string $nameAlias nameAlias
     *
     * @return $this
     */
    public function setNameAlias($nameAlias)
    {
        $this->container['nameAlias'] = $nameAlias;

        return $this;
    }

    /**
     * Gets weight.
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->container['weight'];
    }

    /**
     * Sets weight.
     *
     * @param string $weight weight
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->container['weight'] = $weight;

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
