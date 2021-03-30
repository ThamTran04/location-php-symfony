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
    public function index(AdRepository $repo, $page=1): Response
    {
        $limit = 5; //nbrs d'enregistrements
        $start = ($page-1)*$limit;
        $total_articles = count($repo->findAll());
        $repo = $repo->findBy([], [], $limit, $start);
        $pages =ceil( ($total_articles/$limit));
        dump($repo);
        return $this->render('admin/ad/index.html.twig', [
            'ads' => $repo,
            'page'=>$page,
            'pages'=>$pages
        ]);
    }
}
