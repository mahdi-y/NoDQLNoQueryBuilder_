<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Player;
use App\Form\PlayerType;
use App\Repository\PlayerRepository;

class StadePController extends AbstractController
{
    #[Route('/stade/p', name: 'app_stade_p')]
    public function index(): Response
    {
        return $this->render('stade_p/index.html.twig', [
            'controller_name' => 'StadePController',
        ]);
    }
    #[Route('/player/add', name: 'player_add')]
            public function Addplayer(ManagerRegistry $doctrine, Request $request): Response
                {
            $player =new Player();
            $form=$this->createForm(PlayerType::class,$player);
            $form->handleRequest($request);
            if($form->isSubmitted()){
                $em= $doctrine->getManager();
                $em->persist($player);
                $em->flush();
                return $this-> redirectToRoute('player_show');
            }
            return $this->render('stade/index.html.twig',[
                'formA'=>$form->createView(),
            ]);
        }
        #[Route('/player/show', name: 'player_show')]
        public function show(PlayerRepository $rep): Response
        {
            $players = $rep->findAll();
            return $this->render('stade/showplayer.html.twig', ['players'=>$players]);
        }
        #[Route('/player/update/{id}', name: 'player_update')]
     public function Updateplayer(ManagerRegistry $doctrine, Request $request, PlayerRepository $rep, $id): Response
     {
        $player = $rep->find($id);
        $form=$this->createForm(PlayerType::class,$player);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em= $doctrine->getManager();
            $em->persist($player);
            $em->flush();
            return $this-> redirectToRoute('player_show');
        }
        return $this->render('stade/updateplayer.html.twig',[
            'formA'=>$form->createView(),
        ]);
     }
     #[Route('/player/delete/{id}', name: 'player_delete')]
     public function deletedelete($id, PlayerRepository $rep, ManagerRegistry $doctrine): Response
     {
         $em= $doctrine->getManager();
         $player= $rep->find($id);
         $em->remove($player);
         $em->flush();
         return $this-> redirectToRoute('player_show');
     }
}
