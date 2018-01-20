<?php

namespace Kanekoelastic\PhpCodenberg\Model;

class Template extends ModelBase implements \ArrayAccess
{
    const STATUS__PUBLIC = 'public';

    const STATUS__PRIVATE = 'private';

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'Template';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $types = [
        'id' => 'string',
        'name' => 'string',
        'keywords' => 'string',
        'comment' => 'string',
        'thumb' => '\Kanekoelastic\PhpCodenberg\Model\TemplateThumb',
        'pdf' => 'string',
        'pageCount' => 'int',
        'selectedPaper' => '\Kanekoelastic\PhpCodenberg\Model\Paper',
        'moq' => 'int',
        'spq' => 'int',
        'lotPrice' => '\Kanekoelastic\PhpCodenberg\Model\LotPrice[]',
        'formatId' => 'int',
        'format' => '\Kanekoelastic\PhpCodenberg\Model\Format',
        'customFields' => '\Kanekoelastic\PhpCodenberg\Model\CustomField[]',
        'status' => 'string',
        'createdAt' => '\DateTime',
        'updatedAt' => '\DateTime',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $formats = [
        'id' => null,
        'name' => null,
        'keywords' => null,
        'comment' => null,
        'thumb' => null,
        'pdf' => null,
        'pageCount' => 'int64',
        'selectedPaper' => null,
        'moq' => 'int64',
        'spq' => 'int64',
        'lotPrice' => null,
        'formatId' => 'int64',
        'format' => null,
        'customFields' => null,
        'status' => null,
        'createdAt' => 'date-time',
        'updatedAt' => 'date-time',
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
        'keywords' => 'keywords',
        'comment' => 'comment',
        'thumb' => 'thumb',
        'pdf' => 'pdf',
        'pageCount' => 'page_count',
        'selectedPaper' => 'selected_paper',
        'moq' => 'moq',
        'spq' => 'spq',
        'lotPrice' => 'lot_price',
        'formatId' => 'format_id',
        'format' => 'format',
        'customFields' => 'custom_fields',
        'status' => 'status',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'keywords' => 'setKeywords',
        'comment' => 'setComment',
        'thumb' => 'setThumb',
        'pdf' => 'setPdf',
        'pageCount' => 'setPageCount',
        'selectedPaper' => 'setSelectedPaper',
        'moq' => 'setMoq',
        'spq' => 'setSpq',
        'lotPrice' => 'setLotPrice',
        'formatId' => 'setFormatId',
        'format' => 'setFormat',
        'customFields' => 'setCustomFields',
        'status' => 'setStatus',
        'createdAt' => 'setCreatedAt',
        'updatedAt' => 'setUpdatedAt',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'keywords' => 'getKeywords',
        'comment' => 'getComment',
        'thumb' => 'getThumb',
        'pdf' => 'getPdf',
        'pageCount' => 'getPageCount',
        'selectedPaper' => 'getSelectedPaper',
        'moq' => 'getMoq',
        'spq' => 'getSpq',
        'lotPrice' => 'getLotPrice',
        'formatId' => 'getFormatId',
        'format' => 'getFormat',
        'customFields' => 'getCustomFields',
        'status' => 'getStatus',
        'createdAt' => 'getCreatedAt',
        'updatedAt' => 'getUpdatedAt',
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
        $this->container['keywords'] = isset($data['keywords']) ? $data['keywords'] : null;
        $this->container['comment'] = isset($data['comment']) ? $data['comment'] : null;
        $this->container['thumb'] = isset($data['thumb']) ? $data['thumb'] : null;
        $this->container['pdf'] = isset($data['pdf']) ? $data['pdf'] : null;
        $this->container['pageCount'] = isset($data['pageCount']) ? $data['pageCount'] : null;
        $this->container['selectedPaper'] = isset($data['selectedPaper']) ? $data['selectedPaper'] : null;
        $this->container['moq'] = isset($data['moq']) ? $data['moq'] : null;
        $this->container['spq'] = isset($data['spq']) ? $data['spq'] : null;
        $this->container['lotPrice'] = isset($data['lotPrice']) ? $data['lotPrice'] : null;
        $this->container['formatId'] = isset($data['formatId']) ? $data['formatId'] : null;
        $this->container['format'] = isset($data['format']) ? $data['format'] : null;
        $this->container['customFields'] = isset($data['customFields']) ? $data['customFields'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['createdAt'] = isset($data['createdAt']) ? $data['createdAt'] : null;
        $this->container['updatedAt'] = isset($data['updatedAt']) ? $data['updatedAt'] : null;
    }

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS__PUBLIC,
            self::STATUS__PRIVATE,
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

        $allowedValues = $this->getStatusAllowableValues();

        if (!in_array($this->container['status'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
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
        $allowedValues = $this->getStatusAllowableValues();

        if (!in_array($this->container['status'], $allowedValues)) {
            return false;
        }
        return true;
    }

    /**
     * Gets id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id.
     *
     * @param string $id id
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
     * @param string $name 名称
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets keywords.
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->container['keywords'];
    }

    /**
     * Sets keywords.
     *
     * @param string $keywords キーワード
     *
     * @return $this
     */
    public function setKeywords($keywords)
    {
        $this->container['keywords'] = $keywords;

        return $this;
    }

    /**
     * Gets comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment.
     *
     * @param string $comment コメント
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->container['comment'] = $comment;

        return $this;
    }

    /**
     * Gets thumb.
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\TemplateThumb
     */
    public function getThumb()
    {
        return $this->container['thumb'];
    }

    /**
     * Sets thumb.
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\TemplateThumb $thumb thumb
     *
     * @return $this
     */
    public function setThumb($thumb)
    {
        $this->container['thumb'] = $thumb;

        return $this;
    }

    /**
     * Gets pdf.
     *
     * @return string
     */
    public function getPdf()
    {
        return $this->container['pdf'];
    }

    /**
     * Sets pdf.
     *
     * @param string $pdf PDFファイルのURL
     *
     * @return $this
     */
    public function setPdf($pdf)
    {
        $this->container['pdf'] = $pdf;

        return $this;
    }

    /**
     * Gets pageCount.
     *
     * @return int
     */
    public function getPageCount()
    {
        return $this->container['pageCount'];
    }

    /**
     * Sets pageCount.
     *
     * @param int $pageCount ページ数
     *
     * @return $this
     */
    public function setPageCount($pageCount)
    {
        $this->container['pageCount'] = $pageCount;

        return $this;
    }

    /**
     * Gets selectedPaper.
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\Paper
     */
    public function getSelectedPaper()
    {
        return $this->container['selectedPaper'];
    }

    /**
     * Sets selectedPaper.
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\Paper $selectedPaper selectedPaper
     *
     * @return $this
     */
    public function setSelectedPaper($selectedPaper)
    {
        $this->container['selectedPaper'] = $selectedPaper;

        return $this;
    }

    /**
     * Gets moq.
     *
     * @return int
     */
    public function getMoq()
    {
        return $this->container['moq'];
    }

    /**
     * Sets moq.
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
     * Gets spq.
     *
     * @return int
     */
    public function getSpq()
    {
        return $this->container['spq'];
    }

    /**
     * Sets spq.
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
     * Gets lotPrice.
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\LotPrice[]
     */
    public function getLotPrice()
    {
        return $this->container['lotPrice'];
    }

    /**
     * Sets lotPrice.
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
     * Gets formatId.
     *
     * @return int
     */
    public function getFormatId()
    {
        return $this->container['formatId'];
    }

    /**
     * Sets formatId.
     *
     * @param int $formatId プロダクトのID
     *
     * @return $this
     */
    public function setFormatId($formatId)
    {
        $this->container['formatId'] = $formatId;

        return $this;
    }

    /**
     * Gets format.
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\Format
     */
    public function getFormat()
    {
        return $this->container['format'];
    }

    /**
     * Sets format.
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\Format $format format
     *
     * @return $this
     */
    public function setFormat($format)
    {
        $this->container['format'] = $format;

        return $this;
    }

    /**
     * Gets customFields.
     *
     * @return \Kanekoelastic\PhpCodenberg\Model\CustomField[]
     */
    public function getCustomFields()
    {
        return $this->container['customFields'];
    }

    /**
     * Sets customFields.
     *
     * @param \Kanekoelastic\PhpCodenberg\Model\CustomField[] $customFields 設定されている可変領域の情報
     *
     * @return $this
     */
    public function setCustomFields($customFields)
    {
        $this->container['customFields'] = $customFields;

        return $this;
    }

    /**
     * Gets status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status.
     *
     * @param string $status ステータス
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();

        if ($status !== null && !in_array($status, $allowedValues)) {
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
     * @param \DateTime $createdAt 作成日時
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->container['createdAt'] = $createdAt;

        return $this;
    }

    /**
     * Gets updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->container['updatedAt'];
    }

    /**
     * Sets updatedAt.
     *
     * @param \DateTime $updatedAt 更新日時
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
