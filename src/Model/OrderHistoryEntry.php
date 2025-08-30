<?php

namespace BillbeeDe\BillbeeAPI\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

class OrderHistoryEntry
{
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("Created")
     */
    private DateTime $created;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EventTypeName")
     */
    private ?string $eventTypeName;
    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Text")
     */
    private ?string $text;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EmployeeName")
     */
    private ?string $employeeName;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("TypeId")
     */
    private ?int $typeId;

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): self
    {
        $this->created = $created;
        return $this;
    }

    public function getEventTypeName(): ?string
    {
        return $this->eventTypeName;
    }

    public function setEventTypeName(?string $eventTypeName): self
    {
        $this->eventTypeName = $eventTypeName;
        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getEmployeeName(): ?string
    {
        return $this->employeeName;
    }

    public function setEmployeeName(?string $employeeName): self
    {
        $this->employeeName = $employeeName;
        return $this;
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function setTypeId(?int $typeId): self
    {
        $this->typeId = $typeId;
        return $this;
    }
}
