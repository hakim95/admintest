<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use StoreBundle\Entity\Store;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Request\ParamFetcher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use StoreBundle\Form\StoreType;

class StoreController extends Controller
{    
    /**
     * Return all stores
     * 
     * @View()
     * 
     * @ApiDoc(
     * resource=true,
     * description="Get all the stores",
     * statusCodes={
     *    200="Successful",
     *    404="No stores found",
     *    500="An error occured"
     * },
     * )
     * 
     * @return array
     */
    public function getStoresAction() {
        
        $em = $this->getDoctrine()->getManager();
        
        $stores = $em->getRepository('StoreBundle:Store')->findAll();
        
        if (!$stores) {
            
            throw $this->createNotFoundException('Data not found');
            
        }
        
        return array('stores' => $stores);
        
    }
    
    /**
     * Return a store
     * 
     * @param Store $store
     * 
     * @View()
     * @ParamConverter("store", class="StoreBundle:Store")
     * 
     * @ApiDoc(
     * resource=true,
     * description="Get one store",
     * statusCodes={
     *    200="Successful",
     *    404="No store found",
     *    500="An error occured"
     * },
     * )
     * 
     * @return array
     */
    public function getStoreAction(Store $store) {
        
        $em = $this->getDoctrine()->getManager();
        
        $oneStore = $em->getRepository('StoreBundle:Store')->find($store);
        
        if (!$oneStore) {
            
            throw $this->createNotFoundException('Data not found');
        }
        
        return array('store' => $store);
        
    }
    
    
    /**
     * Creates a new store
     * 
     * @ApiDoc(
     * resource=true,
     * description="Post a new store",
     * statusCodes={
     *    200="Successful",
     *    500="An error occured"
     * },
     * input="StoreBundle\Form\StoreType"
     * )
     * 
     * @param ParamFetcher $paramFetcher ParamFetcher
     * 
     */
    public function postStoreAction(ParamFetcher $paramFetcher) {
        
        $entity = new Store();
        
        $form = $this->createForm(StoreType::class,$entity);
        $form->submit($paramFetcher->all());
        
        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }
        
        return array('form' => $form);
        
    }
}
