<?php


namespace App\Controller;


use App\Form\Form;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{


    public function index(Request $request)
    {
        $form = $this->createForm(Form::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $data = $form->getData();
            $properies = $data['property'];
            $options = $data['option'];
            $values = $data['value'];
            $array = '';
            foreach ($properies as $index => $value) {
                $array .= $value.':'.$options[$index].$values[$index].'+';
            }
            $str = rtrim($array,'+');
            $httpClient = HttpClient::create();
            $items = $httpClient->request('GET','https://api.github.com/search/repositories?q='.$str)->toArray()['items'];

            return $this->render('base.html.twig',[
                'items' => $items
            ]);

        }
        return $this->render('base.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
