<?php namespace Gateway\One;

use Gateway\One\DataContract\Request\CreateSaleRequestData\ShoppingCart;

class ShoppingCartTest extends \PHPUnit\Framework\TestCase
{
    public function testBirthDate()
    {
        $shoppingCart = new ShoppingCart();

        $deliveryDeadline = \DateTime::createFromFormat('d/m/Y', '31/12/2015');
        $shoppingCart->setDeliveryDeadline($deliveryDeadline);

        $this->assertNotEmpty($shoppingCart->getDeliveryDeadline());
        $this->assertEquals($deliveryDeadline, $shoppingCart->getDeliveryDeadline());
    }

    public function testShoppingCartItemCollection()
    {
        $shoppingCart = new ShoppingCart();

        $this->assertTrue(is_array($shoppingCart->getShoppingCartItemCollection()));
        $this->assertCount(0, $shoppingCart->getShoppingCartItemCollection());

        $shoppingCart->addShoppingCartItem();
        $this->assertCount(1, $shoppingCart->getShoppingCartItemCollection());

        $shoppingCartItemCollection = $shoppingCart->getShoppingCartItemCollection();
        $firstShoppingCartItem = $shoppingCartItemCollection[0];
        $this->assertNotNull($firstShoppingCartItem);
    }
}