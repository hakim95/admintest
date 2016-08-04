<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use StoreBundle\Entity\Category;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class CategoryController extends Controller
{    
    /**
     * Return all categories
     * 
     * @View()
     * 
     * @ApiDoc(
     * resource=true,
     * description="Get all categories",
     * statusCodes={
     *    200="Successful",
     *    404="No stores found",
     *    500="An error occured"
     * },
     * )
     * 
     * @return array
     */
    public function getCategoriesAction() {
        
        $em = $this->getDoctrine()->getManager();
        
        $categories = $em->getRepository('StoreBundle:Category')->findAll();
        
        if (!$categories) {
            
            throw $this->createNotFoundException('Data not found');
        }
        
        return array('categories' => $categories);
        
    }
    
    /**
     * Return one category
     * 
     * @param Category $category
     * 
     * @View()
     * @ParamConverter("category", class="StoreBundle:Category")
     * 
     * @ApiDoc(
     * resource=true,
     * description="Get one category",
     * statusCodes={
     *    200="Successful",
     *    404="No stores found",
     *    500="An error occured"
     * },
     * )
     * 
     * @return array
     */
    public function getCategoryAction(Category $category) {
        
        $em = $this->getDoctrine()->getManager();
        
        $oneCategory = $em->getRepository('StoreBundle:Category')->find($category);
        
        if (!$oneCategory) {
            
            throw $this->createNotFoundException('Data not found');
        }
        
        return array('category' => $category);
        
    }
    
    
}
