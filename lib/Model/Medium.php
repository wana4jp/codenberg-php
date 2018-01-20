<?php

namespace Kanekoelastic\PhpCodenberg\Model;

class Medium extends ModelBase implements ArrayAccess
{
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'Medium';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $types = [
        'id' => 'int',
        'name' => 'string',
        'file' => 'string',
        'thumb' => '\Kanekoelastic\PhpCodenberg\Model\MediumThumb[]',
        'createdAt' => '\DateTime',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $formats = [
        'id' => 'int64',
        'name' => null,
        'file' => null,
        'thumb' => null,
        'createdAt' => 'date-time',
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
        'file' => 'file',
        'thumb' => 'thumb',
        'createdAt' => 'created_at',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'file' => 'setFile',
        'thumb' => 'setThumb',
        'createdAt' => 'setCreatedAt',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'file' => 'getFile',
        'thumb' => 'getThumb',
        'createdAt' => 'getCreatedAt',
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
        $this->container['file'] = isset($data['file']) ? $data['file'] : null;
        $this->container['thumb'] = isset($data['thumb']) ? $data['thumb'] : null;
        $this->container['createdAt'] = isset($data['createdAt']) ? $data['createdAt'] : null;
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
     * Gets file.
     *
     * @return string
     */
    public function getFile()
    {
        return $this->container['file'];
    }

    /**
     * Sets file.
     *
     * @param string $file file
     *
     * @return $this
     */
    public function setFile($file)
    {
        $this->container['file'] = $file;

        return $this;
    }

    /**
     * Gets thumb.
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\MediumThumb[]
     */
    public function getThumb()
    {
        return $this->container['thumb'];
    }

    /**
     * Sets thumb.
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\MediumThumb[] $thumb thumb
     *
     * @return $this
     */
    public function setThumb($thumb)
    {
        $this->container['thumb'] = $thumb;

        return $this;
    }

    /**
     * Gets createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['createdAt'];
    }

    /**
     * Sets createdAt.
     *
     * @param \DateTime $createdAt createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->container['createdAt'] = $createdAt;

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
