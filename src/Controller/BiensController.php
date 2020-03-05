<?php

namespace App\Controller;

use App\Entity\Proprety;
use App\Repository\PropretyRepository;
use Doctrine\ORM\EntityManagerInterface;  //doctrine.orm.default_entity_manager
//use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class BiensController extends AbstractController
{

     // cette methode pour dire que j'aimerai bien recuperer le repository
     // et si on a plein de methode qui ont besoin de la repository il vaut mieux
     // d'utiliser le connstruct sinon on peut l'injecter dans la methode qui l'a besoin
     //
    /**
     * @var PropretyRepository
     */

    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(PropretyRepository $repository ,EntityManagerInterface $em)
    {
        $this->repository=$repository;
        $this->em=$em;

    }

    /**
     * @Route("/biens", name="biens.index")
     * @return Response
     */
    public function index(): Response
    {

        //POUR METTRE A JOUR MON ENTITE
        /*
          $proprety=$this->repository->findAllVisible();
          $proprety[0]->setSold(true);
           $this->em->flush();
        */
        return $this->render('biens/index.html.twig', ['current_menu' => 'bien']);
    }
    /**
     * @Route("/biens/{slug}-{id}", name="biens.show", requirements={"slug":"[a-z0-9\-]*"})
     * @param $slug
     * @param $id
     * @return Response
     */
    public function show( Proprety $proprety,string $slug):Response{

        if($proprety->getSlug()!== $slug){
           return $this->redirectToRoute('biens.show',[
               'id'   =>$proprety->getId(),
               'slug' =>$proprety->getSlug()
            ],301);
        }
        return $this->render('biens/show.html.twig',[
                                    'proprety'=>$proprety,
                                    'current_menu'=>'bien'

        ]);
    }
}



       /* $em=$this->getDoctrine()->getManager();
        $proprety=new Proprety(); //pour creer unenouvelle enregistrement
        $proprety->setTitle("mon premier bien")
            ->setPrice(200000)
            ->setRooms(4)
            ->setBadrooms(3)
            ->setDescription("une petite description ")
            ->setSurface(60)
            ->setFloor(4)
            ->setHeat(1)
            ->setCity('Montpiller')
            ->setAdresse('15 istres')
            ->setPostalCode(13800);


        $em->persist($proprety); //j'aimerai bien de persiste (enregistre) mon entite
        $em->flush();  //ça va me d'envoyer et de  porter tous changement qui a ete faite au niveau de l'enitite manager dans la BD*/






