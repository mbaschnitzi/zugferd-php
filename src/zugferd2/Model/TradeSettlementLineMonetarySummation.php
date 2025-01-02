<?php

declare(strict_types=1);

namespace Easybill\ZUGFeRD2\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

class TradeSettlementLineMonetarySummation
{
    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('LineTotalAmount')]
    public Amount $totalAmount;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('ChargeTotalAmount')]
    public ?Amount $chargeTotalAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('AllowanceTotalAmount')]
    public ?Amount $allowanceTotalAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('TaxTotalAmount')]
    public ?Amount $taxTotalAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('GrandTotalAmount')]
    public ?Amount $grandTotalAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[SerializedName('TotalAllowanceChargeAmount')]
    public ?Amount $totalAllowanceChargeAmount = null;

    public static function create(string $totalAmount, string $totalAllowanceChargeAmount = null): self
    {
        $self = new self();
        $self->totalAmount = Amount::create($totalAmount);
        if ($totalAllowanceChargeAmount != null) {
            $self->totalAllowanceChargeAmount = Amount::create($totalAllowanceChargeAmount);
        }
        return $self;
    }
}
