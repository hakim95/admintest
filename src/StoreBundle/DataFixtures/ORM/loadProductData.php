<?php

namespace StoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use StoreBundle\Entity\Product;

class loadProductData implements FixtureInterface {
    
    public function load(ObjectManager $manager) {
        
        $product = new Product();
        $product->setProductName('Iphone 6S');
        $product->setProductPrice('759.00');
        $manager->persist($product);
        
        $product2 = new Product();
        $product2->setProductName('HP Pavillon 123');
        $product2->setProductPrice('599.00');
        $manager->persist($product2);
        
        $product3 = new Product();
        $product3->setProductName('PS4');
        $product3->setProductPrice('359.00');
        $manager->persist($product3);
        
        $manager->flush();
        
    }
}
