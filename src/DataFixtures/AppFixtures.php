<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use App\Entity\Image;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


        $slugify = new Slugify();
        $title="Titré de l'ànnonçe n°!";
        $slug=$slugify->slugify($title);
        
    	for ($i=1; $i <=30 ; $i++) { 

    		$ad = new Ad();

    		$ad->setTitle("Titre de l'annonce n° $i")
    			-> setSlug("$slug.$i")
    			-> setCoverImage("https://via.placeholder.com/300")
    			-> setIntroduction("<p>Introduction de l'<b>annonce $i</b></p>")
    			-> setContent("<p>Description de l'<b>annonce $i</b></p>")
    			-> setPrice(mt_rand(40,150))
    			-> setRooms(mt_rand(1,5));


            // ajout d'images à une annonce
                for ($j=0; $j < mt_rand(2,5) ; $j++) { 
                   
                    $image = new Image();
                    $image->setUrl("https://via.placeholder.com/300");
                   $image->setCaption("Légende de l'image $j");
                    $image->setAd($ad);

                    $manager->persist($image);


                }



    		$manager->persist($ad);
			$manager->flush();

			$slug2=$ad->getSlug().'_'.$ad->getId();
			$ad->setSlug($slug2);

			$manager->persist($ad);
			$manager->flush();

    	}



        
    }
}
