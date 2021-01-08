<?php

namespace App\Tests\Form;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use App\Form\CategoryType;
//use Symfony\Component\Form\FormBuilder;
//use Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension;
use Symfony\Component\HttpFoundation\Response;
use App\TestBundle\Form\Type\TestedType;
//use App\TestBundle\Model\TestObject;
//use Symfony\Component\Form\PreloadedExtension;

use Symfony\Component\Panther\PantherTestCase;

use App\Entity\Category;

class CategoryTypeTest  extends PantherTestCase
{
    /*
    private $systemUnderTest;
    /**
     * @var FormFactoryInterface
     */
    /*
    protected $factory;

    protected function setUp(): void
    {
        $this->factory = CategoryType::createFormFactoryBuilder()
            ->addExtensions($this->getExtensions())
            ->addTypeExtensions($this->getTypeExtensions())
            ->addTypes($this->getTypes())
            ->addTypeGuessers($this->getTypeGuessers())
            ->getFormFactory();
        $this->systemUnderTest = new CategoryType();
    }

    /**
     * Tests that form is correctly build according to specs
     */
    /*
    public function testBuildForm(): void
    {
        $formBuilderMock = $this->createMock(FormBuilderInterface::class);
        $formBuilderMock->expects($this->atLeastOnce())->method('add')->willReturnSelf();

        // Passing the mock as a parameter and an empty array as options as I don't test its use
        $this->systemUnderTest->buildForm($formBuilderMock, []);
        $formBuilderMock->expects($this->exactly(2))->method('add')->withConsecutive(
            [$this->equalTo('title'), $this->equalTo(TextType::class)],
            [$this->equalTo('description'), $this->equalTo(TextType::class)]
        );
    } */

    public function testCreate(){
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/blog/addCategory'); //request : crawler qui permet de récupérer et analyser des éléments de la page
        $form = $crawler->selectButton('Ajouter')->form([
            'category[title]' => 'Miaou miaou',
            'category[description]'=> 'Testons moussaillon'
        ]);
        $client->submit($form);
    }
}