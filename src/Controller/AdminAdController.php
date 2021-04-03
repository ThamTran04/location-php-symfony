<?php

namespace App\Controller;

use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAdController extends AbstractController
{
    /**
     * @Route("/admin/ads/{page}", name="admin_ads_index")
     */
    public function index(AdRepository $repo,$page=1): Response
    {

    	$limit = 1; // nbrs d'enregistrements


    	$start = ($page - 1 ) * $limit;
    	// page = 1  => $start = ( 1-1 ) * $limit = 0
    	// page = 2  => $start = ( 2-1 ) * $limit = 10
    	// page = 3  => $start = ( 3-1 ) * $limit = 20
		$total_articles= count($repo->findAll());


// exemple:  findBy(['author'=>"44"],["rooms"=>desc],nbrs enregistrements,d'ou on part )
    	$repo = $repo->findBy([],[],$limit,$start);

    	

    	$pages = ceil($total_articles/$limit);

    

        return $this->render('admin/ad/index.html.twig', [
            'ads'=>$repo,
            'page'=>$page,
            'pages'=>$pages
        ]);
    }
}
