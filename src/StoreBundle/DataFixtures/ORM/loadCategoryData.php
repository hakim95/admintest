<?php

namespace StoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use StoreBundle\Entity\Category;

class loadCategoryData implements FixtureInterface{
    
    public function load(ObjectManager $manager) {
        
        $category = new Category();
        $category->setCategoryName('Television');
        $manager->persist($category);
        
        $category2 = new Category();
        $category2->setCategoryName('Ordinateur');
        $manager->persist($category2);
        
        $category3 = new Category();
        $category3->setCategoryName('Appareil Photo');
        $manager->persist($category3);
        
        $category4 = new Category();
        $category4->setCategoryName('Imprimante');
        $manager->persist($category4);
        
        $category5 = new Category();
        $category5->setCategoryName('Console');        
        $manager->persist($category5);
        
        $category6 = new Category();
        $category6->setCategoryName('Telephone');        
        $manager->persist($category6);
        
        $manager->flush();
        
    }
    
}
