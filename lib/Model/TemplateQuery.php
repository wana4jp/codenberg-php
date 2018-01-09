<?php

namespace Kanekoelastic\PhpCodenberg\Model;

use ArrayAccess;
use Kanekoelastic\PhpCodenberg\ObjectSerializer;

class TemplateQuery implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    const SORT_ID = 'id';

    const SORT_FORMAT_ID = 'format_id';

    const SORT_NAME = 'name';

    const SORT_KEYWORDS = 'keywords';

    const SORT_CREATED_AT = 'created_at';

    const DIRECTION_ASC = 'asc';

    const DIRECTION_DESC = 'desc';

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'TemplateQuery';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $types = [
        'q' => 'string',
        'sort' => 'string',
        'direction' => 'string',
        'perPage' => 'int',
        'page' => 'int',
        'includingPrivate' => 'bool',
        'includingCustomFields' => 'bool',
        'includingFormats' => 'bool',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $formats = [
        'q' => null,
        'sort' => null,
        'direction' => null,
        'perPage' => 'int64',
        'page' => 'int64',
        'includingPrivate' => null,
        'includingCustomFields' => null,
        'includingFormats' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'q' => 'q',
        'sort' => 'sort',
        'direction' => 'direction',
        'perPage' => 'per_page',
        'page' => 'page',
        'includingPrivate' => 'including_private',
        'includingCustomFields' => 'including_custom_fields',
        'includingFormats' => 'including_formats',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'q' => 'setQ',
        'sort' => 'setSort',
        'direction' => 'setDirection',
        'perPage' => 'setPerPage',
        'page' => 'setPage',
        'includingPrivate' => 'setIncludingPrivate',
        'includingCustomFields' => 'setIncludingCustomFields',
        'includingFormats' => 'setIncludingFormats',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'q' => 'getQ',
        'sort' => 'getSort',
        'direction' => 'getDirection',
        'perPage' => 'getPerPage',
        'page' => 'getPage',
        'includingPrivate' => 'getIncludingPrivate',
        'includingCustomFields' => 'getIncludingCustomFields',
        'includingFormats' => 'getIncludingFormats',
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
        $this->container['q'] = isset($data['q']) ? $data['q'] : null;
        $this->container['sort'] = isset($data['sort']) ? $data['sort'] : 'id';
        $this->container['direction'] = isset($data['direction']) ? $data['direction'] : 'desc';
        $this->container['perPage'] = isset($data['perPage']) ? $data['perPage'] : 10;
        $this->container['page'] = isset($data['page']) ? $data['page'] : 1;
        $this->container['includingPrivate'] = isset($data['includingPrivate']) ? $data['includingPrivate'] : false;
        $this->container['includingCustomFields'] = isset($data['includingCustomFields']) ? $data['includingCustomFields'] : false;
        $this->container['includingFormats'] = isset($data['includingFormats']) ? $data['includingFormats'] : false;
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
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public function getSortAllowableValues()
    {
        return [
            self::SORT_ID,
            self::SORT_FORMAT_ID,
            self::SORT_NAME,
            self::SORT_KEYWORDS,
            self::SORT_CREATED_AT,
        ];
    }

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public function getDirectionAllowableValues()
    {
        return [
            self::DIRECTION_ASC,
            self::DIRECTION_DESC,
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

        $allowedValues = $this->getSortAllowableValues();

        if (!in_array($this->container['sort'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'sort', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDirectionAllowableValues();

        if (!in_array($this->container['direction'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'direction', must be one of '%s'",
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
        $allowedValues = $this->getSortAllowableValues();

        if (!in_array($this->container['sort'], $allowedValues)) {
            return false;
        }
        $allowedValues = $this->getDirectionAllowableValues();

        if (!in_array($this->container['direction'], $allowedValues)) {
            return false;
        }
        return true;
    }

    /**
     * Gets q.
     *
     * @return string
     */
    public function getQ()
    {
        return $this->container['q'];
    }

    /**
     * Sets q.
     *
     * @param string $q 検索文字列を指定します。template名、キーワードが対象となります。
     *
     * @return $this
     */
    public function setQ($q)
    {
        $this->container['q'] = $q;

        return $this;
    }

    /**
     * Gets sort.
     *
     * @return string
     */
    public function getSort()
    {
        return $this->container['sort'];
    }

    /**
     * Sets sort.
     *
     * @param string $sort id/format_id/name/keywords/created_atを指定できます
     *
     * @return $this
     */
    public function setSort($sort)
    {
        $allowedValues = $this->getSortAllowableValues();

        if ($sort !== null && !in_array($sort, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'sort', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['sort'] = $sort;

        return $this;
    }

    /**
     * Gets direction.
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->container['direction'];
    }

    /**
     * Sets direction.
     *
     * @param string $direction 項目の並び順を指定します。asc(昇順)/desc(降順)
     *
     * @return $this
     */
    public function setDirection($direction)
    {
        $allowedValues = $this->getDirectionAllowableValues();

        if ($direction !== null && !in_array($direction, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'direction', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['direction'] = $direction;

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
     * @param int $perPage 1ページあたりの取得項目数。最大:50件
     *
     * @return $this
     */
    public function setPerPage($perPage)
    {
        $this->container['perPage'] = $perPage;

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
     * @param int $page ページ番号を指定
     *
     * @return $this
     */
    public function setPage($page)
    {
        $this->container['page'] = $page;

        return $this;
    }

    /**
     * Gets includingPrivate.
     *
     * @return bool
     */
    public function getIncludingPrivate()
    {
        return $this->container['includingPrivate'];
    }

    /**
     * Sets includingPrivate.
     *
     * @param bool $includingPrivate 非公開のテンプレートを含めるかどうかを指定します
     *
     * @return $this
     */
    public function setIncludingPrivate($includingPrivate)
    {
        $this->container['includingPrivate'] = $includingPrivate;

        return $this;
    }

    /**
     * Gets includingCustomFields.
     *
     * @return bool
     */
    public function getIncludingCustomFields()
    {
        return $this->container['includingCustomFields'];
    }

    /**
     * Sets includingCustomFields.
     *
     * @param bool $includingCustomFields 可変領域の情報を含めるかを設定します
     *
     * @return $this
     */
    public function setIncludingCustomFields($includingCustomFields)
    {
        $this->container['includingCustomFields'] = $includingCustomFields;

        return $this;
    }

    /**
     * Gets includingFormats.
     *
     * @return bool
     */
    public function getIncludingFormats()
    {
        return $this->container['includingFormats'];
    }

    /**
     * Sets includingFormats.
     *
     * @param bool $includingFormats フォーマットの情報を含めるかを設定します
     *
     * @return $this
     */
    public function setIncludingFormats($includingFormats)
    {
        $this->container['includingFormats'] = $includingFormats;

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
