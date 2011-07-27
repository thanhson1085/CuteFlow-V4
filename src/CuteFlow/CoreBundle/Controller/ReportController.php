<?php

namespace CuteFlow\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ReportController extends Controller
{
    /**
     * @Route("/reports", name="cuteflow_reports_overview")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
