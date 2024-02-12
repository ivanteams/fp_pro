<?php

namespace App\Controller;

use App\Entity\Alumnos;
use App\Entity\Docentes;
use DateTime;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/alumnos', name: 'app_alumnos_')]
class AlumnosController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('alumnos/index.html.twig', [
            'controller_name' => 'AlumnosController',
        ]);
    }

    #[Route('/insertar-alumnos', name: 'insertar_alumnos')]
    public function insertarAlumnos(EntityManagerInterface $entityManager): Response
    {
        // Endpoint de ejemplo: http://127.0.0.1:8000/alumnos/insertar-alumnos
        $registros = array(
            "a1" => array(
                "nif" => "33334444S",
                "nombre" => "Blanca Soler",
                "fechanac" => "2000-02-10",
                "pagado" => 1,
                "importe" => 4100.50,
                "docentes_nif" => "11223344G"
            ),
            "a2" => array(
                "nif" => "55556666A",
                "nombre" => "Alba Jiménez",
                "fechanac" => "2000-06-10",
                "pagado" => 1,
                "importe" => 4100.50,
                "docentes_nif" => "11223344G"
            ),
            "a3" => array(
                "nif" => "11112222G",
                "nombre" => "Juan Carlos Romero",
                "fechanac" => "2000-06-10",
                "pagado" => 0,
                "importe" => 4100.50,
                "docentes_nif" => "11223344G"
            ),
        );



        foreach ($registros as $fila) {
            $alumno = new Alumnos();
            $alumno->setNif($fila['nif']);
            $alumno->setNombre($fila['nombre']);

            $fecha = new DateTime($fila['fechanac']);
            $alumno->setfechanac($fecha);

            $alumno->setPagado($fila['pagado']);
            $alumno->setImporte($fila['importe']);

            $docente = new Docentes();
            $repoDocentes = $entityManager->getRepository(Docentes::class);
            $valorNifDocente = $fila['docentes_nif'];
            $docente = $repoDocentes->findOneBy(["nif" => $valorNifDocente]);
            $alumno->setDocentesNif($docente);

            $entityManager->persist($alumno);
            $entityManager->flush();
        }



        return new Response("<h1>¡Todo correcto! -> Alumnos insertados</h1>");
    }

    #[Route('/consultar-alumnos-cobrados/{pagado}', name: 'consultar_alumnos_cobrados')]
    public function consultarAlumnosCobrados(ManagerRegistry $doctrine, int $pagado): JsonResponse
    {
        // endpoint de ejemplo: http://127.0.0.1:8000/alumnos/consultar-alumnos-cobrados/1
        $repoAlumnos = $doctrine->getRepository(Alumnos::class);
        $alumnos = $repoAlumnos->alumnosCobrados($pagado);

        $json = array();
        foreach ($alumnos as $alumno) {
            $json[] = array(
                "nif" => $alumno->getNif(),
                "nombre" => $alumno->getNombre(),
                "importe" => $alumno->getImporte(),
            );
        }

        return new JsonResponse($json);

        /*
        return $this->render('alumnos/index.html.twig', [
            'controller_name' => 'AlumnosController',
        ]);
        */
    }
}
