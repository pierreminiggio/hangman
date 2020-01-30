<?php


namespace App\Controller;

use App\Form\Type\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    public function templateFolder(): string
    {
        return 'main/';
    }

    /**
      * @Route(
      *     "/",
      *     name="app_main_index",
      *     methods={"GET"}
      * )
      */
    public function index(): Response
    {
        return $this->render($this->templateFolder() . 'index.html.twig');
    }

    /**
      * @Route(
      *     "/contact",
      *     name="app_main_contact",
      *     methods={"GET", "POST"}
      * )
      */
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);

        if ($request->isMethod('POST')) {

            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {

                // To do send mail
                return $this->redirectToRoute('app_main_index');
            }
        }

        return $this->render($this->templateFolder() . 'contact.html.twig', [
            'contact_form' => $form->createView()
        ]);
    }
}
