<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ComputersRepository;
use App\Repository\CpuRepository;
use App\Entity\Cpu;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Computers;

final class ApiComputersController extends AbstractController
{
    #[Route('/api/computers', name: 'app_api_computers', methods: ['GET'])]
    public function index(ComputersRepository $computersRepository, SerializerInterface $serializer): JsonResponse
    {
        $computers = $computersRepository->findAll();
        if (!$computers) {
            return new JsonResponse(['message' => 'No computers found'], status: 404);
        }
        $data = $serializer->serialize($computers, 'json');
        return new JsonResponse($data, json: true, status: 200);
    }

    #[Route('/api/computers/{id}', name: 'app_api_computers_show', methods: ['GET'])]
    public function show(ComputersRepository $computersRepository, SerializerInterface $serializer, int $id): JsonResponse
    {
        $computer = $computersRepository->find($id);
        if (!$computer) {
            return new JsonResponse(['error'=> true,'message' => 'Computer not found'], status: 404);
        }
        $data = $serializer->serialize($computer, 'json');
        return new JsonResponse($data, json: true, status: 200);
    }

    #[Route('/api/computers', name: 'app_api_computers_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager, ComputersRepository $computersRepository, CpuRepository $cpuRepository, SerializerInterface $serializer): JsonResponse
    {
        if(!$request->request->get('brand') || !$request->request->get('model') || !$request->request->get('cpu_brand') || !$request->request->get('cpu_model') || !$request->request->get('cpu_cores')) {
            return new JsonResponse(['error' => true, 'message' => 'Brand, model, and CPU details are required'], status: 400);
        }
        
        $computer = new Computers();
        $computer->setBrand($request->request->get('brand'));
        $computer->setModel($request->request->get('model'));
        
        $cpu = $cpuRepository->createQueryBuilder('c')
            ->andWhere('c.brand = :brand')
            ->andWhere('c.model = :model')
            ->setParameter('brand', $request->request->get('cpu_brand'))
            ->setParameter('model', $request->request->get('cpu_model'))
            ->getQuery()
            ->getOneOrNullResult();
       
        if (!$cpu) {
            $cpu = new Cpu();
            $cpu->setBrand($request->request->get('cpu_brand'));
            $cpu->setModel($request->request->get('cpu_model'));
            $cpu->setCores($request->request->get('cpu_cores'));
            $entityManager->persist($cpu);
            $entityManager->flush();
        }
        $computer->setCpu($cpu);
        
        $entityManager->persist($computer);
        $entityManager->flush();
    
        $data = $serializer->serialize($computer, 'json');
        return new JsonResponse($data, json: true, status: 201);
    } 
}
