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
		$titre = "titre de l'annonce n°!";
		$slug = $slugify->slugify($titre);

		for ($i = 1; $i <= 30; $i++) {

			$ad = new Ad();

			$ad->setTitle("Titre de l'annonce n° $i")
				->setSlug("$slug.$i")
				->setCoverImage("https://via.placeholder.com/300")
				->setIntroduction("<p>Introduction de l'annonce $i</p>")
				->setContent("<p>Description de l'<b>annonce $i</b></p>")
				->setPrice(mt_rand(40, 150))
				->setRooms(mt_rand(1, 5));

			// ajout d'image à une annonce
			for ($j = 0; $j < mt_rand(2, 5); $j++) {
				$image = new Image();
				$image->setUrl('https://via.placeholder.com/300')
					->setCaption("Légende de l'image $i")
					->setAd($ad);
				$manager->persist($image);
			}

			// boi vi sau etape tren thi chua co id vi annonce chua duoc tao ra trong bdd. Do do phai enregistrer annonce 1 lan trong bdd de tao ra id roi lai enregistre dans la bdd
			$manager->persist($ad); // garde tout en mémoire
			$manager->flush(); // enregistre tout dans la bdd

			$slug2 = $ad->getSlug() . '_' . $ad->getId(); //ajoute Id dans le slug
			$ad->setSlug($slug2);

			$manager->persist($ad);
			$manager->flush();
		}
	}
}
