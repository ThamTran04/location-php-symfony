<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
    	for ($i=1; $i <=30 ; $i++) { 

    		$ad = new Ad();

    		$ad->setTitle("Titre de l'annonce n° $i")
    			-> setSlug("titre-de-l-annonce-n-$i")
    			-> setCoverImage("https://via.placeholder.com/300")
    			-> setIntroduction("<p>Introduction de l'annonce $i</p>")
    			-> setContent("<p>Description de l'<b>annonce $i</b></p>")
    			-> setPrice(mt_rand(40,150))
    			-> setRooms(mt_rand(1,5));

    		$manager->persist($ad);
			$manager->flush();

			$slug2=$ad->getSlug().'_'.$ad->getId();
			$ad->setSlug($slug2);

			$manager->persist($ad);
			$manager->flush();

    	}



        
    }
}
