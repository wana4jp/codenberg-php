<?php

namespace Kanekoelastic\PhpCodenberg\Model;

use \ArrayAccess;
use \Kanekoelastic\PhpCodenberg\ObjectSerializer;

/**
 * CreateOrderRequest Class Doc Comment
 *
 * @category Class
 * @package  Kanekoelastic\PhpCodenberg
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CreateOrderRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CreateOrderRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'templateId' => 'string',
        'confirmation' => 'bool',
        'name' => 'string',
        'pref' => 'string',
        'postalCode' => 'string',
        'city' => 'string',
        'addressLine1' => 'string',
        'addressLine2' => 'string',
        'organization' => 'string',
        'tel' => 'string',
        'quantity' => 'int',
        'customFields' => '\Kanekoelastic\PhpCodenberg\Model\CustomFieldValue[]',
        'orders' => '\Kanekoelastic\PhpCodenberg\Model\CustomFieldValueGroup[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'templateId' => null,
        'confirmation' => null,
        'name' => null,
        'pref' => null,
        'postalCode' => null,
        'city' => null,
        'addressLine1' => null,
        'addressLine2' => null,
        'organization' => null,
        'tel' => null,
        'quantity' => 'int64',
        'customFields' => null,
        'orders' => null
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
        'templateId' => 'template_id',
        'confirmation' => 'confirmation',
        'name' => 'name',
        'pref' => 'pref',
        'postalCode' => 'postal_code',
        'city' => 'city',
        'addressLine1' => 'address_line1',
        'addressLine2' => 'address_line2',
        'organization' => 'organization',
        'tel' => 'tel',
        'quantity' => 'quantity',
        'customFields' => 'custom_fields',
        'orders' => 'orders'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'templateId' => 'setTemplateId',
        'confirmation' => 'setConfirmation',
        'name' => 'setName',
        'pref' => 'setPref',
        'postalCode' => 'setPostalCode',
        'city' => 'setCity',
        'addressLine1' => 'setAddressLine1',
        'addressLine2' => 'setAddressLine2',
        'organization' => 'setOrganization',
        'tel' => 'setTel',
        'quantity' => 'setQuantity',
        'customFields' => 'setCustomFields',
        'orders' => 'setOrders'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'templateId' => 'getTemplateId',
        'confirmation' => 'getConfirmation',
        'name' => 'getName',
        'pref' => 'getPref',
        'postalCode' => 'getPostalCode',
        'city' => 'getCity',
        'addressLine1' => 'getAddressLine1',
        'addressLine2' => 'getAddressLine2',
        'organization' => 'getOrganization',
        'tel' => 'getTel',
        'quantity' => 'getQuantity',
        'customFields' => 'getCustomFields',
        'orders' => 'getOrders'
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
        $this->container['templateId'] = isset($data['templateId']) ? $data['templateId'] : null;
        $this->container['confirmation'] = isset($data['confirmation']) ? $data['confirmation'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['pref'] = isset($data['pref']) ? $data['pref'] : null;
        $this->container['postalCode'] = isset($data['postalCode']) ? $data['postalCode'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['addressLine1'] = isset($data['addressLine1']) ? $data['addressLine1'] : null;
        $this->container['addressLine2'] = isset($data['addressLine2']) ? $data['addressLine2'] : null;
        $this->container['organization'] = isset($data['organization']) ? $data['organization'] : null;
        $this->container['tel'] = isset($data['tel']) ? $data['tel'] : null;
        $this->container['quantity'] = isset($data['quantity']) ? $data['quantity'] : 1;
        $this->container['customFields'] = isset($data['customFields']) ? $data['customFields'] : null;
        $this->container['orders'] = isset($data['orders']) ? $data['orders'] : null;
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
     * Gets templateId
     *
     * @return string
     */
    public function getTemplateId()
    {
        return $this->container['templateId'];
    }

    /**
     * Sets templateId
     *
     * @param string $templateId テンプレートIDを指定します。
     *
     * @return $this
     */
    public function setTemplateId($templateId)
    {
        $this->container['templateId'] = $templateId;

        return $this;
    }

    /**
     * Gets confirmation
     *
     * @return bool
     */
    public function getConfirmation()
    {
        return $this->container['confirmation'];
    }

    /**
     * Sets confirmation
     *
     * @param bool $confirmation trueを設定すると実際の登録は行われません。
     *
     * @return $this
     */
    public function setConfirmation($confirmation)
    {
        $this->container['confirmation'] = $confirmation;

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
     * @param string $name 配送先:名称
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets pref
     *
     * @return string
     */
    public function getPref()
    {
        return $this->container['pref'];
    }

    /**
     * Sets pref
     *
     * @param string $pref 配送先:都道府県名または都道府県id
     *
     * @return $this
     */
    public function setPref($pref)
    {
        $this->container['pref'] = $pref;

        return $this;
    }

    /**
     * Gets postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->container['postalCode'];
    }

    /**
     * Sets postalCode
     *
     * @param string $postalCode 配送先:郵便番号
     *
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->container['postalCode'] = $postalCode;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city 配送先:市区町村
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets addressLine1
     *
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->container['addressLine1'];
    }

    /**
     * Sets addressLine1
     *
     * @param string $addressLine1 配送先:番地
     *
     * @return $this
     */
    public function setAddressLine1($addressLine1)
    {
        $this->container['addressLine1'] = $addressLine1;

        return $this;
    }

    /**
     * Gets addressLine2
     *
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->container['addressLine2'];
    }

    /**
     * Sets addressLine2
     *
     * @param string $addressLine2 配送先:建物名
     *
     * @return $this
     */
    public function setAddressLine2($addressLine2)
    {
        $this->container['addressLine2'] = $addressLine2;

        return $this;
    }

    /**
     * Gets organization
     *
     * @return string
     */
    public function getOrganization()
    {
        return $this->container['organization'];
    }

    /**
     * Sets organization
     *
     * @param string $organization 配送先:組織名
     *
     * @return $this
     */
    public function setOrganization($organization)
    {
        $this->container['organization'] = $organization;

        return $this;
    }

    /**
     * Gets tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->container['tel'];
    }

    /**
     * Sets tel
     *
     * @param string $tel 配送先:電話番号\"
     *
     * @return $this
     */
    public function setTel($tel)
    {
        $this->container['tel'] = $tel;

        return $this;
    }

    /**
     * Gets quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param int $quantity 注文数
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets customFields
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\CustomFieldValue[]
     */
    public function getCustomFields()
    {
        return $this->container['customFields'];
    }

    /**
     * Sets customFields
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\CustomFieldValue[] $customFields 可変領域。*ordersが指定されていると無視されます。
     *
     * @return $this
     */
    public function setCustomFields($customFields)
    {
        $this->container['customFields'] = $customFields;

        return $this;
    }

    /**
     * Gets orders
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\CustomFieldValueGroup[]
     */
    public function getOrders()
    {
        return $this->container['orders'];
    }

    /**
     * Sets orders
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\CustomFieldValueGroup[] $orders 異なる可変領域指定の注文を一括で作成する場合に利用します。
     *
     * @return $this
     */
    public function setOrders($orders)
    {
        $this->container['orders'] = $orders;

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


