<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use StoreBundle\Entity\Product;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ProductController extends Controller
{    
    /**
     * Return all products
     * 
     * @View()
     * 
     * @ApiDoc(
     * resource=true,
     * description="Get all products",
     * statusCodes={
     *    200="Successful",
     *    404="No stores found",
     *    500="An error occured"
     * },
     * )
     * 
     * @return array
     */
    public function getProductsAction() {
        
        $em = $this->getDoctrine()->getManager();
        
        $products = $em->getRepository('StoreBundle:Product')->findAll();
        
        if (!$products) {
            
            throw $this->createNotFoundException('Data not found'); 
        }
        
        return array('products' => $products);
        
    }
    
    /**
     * Return one product
     * 
     * @param Product $product
     * 
     * @View()
     * @ParamConverter("product", class="StoreBundle:Product")
     * 
     * @ApiDoc(
     * resource=true,
     * description="Get one product",
     * statusCodes={
     *    200="Successful",
     *    404="No stores found",
     *    500="An error occured"
     * },
     * )
     * 
     * @return array
     */
    public function getProductAction(Product $product) {
        
        $em = $this->getDoctrine()->getManager();
        
        $oneProduct = $em->getRepository('StoreBundle:Product')->find($product);
        
        if (!$oneProduct) {
            
            throw $this->createNotFoundException('Data not found');
        }
        
        return array('product' => $product);
        
    }
    
    
}
