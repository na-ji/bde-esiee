<?php

namespace Application\ServiceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class BargainController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  description="Retrieves the list of bargains",
     *  resource=true,
     *  output={"class"="Application\ServiceBundle\Entity\Bargain"},
     *  statusCodes={
     *      200="Returned when successful"
     *  }
     * )
     * @Rest\View(statusCode=200)
     */
    public function indexAction()
    {
        $bargain_list = $this->getDoctrine()->getManager()->getRepository('ApplicationServiceBundle:Bargain')->findAll();

        $view = $this->view($bargain_list, 200)
            ->setTemplate('ApplicationServiceBundle:Bargain:index.html.twig')
            ->setTemplateVar('bargain_list')
        ;

        return $this->handleView($view);
    }
}
