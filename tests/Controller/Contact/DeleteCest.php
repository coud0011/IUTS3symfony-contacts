<?php

namespace App\Tests\Controller\Contact;

use App\Factory\CategoryFactory;
use App\Factory\ContactFactory;
use App\Tests\ControllerTester;

class DeleteCest
{
    public function form(ControllerTester $I): void
    {
        CategoryFactory::createOne();
        ContactFactory::createOne([
            'firstname' => 'Homer',
            'lastname' => 'Simpson',
        ]);

        $I->amOnPage('/contact/1/delete');

        $I->seeInTitle('Suppression de Simpson, Homer');
        $I->see('Suppression de Simpson, Homer', 'h1');
    }
}
