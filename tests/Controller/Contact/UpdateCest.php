<?php

namespace App\Tests\Controller\Contact;

use App\Factory\CategoryFactory;
use App\Factory\ContactFactory;
use App\Tests\ControllerTester;

class UpdateCest
{
    public function form(ControllerTester $I): void
    {
        CategoryFactory::createOne();
        ContactFactory::createOne([
            'firstname' => 'Homer',
            'lastname' => 'Simpson',
        ]);

        $I->amOnPage('/contact/1/update');

        $I->seeInTitle('Édition de Simpson, Homer');
        $I->see('Édition de Simpson, Homer', 'h1');
    }
}
