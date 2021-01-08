<?php

namespace App\Tests\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\ArticleType;
//use App\Model\TestObject;
use App\Entity\Article;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Panther\PantherTestCase;

class ArticleFormTest extends PantherTestCase {
    public function testSubmitValidData()
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/blog/addArticle'); //request : crawler qui permet de récupérer et analyser des éléments de la page
        $form = $crawler->selectButton('Ajouter')->form([
            'article[title]' => 'Miaou miaou',
            'article[content]'=> 'Testons moussaillon',
            'article[image]' => 'http://placeholder.com/350x50'

        ]);
        $client->submit($form);

    }

}