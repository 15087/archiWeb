<?php

namespace App\Tests\Form;
use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\ArticleType;
//use App\Model\TestObject;
use App\Entity\Article;
use App\Entity\Category;

class ArticleFormTest extends TypeTestCase {
    public function testSubmitValidData()
    {
        $category= new Category();
        $formData = [
            'title' => 'test',
            'content' => 'contentaupif',
            'image' => 'http://placeholder.com/350x50'
            
        ];

        $model = new Article();
        // $formData will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(ArticleType::class, $model);

        $expected = new Article();
        // ...populate $object properties with the data stored in $formData

        // submit the data to the form directly
        $form->submit($formData);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $formData was modified as expected when the form was submitted
        $this->assertEquals($expected, $model);
    }

}