<?php

namespace App\Controller;

use App\Entity\Docentes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Relación de endpoints del proyecto:
 * - http://127.0.0.1:8000/docentes/insertar-docentes/11223344G/Iván Rodríguez/47
 * - http://127.0.0.1:8000/alumnos/insertar-alumnos
 * - http://127.0.0.1:8000/docentes/consultar-docentes
 */

#[Route('/docentes', name: 'app_docentes_')]
class DocentesController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('docentes/index.html.twig', [
            'controller_name' => 'DocentesController',
        ]);
    }

    #[Route('/insertar-docentes/{nif}/{nombre}/{edad}', name: 'insertar_docentes')]
    public function insertarDocentes(String $nif, String $nombre, int $edad, EntityManagerInterface $entityManager): Response
    {
        // Ejemplo endpoing: http://127.0.0.1:8000/docentes/insertar-docentes/11223344G/Iván Rodríguez/47
        $docente = new Docentes();
        $docente->setNif($nif);
        $docente->setNombre($nombre);
        $docente->setEdad($edad);

        $entityManager->persist($docente);
        $entityManager->flush();

        return new Response("<h1>Docente insertado</h1>");
    }

    #[Route('/consultar-docentes', name: 'consultar_docentes')]
    public function consultarDocentes(EntityManagerInterface $entityManager): JsonResponse
    {
        // Ejemplo endpoing: http://127.0.0.1:8000/docentes/consultar-docentes
        $docentes = $entityManager->getRepository(Docentes::class)->findAll();

        $json = array();    
        foreach ($docentes as $docente) {
            $json[] = array(
                "nif" => $docente->getNif(),
                "nombre" => $docente->getNombre(),
                "edad" => $docente->getEdad(),
            );
        }

        return new JsonResponse($json);
        //return new Response("" . var_dump($docentes));
    }
}
