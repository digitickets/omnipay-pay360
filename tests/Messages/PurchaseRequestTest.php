<?php

use DigiTickets\Pay360\Messages\PurchaseRequest;

class PurchaseRequestTest extends PHPUnit_Framework_TestCase
{
    public function testGetData()
    {
        $client = Mockery::mock(\Guzzle\Http\ClientInterface::class);
        $request = Mockery::mock(\Symfony\Component\HttpFoundation\Request::class);

        $request = new PurchaseRequest($client, $request);

        $request->setAmount(10.00);
        $request->setReturnUrl('https://www.example.com/return');
        $request->setCancelUrl('https://www.example.com/cancel');
        $request->setItems(
            [
                [
                    'description' => 'item 1',
                    'price' => 10.00,
                    'quantity' => 1,
                ]
            ]
        );

        $this->assertInstanceOf(\scpService_scpSimpleInvokeRequest::class, $request->getData());
        $this->assertEquals('1000', $request->getData()->sale->saleSummary->amountInMinorUnits);
        $this->assertEquals('Online Sale', $request->getData()->sale->saleSummary->description);
        $this->assertInternalType('array', $request->getData()->sale->items);
        $this->assertEquals(1, count($request->getData()->sale->items));
        $this->assertInstanceOf(scpService_simpleItem::class, $request->getData()->sale->items[0]);
        $this->assertEquals(1000, $request->getData()->sale->items[0]->itemSummary->amountInMinorUnits);
        $this->assertEquals(1, $request->getData()->sale->items[0]->quantity);
        $this->assertEquals('payOnly', $request->getData()->requestType);
        $this->assertEquals('ECOM', $request->getData()->panEntryMethod);
        $this->assertEquals('https://www.example.com/return', $request->getData()->routing->returnUrl);
        $this->assertEquals('https://www.example.com/cancel', $request->getData()->routing->backUrl);
    }
}
