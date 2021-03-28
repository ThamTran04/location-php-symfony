<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use App\Entity\Image;
use App\Entity\User;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
	private $passwordEncoder;

	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
		$this->passwordEncoder = $passwordEncoder;
	}

	public function load(ObjectManager $manager)
	{


		$slugify = new Slugify();
		$title = "Titré de l'ànnonçe n°!";
		$slug = $slugify->slugify($title);
		for ($u = 1; $u <= 5; $u++) {
			$user = new User();
			$user->setFirstName("prénom$u")
				->setLastName("nom$u")
				->setSlug("prenom$u-nom$u")
				->setEmail("test$u@test.fr")
				->setPicture("https://via.placeholder.com/64")
				->setHash($this->passwordEncoder->encodePassword($user, 'password')) //
				->setIntroduction("introduction prénom$u nom$u")
				->setDescription("description de prénom$u nom$u: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita esse molestias est alias doloremque, ipsum laboriosam et illo explicabo consectetur, cupiditate quae adipisci, iusto obcaecati fugiat possimus magnam deleniti ipsam.");
			$manager->persist($user);
			$manager->flush();

			for ($i = 1; $i <= mt_rand(1, 5); $i++) {

				$ad = new Ad();

				$ad->setTitle("Titre de l'annonce n° $i")
					->setSlug("$slug.$i")
					->setCoverImage("https://via.placeholder.com/300")
					->setIntroduction("<p>Introduction de l'<b>annonce $i</b></p>")
					->setContent("<p>Description de l'<b>annonce $i</b></p>")
					->setPrice(mt_rand(40, 150))
					->setRooms(mt_rand(1, 5))
					->setAutor($user);


				// ajout d'images à une annonce
				for ($j = 0; $j < mt_rand(2, 5); $j++) {

					$image = new Image();
					$image->setUrl("https://via.placeholder.com/300");
					$image->setCaption("Légende de l'image $j");
					$image->setAd($ad);

					$manager->persist($image);
				}



				$manager->persist($ad);
				$manager->flush();

				$slug2 = $ad->getSlug() . '_' . $ad->getId();
				$ad->setSlug($slug2);

				$manager->persist($ad);
				$manager->flush();
			}
		}
	}
}
