<?php
namespace App\Controller;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    #[Route('/product/add', name: 'product_add')]
public function add(EntityManagerInterface $entityManager): Response
{
$product = new Product();
$product->setName('Keyboard')
  ->setPrice(1999)
  ->setDescription('Ergonomic and stylish!')
   ->setSlug('')
   ->setStock(0)
   ->setCreatedAt(new \DateTime());
// tell Doctrine you want to (eventually) save the Product (no queries yet)
$entityManager->persist($product);
// actually executes the queries (i.e. the INSERT query)
$entityManager->flush();
  return $this->render('product/add.html.twig',['product' => $product]);
}

   #[Route('/product/show/{id}', name: 'product_show')]
public function show(EntityManagerInterface $entityManager, int $id): Response
{
    $product = $entityManager->getRepository(Product::class)->find($id);
    if (!$product) {
    throw $this->createNotFoundException('Produit inexistant avec id '.$id);
    }
    return $this->render('product/show.html.twig',['product' => $product]);
    }

    
    #[Route('/product/update/{id}/{nouvprix}', name: 'product_update')]
    public function update(EntityManagerInterface $em, int $id,float $nouvprix): Response
    {
    $product = $em->getRepository(Product::class)->find($id);
    if (!$product) {throw $this->createNotFoundException(
        'No product found for id '.$id
        );
        }
        $product->setPrice($nouvprix);
        $em->flush();
        return $this->redirectToRoute('product_show',['id' => $product->getId()]);}
    
}


  