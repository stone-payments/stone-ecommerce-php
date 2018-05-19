<?php namespace Gateway\One;

use Gateway\One\DataContract\Enum\CreditCardBrandEnum;
use Gateway\One\DataContract\Request\CreateSaleRequestData\CreditCard;
use Gateway\One\Helper\CreditCardHelper;

class CreditCardHelperTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateCreditCard_Failure()
    {
        try 
        {
            $creditCard = CreditCardHelper::createCreditCard("", "", "", "");        
            $this->assertFalse($creditCard);
        } 
        catch (\Gateway\One\DataContract\Report\CreditCardError $e) 
        {
            // force a fail:
            $this->assertFalse(false);
        }        
    }

    public function testCreateCreditCard_Success()
    {
        $expected = new CreditCard();
        $expected->setCreditCardBrand(CreditCardBrandEnum::MASTERCARD);
        $expected->setCreditCardNumber("5555444433332222");
        $expected->setExpMonth(12);
        $expected->setExpYear(30);
        $expected->setHolderName("gateway");
        $expected->setSecurityCode("999");
        $creditCard = CreditCardHelper::createCreditCard(" 5555 4444 3333 2222 ", " gateway ", " 12/30 ", " 999 ");
        $this->assertEquals($expected, $creditCard);

        $expected->setExpYear(2030);
        $creditCard = CreditCardHelper::createCreditCard(" 5555 4444 3333 2222 ", " gateway ", " 12/2030 ", " 999 ");
        $this->assertEquals($expected, $creditCard);
    }
}