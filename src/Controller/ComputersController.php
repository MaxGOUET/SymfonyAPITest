<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ComputersRepository;

final class ComputersController extends AbstractController
{
    #[Route('/computers', name: 'app_computers')]
    public function index(ComputersRepository $computersRepository): Response
    {
        $computers = $computersRepository->findAll();
        return $this->render('computers/index.html.twig', [
            'computers' => $computers,
        ]);
    }

    #[Route('/computers/{id}', name: 'app_computer')]
    public function computer(ComputersRepository $computersRepository, $id): Response
    {
        $computer = $computersRepository->findById($id);
        dd($computer);
        return $this->render('computers/computer.html.twig', [
            'computer' => $computer,
        ]);
    }
}
