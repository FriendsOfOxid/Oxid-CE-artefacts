<?php

use Psr\Log\NullLogger;

require_once dirname(__FILE__).'/../bestitAmazon4OxidUnitTestCase.php';

/**
 * Unit test for class bestitAmazonPay4Oxid_order_main
 *
 * @author best it GmbH & Co. KG <info@bestit-online.de>
 * @coversDefaultClass bestitAmazonPay4Oxid_order_main
 */
class bestitAmazonPay4OxidOrderMainTest extends bestitAmazon4OxidUnitTestCase
{
    /**
     * @param bestitAmazonPay4OxidContainer $oContainer
     *
     * @return bestitAmazonPay4Oxid_order_main
     * @throws ReflectionException
     */
    private function _getObject(bestitAmazonPay4OxidContainer $oContainer)
    {
        $oBestitAmazonPay4OxidOrderMain = new bestitAmazonPay4Oxid_order_main();
        $oContainer
            ->method('getLogger')
            ->willReturn(new NullLogger());

        self::setValue($oBestitAmazonPay4OxidOrderMain, '_oContainer', $oContainer);

        return $oBestitAmazonPay4OxidOrderMain;
    }

    /**
     * @group unit
     */
    public function testCreateInstance()
    {
        $oBestitAmazonPay4OxidOrderMain = new bestitAmazonPay4Oxid_order_main();
        self::assertInstanceOf('bestitAmazonPay4Oxid_order_main', $oBestitAmazonPay4OxidOrderMain);
    }

    /**
     * @group unit
     * @covers ::_getContainer()
     * @throws ReflectionException
     */
    public function testGetContainer()
    {
        $oBestitAmazonPay4OxidOrderMain = new bestitAmazonPay4Oxid_order_main();
        self::assertInstanceOf(
            'bestitAmazonPay4OxidContainer',
            self::callMethod($oBestitAmazonPay4OxidOrderMain, '_getContainer')
        );
    }

    /**
     * @group unit
     * @covers ::sendorder()
     * @throws Exception
     */
    public function testSendOrder()
    {
        $oContainer = $this->_getContainerMock();

        $oOrder = $this->_getOrderMock();

        $oOrder->expects($this->exactly(3))
            ->method('load')
            ->with(null)
            ->will($this->onConsecutiveCalls(false, true, true));

        $oOrder->expects($this->exactly(3))
            ->method('getFieldData')
            ->withConsecutive(array('oxPaymentType'),array('oxPaymentType'), array('oxordernr'))
            ->will($this->onConsecutiveCalls('some', 'bestitamazon', 'number'));

        $oObjectFactory = $this->_getObjectFactoryMock();
        $oObjectFactory->expects($this->exactly(3))
            ->method('createOxidObject')
            ->with('oxOrder')
            ->will($this->returnValue($oOrder));

        $oContainer->expects($this->exactly(3))
            ->method('getObjectFactory')
            ->will($this->returnValue($oObjectFactory));

        $oClient = $this->_getClientMock();

        $oClient->expects($this->once())
            ->method('saveCapture')
            ->with($oOrder);

        $oContainer->expects($this->once())
            ->method('getClient')
            ->will($this->returnValue($oClient));

        $oBestitAmazonPay4OxidOrderMain = $this->_getObject($oContainer);
        $oBestitAmazonPay4OxidOrderMain->sendorder();
        $oBestitAmazonPay4OxidOrderMain->sendorder();
        $oBestitAmazonPay4OxidOrderMain->sendorder();
    }
}
