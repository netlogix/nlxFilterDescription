<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright solutionDrive GmbH
 */

namespace sdFilterDescriptionShopware\Subscriber;

use Enlight\Event\SubscriberInterface;
use sdFilterDescriptionShopware\Services\ConfigInterface;

class FrontendDispatch implements SubscriberInterface
{
    /** @var ConfigInterface */
    private $config;

    public function __construct(
        ConfigInterface $config
    ) {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch_Frontend' => 'onFrontendDispatch',
        ];
    }

    public function onFrontendDispatch(\Enlight_Event_EventArgs $args): void
    {
        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->get('subject');
        $filterPrefixList = $this->config->getFilterPrefixList();
        $filterPrefixListJson = \json_encode($filterPrefixList);
        $controller->View()->assign('filterPrefixList', $filterPrefixListJson);
    }
}