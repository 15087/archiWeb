<?php

namespace App\Tests\Repository;

use App\Repository\ArticleRepository;
use App\DataFixtures\ArticleFixtures;

use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleRepositoryTest extends WebTestCase
{

    use FixturesTrait;

    public function testcount(){
        self::bootKernel(); // démarre le kernel et récupère le noyau pr récuperer le repo
        $this->loadFixtures([ArticleFixtures::class]);
        $articles = self::$container -> get(ArticleRepository::class)->count([]); // renvoie le nombre d'annonce en db
        $this->assertEquals(10, $articles); // je m'attends à retrouver 10 articles (qd j'ai crée mes fixtures -> 10 articles)

    }

}