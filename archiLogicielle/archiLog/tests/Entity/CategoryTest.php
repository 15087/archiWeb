<?php

namespace App\Tests\Entity;

use App\Entity\Category;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

//Tests permettant la vérifier la validation lors de la création d'une annonce


class CategoryTest extends KernelTestCase {

    public function getEntity(): Category {
        return (new Category())
        ->setTitle('Un titre pour tester')
        ->setDescription('N\'importe quel Description');
  
    }

    public function assertHasError(Category $category, int $number = 0){
        self::bootkernel();
        $errors = self::$container->get('validator')->validate($category);
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

}
