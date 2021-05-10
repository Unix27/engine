<?php


namespace App\Builders\Product\Providers\Joom;


class Price  extends BaseObject
{
    protected $visible = [
        'formatedActivityPrice',
        'formatedPrice',
        'maxActivityAmount',
        'maxAmount',
        'minActivityAmount',
        'minAmount',
        'discount',
        'discountPromotion',
        'activity',
        'bigPreview',
        'bigSellProduct',
        'hiddenBigSalePrice',
        'preSale',
    ];

    public function mapFormatedActivityPrice()
    {
        if(!$prices = data_get($this->raw, 'prices')) return null;
        $min = $prices['min'];
        $max = $prices['max'];
        $result = currency_format(min([$min, $max]), $this->raw['currency']);
        if($max > $min) {
            if($this->raw['currency'] == 'EUR') {
                $result = $min . ' - ' . currency_format($max, $this->raw['currency']);
            } else {
                $result = currency_format($min, $this->raw['currency']) . ' - ' . $max;
            }
        }

        return $result;
    }

    public function mapFormatedPrice()
    {
        if(!$prices = data_get($this->raw, 'msrPrices')) return null;
        $min = $prices['min'];
        $max = $prices['max'];
        $result = currency_format(min([$min, $max]), $this->raw['currency']);
        if($max > $min) {
            if($this->raw['currency'] == 'EUR') {
                $result = $min . ' - ' . currency_format($max, $this->raw['currency']);
            } else {
                $result = currency_format($min , $this->raw['currency']). ' - ' . $max;
            }
        }

        return $result;
    }

    public function mapMaxActivityAmount()
    {
        return $this->getAmountAttribute('prices');
    }

    public function mapMaxAmount()
    {
        return $this->getAmountAttribute('msrPrices');
    }

    public function mapMinActivityAmount()
    {
        return $this->getAmountAttribute('prices');
    }

    public function mapMinAmount()
    {
        return $this->getAmountAttribute('msrPrices');
    }

    public function mapDiscount()
    {
        return data_get($this->raw['lite'], 'discount');
    }

    public function getAmountAttribute($key)
    {
        if(!$rawPrices = data_get($this->raw, $key)) {
            return collect(
                [
                    "currency" => $this->raw['currency'],
                    "formatedAmount",
                    "value",
                ]
            );
        }

        return collect([
            "currency" => $this->raw['currency'],
            "formatedAmount" => currency_format(min($rawPrices), $this->raw['currency']),
            "value" => min($rawPrices),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function relations()
    {
        return [

        ];
    }
}