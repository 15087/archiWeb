<?php

namespace App\Tests\Repository;

use App\Repository\CategoryRepository;
use App\DataFixtures\ArticleFixtures;

use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryRepositoryTest extends WebTestCase
{

    use FixturesTrait;

    public function testcount(){
        self::bootKernel(); // démarre le kernel et récupère le noyau pr récuperer le repo
        $this->loadFixtures([ArticleFixtures::class]);
        $categories = self::$container -> get(CategoryRepository::class)->count([]); // renvoie le nombre d'annonce en db
        $this->assertEquals(3, $categories); // je m'attends à retrouver 3 categories (qd j'ai crée mes fixtures -> 10 categories$categories)

    }

}