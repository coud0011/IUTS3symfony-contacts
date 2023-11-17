<?php

namespace App\DataFixtures;

use App\Factory\ContactFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $post = ContactFactory::createOne();

        // create/persist 150 contacts with random data from getDefaults()
        ContactFactory::createMany(150);
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            ];
    }
}
