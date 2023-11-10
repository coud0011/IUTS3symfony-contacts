<?php

namespace App\Tests\Controller\Contact;

use App\Tests\ControllerTester;

class IndexCest
{
    public function testAssertThatContactIsGood(ControllerTester $I): void
    {
        $I->amOnPage('/contact');
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Liste des contacts');
        $I->see('Liste des contacts', 'h1');
        $I->seeNumberOfElements('li a', 195);
    }
}
