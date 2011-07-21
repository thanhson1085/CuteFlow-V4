<?php

namespace CuteFlow\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DashboardController extends Controller
{
    /**
     * @Route("/", name="cuteflow_dashboard")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
