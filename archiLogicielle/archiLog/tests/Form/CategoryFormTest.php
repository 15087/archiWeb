<?php

namespace App\Tests\Form;
use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\CategoryType;
//use App\Model\TestObject;

use App\Entity\Category;

class CategoryFormTest extends TypeTestCase {
    public function testSubmitValidData()
    {
        $formData = [
            'id' => '123',
            'title' => 'test',
            'description' => 'contentaupif'
 
        ];

        $model = new Category();
        // $formData will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(CategoryType::class, $model);

        $expected = new Category();
        // ...populate $object properties with the data stored in $formData

        // submit the data to the form directly
        $form->submit($formData);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $formData was modified as expected when the form was submitted
        $this->assertEquals($expected, $model);
    }

}