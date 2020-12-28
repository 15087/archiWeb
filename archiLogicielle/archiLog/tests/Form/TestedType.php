use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Form\ArticleType;

//Tester si form valide: titre pas valide, reste valide, puis 2e test content pas valide reste valide etc... 
//définir manuellement un article

public function form(Article $article, Request $request, EntityManagerInterface  $manager)
    {
        

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