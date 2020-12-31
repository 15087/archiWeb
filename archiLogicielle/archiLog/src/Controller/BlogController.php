<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Form\ArticleType; 

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Form\CategoryType; 


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('blog/home.html.twig');
    }

    /**
     * @Route("/blog/addArticle", name="addArticle")
     * @Route("/blog/{id}/editArticle", name="editArticle")
     */
    public function form(Article $article = null, Request $request, EntityManagerInterface  $manager)
    {
        if(!$article)
        {
            $article = new Article();

        }
        

        $form = $this->createForm(ArticleType::class, $article);

        $form ->handleRequest($request); //form essaie d'analyser la requete http que je te passe en param
            
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('blog_show', ['id' => $article->getId()]);
        }
        
        return $this->render('blog/createArticle.html.twig', [
            'formArticle' => $form->createView(),
            'editMode' => $article->getId()!== null
        ]);

    }

     /**
     * @Route("/blog/categories", name="categories")
     */
    public function categories(CategoryRepository $repo)
    {
        $categories = $repo->findAll();

        return $this->render('blog/categories.html.twig', [
            'controller_name' => 'BlogController',
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/blog/categories/{id}", name="category_show")
     */
    public function show_category($id)
    {
        $repo = $this->getDoctrine()->getRepository(Category::class);

        $category = $repo->find($id);

        return $this->render('blog/show_category.html.twig', [
            'category' => $category
        ]);
    }

    /**
     * @Route("/blog/addCategory", name="addCategory")
     * @Route("/blog/{id}/editCategory", name="editCategory")
     */
    public function formCategory(Category $category = null, Request $request, EntityManagerInterface  $manager)
    {
        if(!$category)
        {
            $category = new Category();

        }

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($category);
            $manager->flush();           
            return $this->redirectToRoute('categories', ['id' => $category->getId()]);
        }

        return $this->render('blog/formCategory.html.twig', [
            'formCategory' => $form->createView(),
            'editMode' => $category->getId() !== null
        ]);
    }

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Article $article)
    {

        return $this->render('blog/show.html.twig', [
            'article'=> $article]);
    }

    /**
    * @Route("/blog/{id}/removeArticle", name="removeArticle")
    */    
    public function deleteArticle($id){
        try{
            $em = $this->getDoctrine()->getManager();
            $post = $em->getRepository(Article::class)->find($id);
            $em->remove($post);
            $em->flush();
        
            $this->addFlash('message', 'Annonce supprimée');
            return $this->redirectToRoute('blog');
        } catch (Exception $e) {
            $this->addFlash('message', "L'annonce n'a pas pu être supprimée");
        }
    }

    /**
    * @Route("/blog/{id}/removeCategory", name="removeCategory")
    */    
    public function deleteCategory($id){
        try{
            $em = $this->getDoctrine()->getManager();
            $post = $em->getRepository(Category::class)->find($id);
            $em->remove($post);
            $em->flush();
        
            $this->addFlash('message', 'Catégorie supprimée');
            return $this->redirectToRoute('categories');
        } catch (Exception $e) {
            $this->addFlash('message', "La catégorie n'a pas pu être supprimée");
        }
    }



     
}
