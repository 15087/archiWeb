<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Category;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        
        //Création de 3 fake catégories
        for($i = 1; $i <= 3; $i++){
            $category = new Category();
            $category->setTitle($faker->sentence())
                     ->setDescription($faker->paragraph());

            $manager->persist($category);
        }
        // Création faux articles

        
        $content = '<p>' . join($faker->paragraphs(5), '</p><p>') . '</p>';
        

        for($j = 1; $j <= mt_rand(8,10); $j++){
            $article = new Article();
            $article->setTitle($faker->sentence())
                    ->setContent($content)
                    ->setImage($faker->imageUrl())
                    ->setCategory($category);
            
            $manager->persist($article);
        }

        $manager->flush();
    }
}
