<?php

namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class PageControllerTest extends WebTestCase 
{
    public function testHomePage(){
        $client = static::createClient();
        $client->request('GET', '/'); //request : crawler qui permet de récupérer et analyser des éléments de la page
        $this->assertResponseStatusCodeSame( Response::HTTP_OK); //équivalent 200
    }

    public function testH1HomePage(){
        $client = static::createClient();
        $client->request('GET', '/'); //request : crawler qui permet de récupérer et analyser des éléments de la page
        $this->assertSelectorTextContains('h1', 'Bienvenue !');
    }

    /*
    public function testCreateArticlePage(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/blog/addArticle'); //request : crawler qui permet de récupérer et analyser des éléments de la page
        $form = $crawler->selectButton('Ajouter')->form([
            'title' => 'Miaou miaou',
            'content'=> 'Testons moussaillon',
            'image'=> 'http://placeholder.com/350x50'
        ]);
        $client->submit($form);
        //$this->assertResponseRedirection('/blog/{id}');
    } */

}