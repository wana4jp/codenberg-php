<?php

namespace Kanekoelastic\PhpCodenberg\Model;

use \ArrayAccess;
use \Kanekoelastic\PhpCodenberg\ObjectSerializer;

class OrderDetail implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'OrderDetail';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
        'displayId' => 'string',
        'name' => 'string',
        'pref' => '\Kanekoelastic\PhpCodenberg\Model\Prefecture',
        'postalCode' => 'string',
        'city' => 'string',
        'addressLine1' => 'string',
        'addressLine2' => 'string',
        'organization' => 'string',
        'tel' => 'string',
        'quantity' => 'int',
        'orderNumber' => 'int',
        'templateId' => 'int',
        'customFields' => '\Kanekoelastic\PhpCodenberg\Model\CustomFieldValue[]',
        'status' => 'string',
        'paymentStatus' => 'string',
        'createdAt' => '\DateTime',
        'updatedAt' => '\DateTime'
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
        'pref' => null,
        'postalCode' => null,
        'city' => null,
        'addressLine1' => null,
        'addressLine2' => null,
        'organization' => null,
        'tel' => null,
        'quantity' => 'int64',
        'orderNumber' => 'int64',
        'templateId' => 'int64',
        'customFields' => null,
        'status' => null,
        'paymentStatus' => null,
        'createdAt' => 'date-time',
        'updatedAt' => 'date-time'
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
        'pref' => 'pref',
        'postalCode' => 'postal_code',
        'city' => 'city',
        'addressLine1' => 'address_line1',
        'addressLine2' => 'address_line2',
        'organization' => 'organization',
        'tel' => 'tel',
        'quantity' => 'quantity',
        'orderNumber' => 'order_number',
        'templateId' => 'template_id',
        'customFields' => 'custom_fields',
        'status' => 'status',
        'paymentStatus' => 'payment_status',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
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
        'pref' => 'setPref',
        'postalCode' => 'setPostalCode',
        'city' => 'setCity',
        'addressLine1' => 'setAddressLine1',
        'addressLine2' => 'setAddressLine2',
        'organization' => 'setOrganization',
        'tel' => 'setTel',
        'quantity' => 'setQuantity',
        'orderNumber' => 'setOrderNumber',
        'templateId' => 'setTemplateId',
        'customFields' => 'setCustomFields',
        'status' => 'setStatus',
        'paymentStatus' => 'setPaymentStatus',
        'createdAt' => 'setCreatedAt',
        'updatedAt' => 'setUpdatedAt'
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
        'pref' => 'getPref',
        'postalCode' => 'getPostalCode',
        'city' => 'getCity',
        'addressLine1' => 'getAddressLine1',
        'addressLine2' => 'getAddressLine2',
        'organization' => 'getOrganization',
        'tel' => 'getTel',
        'quantity' => 'getQuantity',
        'orderNumber' => 'getOrderNumber',
        'templateId' => 'getTemplateId',
        'customFields' => 'getCustomFields',
        'status' => 'getStatus',
        'paymentStatus' => 'getPaymentStatus',
        'createdAt' => 'getCreatedAt',
        'updatedAt' => 'getUpdatedAt'
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

    const STATUS_CHECKING = 'checking';
    const STATUS_PRINTING = 'printing';
    const STATUS_DELIVERY_PREPARATION = 'delivery_preparation';
    const STATUS_DELIVERY = 'delivery';
    const PAYMENT_STATUS_UNPAID = 'unpaid';
    const PAYMENT_STATUS_PAID = 'paid';
    const PAYMENT_STATUS_FAILED = 'failed';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_CHECKING,
            self::STATUS_PRINTING,
            self::STATUS_DELIVERY_PREPARATION,
            self::STATUS_DELIVERY,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPaymentStatusAllowableValues()
    {
        return [
            self::PAYMENT_STATUS_UNPAID,
            self::PAYMENT_STATUS_PAID,
            self::PAYMENT_STATUS_FAILED,
        ];
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
        $this->container['pref'] = isset($data['pref']) ? $data['pref'] : null;
        $this->container['postalCode'] = isset($data['postalCode']) ? $data['postalCode'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['addressLine1'] = isset($data['addressLine1']) ? $data['addressLine1'] : null;
        $this->container['addressLine2'] = isset($data['addressLine2']) ? $data['addressLine2'] : null;
        $this->container['organization'] = isset($data['organization']) ? $data['organization'] : null;
        $this->container['tel'] = isset($data['tel']) ? $data['tel'] : null;
        $this->container['quantity'] = isset($data['quantity']) ? $data['quantity'] : null;
        $this->container['orderNumber'] = isset($data['orderNumber']) ? $data['orderNumber'] : null;
        $this->container['templateId'] = isset($data['templateId']) ? $data['templateId'] : null;
        $this->container['customFields'] = isset($data['customFields']) ? $data['customFields'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['paymentStatus'] = isset($data['paymentStatus']) ? $data['paymentStatus'] : null;
        $this->container['createdAt'] = isset($data['createdAt']) ? $data['createdAt'] : null;
        $this->container['updatedAt'] = isset($data['updatedAt']) ? $data['updatedAt'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($this->container['status'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPaymentStatusAllowableValues();
        if (!in_array($this->container['paymentStatus'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'paymentStatus', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

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

        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($this->container['status'], $allowedValues)) {
            return false;
        }
        $allowedValues = $this->getPaymentStatusAllowableValues();
        if (!in_array($this->container['paymentStatus'], $allowedValues)) {
            return false;
        }
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
     * @param string $displayId 注文明細番号
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
     * @return \Kanekoelastic\PhpCodenberg\Model\Prefecture
     */
    public function getPref()
    {
        return $this->container['pref'];
    }

    /**
     * Sets pref
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\Prefecture $pref pref
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
     * @param string $addressLine1 配送先:住所1
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
     * @param string $addressLine2 配送先:住所2
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
     * @param string $organization 配送先:組織、会社名
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
     * @param string $tel 配送先:電話番号
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
     * @param int $quantity 注文数（total_quantityのシノニム）
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets orderNumber
     *
     * @return int
     */
    public function getOrderNumber()
    {
        return $this->container['orderNumber'];
    }

    /**
     * Sets orderNumber
     *
     * @param int $orderNumber 注文数（total_quantityのシノニム）
     *
     * @return $this
     */
    public function setOrderNumber($orderNumber)
    {
        $this->container['orderNumber'] = $orderNumber;

        return $this;
    }

    /**
     * Gets templateId
     *
     * @return int
     */
    public function getTemplateId()
    {
        return $this->container['templateId'];
    }

    /**
     * Sets templateId
     *
     * @param int $templateId 注文対象のテンプレートID
     *
     * @return $this
     */
    public function setTemplateId($templateId)
    {
        $this->container['templateId'] = $templateId;

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
     * @param \Kanekoelastic\PhpCodenberg\Model\CustomFieldValue[] $customFields 設定した可変領域の値
     *
     * @return $this
     */
    public function setCustomFields($customFields)
    {
        $this->container['customFields'] = $customFields;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status ステータス
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets paymentStatus
     *
     * @return string
     */
    public function getPaymentStatus()
    {
        return $this->container['paymentStatus'];
    }

    /**
     * Sets paymentStatus
     *
     * @param string $paymentStatus 支払決済ステータス
     *
     * @return $this
     */
    public function setPaymentStatus($paymentStatus)
    {
        $allowedValues = $this->getPaymentStatusAllowableValues();
        if (!is_null($paymentStatus) && !in_array($paymentStatus, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'paymentStatus', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['paymentStatus'] = $paymentStatus;

        return $this;
    }

    /**
     * Gets createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['createdAt'];
    }

    /**
     * Sets createdAt
     *
     * @param \DateTime $createdAt 注文日時
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->container['createdAt'] = $createdAt;

        return $this;
    }

    /**
     * Gets updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->container['updatedAt'];
    }

    /**
     * Sets updatedAt
     *
     * @param \DateTime $updatedAt 情報更新日時
     *
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->container['updatedAt'] = $updatedAt;

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


