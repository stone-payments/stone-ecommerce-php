<?php namespace Gateway\One;

use Gateway\One\DataContract\Request\CreateSaleRequestData\Buyer;

class BuyerTest extends \PHPUnit\Framework\TestCase
{
    public function testBirthDate()
    {
        $buyer = new Buyer();

        $birthDate = \DateTime::createFromFormat('d/m/Y', '11/05/1990');
        $buyer->setBirthDate($birthDate);

        $this->assertNotEmpty($buyer->getBirthDate());
        $this->assertEquals($birthDate, $buyer->getBirthDate());
    }
}