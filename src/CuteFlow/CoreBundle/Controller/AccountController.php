<?php
namespace CuteFlow\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CuteFlow\CoreBundle\Form\AccountType;

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
        $user = $this->get('security.context')->getToken()->getUser();
        $userForm = $this->createForm(new AccountType(), $user);

        return array('form'=>$userForm->createView(), 'user'=>$user);
    }

    /**
     * @Route("account/save", name="cuteflow_account_save")
     * @Template("CuteFlowCoreBundle:Account:edit.html.twig")
     */
    public function saveAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->get('security.context')->getToken()->getUser();
        
        if (!$user) {
            throw $this->createNotFoundException('Unable to find user.');
        }

        $userForm = $this->createForm(new AccountType(), $user);
        $userForm->bindRequest($this->getRequest());

        if ($userForm->isValid()) {

            if ($user->getPlainPassword() != "") {
                $user_manager = $this->get('cuteflow.user_manager');
                $user_manager->updatePassword($user);
            }

            $em->persist($user);
            $em->flush();

            $this->getRequest()->getSession()->setFlash('saved.successful', 1);
            return new \Symfony\Component\HttpFoundation\RedirectResponse(
                $this->generateUrl('cuteflow_my_account')
            );
        }

        return array('form'=>$userForm->createView(),
                     'user'=>$user);
    }
}
