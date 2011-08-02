<?php
namespace CuteFlow\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController extends Controller
{
    /**
     * @Route("account/show/{username}", name="cuteflow_user_show")
     * @Template()
     */
    public function showAction($username)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('CuteFlowCoreBundle:User')
                    ->findOneByUsername($username);

        return array('user'=>$user);
    }

    /**
     * @Route("/my/account", name="cuteflow_my_account")
     * @Template()
     */
    public function editAction()
    {
        return array();
    }
}
