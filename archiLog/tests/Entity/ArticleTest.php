<?php

namespace App\Tests\Entity;

use App\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

//Tests permettant la vérifier la validation lors de la création d'une annonce


class ArticleTest extends KernelTestCase {

    public function getEntity(): Article {
        return (new Article())
        ->setTitle('Un titre pour tester')
        ->setContent('N\'importe quel content')
        ->setImage('http://placeholder.com/350x50');
    }

    public function assertHasError(Article $article, int $number = 0){
        self::bootkernel();
        $errors = self::$container->get('validator')->validate($article);
        $messages = [];
        /** @var ConstraintViolation $error */
        foreach($errors as $error){
            $messages[] = $error->getPropertyPath() . '->' . $error->getMessage();
        }
        $this->assertCount($number, $errors, implode(',', $messages));
    }

    public function testValidEntity(){
        $this->assertHasError($this->getEntity(), 0);
    }

    public function testInvalidTitleEntity(){
        $this->assertHasError($this->getEntity()->setTitle('Mia'), 1);  //titre invalide, minLenght=4
        $this->assertHasError($this->getEntity()->setTitle(''), 1); //titre vide -> 1 erreur
    }
    public function testInvalidImageEntity(){
        $this->assertHasError($this->getEntity()->setImage('Miaou 123'), 1);  //img invalide, type
        $this->assertHasError($this->getEntity()->setImage(''), 1); //img vide -> Ajout asser NotBlank ds Entity
    }
    public function testInvalidContentEntity(){
        $this->assertHasError($this->getEntity()->setContent('Miaou'), 1);  //minLenght = 8
        $this->assertHasError($this->getEntity()->setContent(''), 1); //vide 
    }
}
