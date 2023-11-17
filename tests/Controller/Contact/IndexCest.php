<?php

namespace App\Tests\Controller\Contact;

use App\Factory\ContactFactory;
use App\Tests\ControllerTester;

class IndexCest
{
    public function testAssertThatContactIsGood(ControllerTester $I): void
    {
        $I->amOnPage('/contact');
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Liste des contacts');
        $I->see('Liste des contacts', 'h1');
    }

    public function testAssertThatContactLinksAreWorking(ControllerTester $I): void
    {
        ContactFactory::createOne(['firstname' => 'Joe', 'lastname' => 'Aaaaaaaaaaaaaaa']);
        ContactFactory::createMany(5);
        $I->amOnPage('/contact');
        $I->see('Aaaaaaaaaaaaaaa, Joe');
        $I->click('Aaaaaaaaaaaaaaa, Joe');
        $I->seeResponseCodeIsSuccessful();
        $I->seeCurrentRouteIs('app_contact_id');
        $I->seeInCurrentUrl('/contact/1');
    }

    public function testSearchIsGood(ControllerTester $I): void
    {
        ContactFactory::createMany(2);
        ContactFactory::createOne(['firstname' => 'Aaron', 'lastname' => 'Bonjour']);
        ContactFactory::createOne(['firstname' => 'Joe', 'lastname' => 'Aaaaaaaaaaaaaaa']);
        $I->amOnPage('/contact?search=Aa');
        $I->canSeeNumberOfElements('li.contacts', 2);
    }
}
