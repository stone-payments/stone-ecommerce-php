<?php

namespace Gateway\One\DataContract\Request\CreateSaleRequestData;

use Gateway\One\DataContract\Common\BaseObject;

/**
 * Class CreditCardTransactionOptions
 * @package Gateway\One\DataContract\Request\CreateSaleRequestData
 */
class CreditCardTransactionOptions extends BaseObject
{
    /**
     * @var string Código ISO da moeda
     */
    protected $CurrencyIso;

    /**
     * @var int Tempo em minutos para que a transação seja capturada
     */
    protected $CaptureDelayInMinutes;

    /**
     * @var int Valor total em centavos, para uma transação Iata, utilizada em companhias aéreas.
     */
    protected $IataAmountInCents;

    /**
     * @var int Código do meio de pagamento específico onde a transação será processada,
     * Ex: Stone, Cielo, etc. A plataforma One seleciona automaticamente o meio de pagamento de acordo com a ordem de prioridade definida no setup da loja.
     * Sendo assim, este campo deve ser informado apenas caso uma transação deva ser processada em um meio de pagamento específico.
     * Observação, nos casos onde a loja informa o meio de pagamento a retentativa multi-acquirer não é realizada
     */
    protected $PaymentMethodCode;

    /**
     * @var string Nome que será exibido na fatura do cartão
     */
    protected $SoftDescriptorText;

    /**
     * @var float Taxa de juros
     */
    protected $InterestRate;

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
    public function getCaptureDelayInMinutes()
    {
        return $this->CaptureDelayInMinutes;
    }

    /**
     * @param int $captureDelayInMinutes
     * @return $this
     */
    public function setCaptureDelayInMinutes($captureDelayInMinutes)
    {
        $this->CaptureDelayInMinutes = $captureDelayInMinutes;

        return $this;
    }

    /**
     * @return int
     */
    public function getIataAmountInCents()
    {
        return $this->IataAmountInCents;
    }

    /**
     * @param int $iataAmountInCents
     * @return $this
     */
    public function setIataAmountInCents($iataAmountInCents)
    {
        $this->IataAmountInCents = $iataAmountInCents;

        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentMethodCode()
    {
        return $this->PaymentMethodCode;
    }

    /**
     * @param int $paymentMethodCode
     * @return $this
     */
    public function setPaymentMethodCode($paymentMethodCode)
    {
        $this->PaymentMethodCode = $paymentMethodCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getSoftDescriptorText()
    {
        return $this->SoftDescriptorText;
    }

    /**
     * @param string $softDescriptorText
     * @return $this
     */
    public function setSoftDescriptorText($softDescriptorText)
    {
        $this->SoftDescriptorText = $softDescriptorText;

        return $this;
    }

    /**
     * @return float
     */
    public function getInterestRate()
    {
        return $this->InterestRate;
    }

    /**
     * @param float $interestRate
     * @return $this
     */
    public function setInterestRate($interestRate)
    {
        $this->InterestRate = $interestRate;

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