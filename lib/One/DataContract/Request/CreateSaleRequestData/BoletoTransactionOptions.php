<?php

namespace Gateway\One\DataContract\Request\CreateSaleRequestData;

use Gateway\One\DataContract\Common\BaseObject;

/**
 * Class BoletoTransactionOptions
 * @package Gateway\One\DataContract\Request\CreateSaleRequestData
 */
class BoletoTransactionOptions extends BaseObject
{
    /**
     * @var string Código da moeda utilizada
     */
    protected $CurrencyIso;

    /**
     * @var int Número de dias que serão adicionados à data de expiração do boleto
     */
    protected $DaysToAddInBoletoExpirationDate;

    /**
     * @var string URL de retorno webhook
     */
    protected $NotificationUrl;

    /**
     * @return string
     */
    public function getCurrencyIso()
    {
        return $this->CurrencyIso;
    }

    /**
     * @param string $currencyIso
     * @return $this
     */
    public function setCurrencyIso($currencyIso)
    {
        $this->CurrencyIso = $currencyIso;

        return $this;
    }

    /**
     * @return int
     */
    public function getDaysToAddInBoletoExpirationDate()
    {
        return $this->DaysToAddInBoletoExpirationDate;
    }

    /**
     * @param int $daysToAddInBoletoExpirationDate
     * @return $this
     */
    public function setDaysToAddInBoletoExpirationDate($daysToAddInBoletoExpirationDate)
    {
        $this->DaysToAddInBoletoExpirationDate = $daysToAddInBoletoExpirationDate;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getNotificationUrl()
    {
        return $this->NotificationUrl;
    }

    /**
     * @param string $NotificationUrl
     *
     * @return $this
     */
    public function setNotificationUrl($NotificationUrl)
    {
        $this->NotificationUrl = $NotificationUrl;

        return $this;
    }
}