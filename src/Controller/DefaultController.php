<?php


namespace App\Controller;


use App\DTO\FormDTO;
use App\Form\Form;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    public function index(Request $request)
    {
        $dto = new FormDTO();
        $form = $this->createForm(Form::class,$dto);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $httpClient = HttpClient::create();
            $items = $httpClient->request('GET','https://api.github.com/search/repositories?q='.$dto->builtQuery())->toArray()['items'];

            return $this->render('base.html.twig',[
                'items' => $items
            ]);

        }
        return $this->render('base.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
