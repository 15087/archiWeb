<?php

namespace App\Tests\Form;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PHPUnit\Framework\TestCase;
use App\Form\CategoryType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension;
use Symfony\Component\HttpFoundation\Response;
use App\TestBundle\Form\Type\TestedType;
use App\TestBundle\Model\TestObject;
use Symfony\Component\Form\PreloadedExtension;

use App\Entity\Category;

class CategoryTypeTest  extends TypeTestCase
{
    protected function getExtensions()
    {
        $childType = new CategoryType();
        return array(new PreloadedExtension(array(
            $childType->getName() => $childType,
        ), array()));
    }

    public function testBindValidData()
    {
        $type = new TestedType();
        $form = $this->factory->create($type);

        $this->assertTrue($form->isSynchronized());

        // ... your test
    }
}