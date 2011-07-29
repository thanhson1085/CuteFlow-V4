<?php
namespace CuteFlow\CoreBundle\Extension;

use Symfony\Component\Translation\TranslatorInterface;

class LocaleDateExtension extends \Twig_Extension {

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function getFilters() {
        return array(
            'localedate'  => new \Twig_Filter_Method($this, 'localedate'),
        );
    }

    public function localedate($date, $dateFormat = 'medium', $timeFormat = 'medium', $locale = null)
    {
        $formatValues = array(
            'none'   => \IntlDateFormatter::NONE,
            'short'  => \IntlDateFormatter::SHORT,
            'medium' => \IntlDateFormatter::MEDIUM,
            'long'   => \IntlDateFormatter::LONG,
            'full'   => \IntlDateFormatter::FULL,
        );

        $formatter = \IntlDateFormatter::create(
            $locale != null ? $locale : $this->translator->getLocale(),
            $formatValues[$dateFormat],
            $formatValues[$timeFormat]
        );

        if ($date instanceof \DateTime) {
            return $formatter->format($date);
        }

        return $formatter->format(new \DateTime($date));
    }

    public function getName()
    {
        return 'locale_date_extension';
    }

    protected $translator;
}