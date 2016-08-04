<?php

namespace StoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use StoreBundle\Entity\Store;

class LoadStoreData implements FixtureInterface {
    
    public function load(ObjectManager $manager) {
        
        $store = new Store();
        $store->setStoreName('Fnac');
        $store->setStoreAddress('12 rue voltaire');
        $store->setStoreCp(92230);
        $store->setStoreCity('Gennevilliers');
        $store->setStoreCountry('France');
        $manager->persist($store);
        
        $store2 = new Store();
        $store2->setStoreName('Darty');
        $store2->setStoreAddress('9 boulevard Victor Hugo');
        $store2->setStoreCp(92110);
        $store2->setStoreCity('Clichy');
        $store2->setStoreCountry('France');
        $manager->persist($store2);
        
        $manager->flush();
        
    }
    
}
