<?php
namespace CuteFlow\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use CuteFlow\CoreBundle\Entity\Settings;

class LoadSettingsData implements FixtureInterface
{
    public function load($manager)
    {
        $settings = new Settings();
        $settings->setDefaultLanguage('en');
        $settings->setDefaultTheme('basecamp');
        $settings->setUseGravatar(true);
        $settings->setUserFormat(Settings::USER_FORMAT_LONG_FL);
        $settings->getEmailFormat(Settings::MAIL_FORMAT_HTML);

        $manager->persist($settings);
        $manager->flush();
    }
}