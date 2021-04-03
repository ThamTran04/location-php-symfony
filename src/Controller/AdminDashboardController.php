<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="admin_dashboard_index")
     */
    public function index(EntityManagerInterface $manager): Response
    {

    	//$users = $manager->createQuery("SELECT u FROM App\Entity\User u")->getResult();
    	//dump($users);

    	$users = $manager->createQuery("SELECT count(u) FROM App\Entity\User u")->getSingleScalarResult();
    	//dump($users);

    	$ads = $manager->createQuery("SELECT count(a) FROM App\Entity\Ad a")->getSingleScalarResult();

    	$bookings = $manager->createQuery("SELECT count(b) FROM App\Entity\Booking b")->getSingleScalarResult();

    	$comments = $manager->createQuery("SELECT count(c) FROM App\Entity\Comment c")->getSingleScalarResult();


    	


        return $this->render('admin/dashboard/index.html.twig', [
           'users'=>$users, 
           'ads'=>$ads, 
           'bookings'=>$bookings, 
           'comments'=>$comments,
        ]);
    }
}
