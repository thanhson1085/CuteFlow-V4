<?php

namespace CuteFlow\CoreBundle\Controller;

use CuteFlow\CoreBundle\Form\SettingsGeneralType;
use CuteFlow\CoreBundle\Form\SettingsEmailType;
use CuteFlow\CoreBundle\Form\UserFilterType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Locale\Locale;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="cuteflow_admin_index")
     * @Template("CuteFlowCoreBundle:Admin:systemInfo.html.twig")
     */
    public function systemInfoAction()
    {
        $database = $this->container->getParameter('database_driver').
                    "(".
                    $this->container->getParameter('database_host').", ".
                    $this->container->getParameter('database_name').
                    ")";
        return array(
                'version'=>$this->container->getParameter('cuteflow.version'),
                'phpVersion'=>phpversion(),
                'rootPath'=>$this->get('kernel')->getRootDir(),
                'database'=>$database,
               );
    }
    
    /**
     * @Route("/admin/settings", name="cuteflow_admin_settings")
     * @Template("CuteFlowCoreBundle:Admin:settings.html.twig")
     */
    public function settingsAction()
    {
        $settings = $this->getDoctrine()
                         ->getEntityManager()
                         ->find('CuteFlowCoreBundle:Settings', 1);
        
        if ($settings == null) {
            $settings = new \CuteFlow\CoreBundle\Entity\Settings();
        }
        
        $localeNames = Locale::getDisplayLanguages($this->getRequest()->getSession()->getLocale());
        $availableLanguages = array_intersect_key($localeNames,
                                $this->container->getParameter('cuteflow.languages'));

        $generalForm = $this->createForm(new SettingsGeneralType(), $settings);
        $emailForm = $this->createForm(new SettingsEmailType(), $settings);

        return array('generalForm'=>$generalForm->createView(),
                     'emailForm'=>$emailForm->createView(),
                     'formType'=>'general',
                     'availableLanguages'=>$availableLanguages);
    }

    /**
     * @Route("/admin/settings/save/{formType}", name="cuteflow_admin_settings_save")
     * @Template("CuteFlowCoreBundle:Admin:settings.html.twig")
     * 
     * @param string $formType
     * @return void
     */
    public function saveSettings($formType)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $settings = $em->find('CuteFlowCoreBundle:Settings', 1);

        if ($settings == null) {
            $settings = new \CuteFlow\CoreBundle\Entity\Settings();
        }

        $localeNames = Locale::getDisplayLanguages($this->getRequest()->getSession()->getLocale());
        $availableLanguages = array_intersect_key($localeNames,
                                $this->container->getParameter('cuteflow.languages'));

        $generalForm = $this->createForm(new SettingsGeneralType(), $settings);
        $emailForm = $this->createForm(new SettingsEmailType(), $settings);

        switch($formType) {
            case 'email': $form = $emailForm; break;
            case 'general': $form = $generalForm; break;
        }

        $success = false;
        $form->bindRequest($this->getRequest());
        if ($form->isValid()) {

            $em->persist($settings);
            $em->flush();

            $success = true;
        }

        return array('generalForm'=>$generalForm->createView(),
                     'emailForm'=>$emailForm->createView(),
                     'availableLanguages'=>$availableLanguages,
                     'formType'=>$formType,
                     'saveSuccess'=>$success,
                     'form'=>$form->createView());
    }
}
