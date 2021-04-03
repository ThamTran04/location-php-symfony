<?php

namespace App\Controller;



use App\Repository\AdRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(EntityManagerInterface $manager,AdRepository $repo): Response
    {

    	$bestAds=$manager->createQuery(
    		'SELECT AVG(c.rating) as note, a.title, a.id, u.firstName, u.lastName, u.picture FROM App\Entity\Comment c
    		JOIN c.ad a
    		JOIN a.author u
    		GROUP BY a 
    		ORDER BY note ASC'
    	)->setMaxResults(3)->getResult();

    	//dump($bestAds);


    	$ads=$repo->myFindAdPriceRooms(48,3);

    	dump($ads);

        return $this->render('home/index.html.twig', [
           
        ]);
    }
}
