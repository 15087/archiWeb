<?php

namespace App\Tests\Entity;

use App\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class ArticleTest extends KernelTestCase {
    public function testValidEntity(){
        $article = (new Article())
                ->setTitle('Un titre pour tester')
                ->setContent('N\'importe quel content')
                ->setImage('http://placeholder.com/350x50');
        self::bootkernel();
        $error = self::$container->get('validator')->validate($article);
        $this->assertCount(0, $error);
    }
}
