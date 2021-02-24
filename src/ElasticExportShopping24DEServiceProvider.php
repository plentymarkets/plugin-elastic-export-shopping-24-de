<?php

namespace ElasticExportShopping24DE;

use Aws\Common\InstanceMetadata\Waiter\ServiceAvailable;
use ElasticExportShopping24DE\Catalog\Providers\CatalogBootServiceProvider;
use ElasticExportShopping24DE\Crons\ExportCron;
use Plenty\Modules\Cron\Services\CronContainer;
use Plenty\Modules\DataExchange\Services\ExportPresetContainer;
use Plenty\Plugin\DataExchangeServiceProvider;
use Plenty\Plugin\ServiceProvider;


/**
 * Class ElasticExportShopping24DEServiceProvider
 *
 * @package ElasticExportShopping24DE
 */
class ElasticExportShopping24DEServiceProvider extends ServiceProvider
//class ElasticExportShopping24DEServiceProvider extends DataExchangeServiceProvider
{
    /**
     * @throws \ErrorException
     */
    public function register()
    {
        $this->getApplication()->register(CatalogBootServiceProvider::class);
    }

//    public function exports(ExportPresetContainer $container)
//    {
//        $container->add(
//            'Shopping24DE-Plugin',
//            'ElasticExportShopping24DE\ResultField\Shopping24DE',
//            'ElasticExportShopping24DE\Generator\Shopping24DE',
//            '',
//            true,
//			true
//        );
//    }
    public function boot(CronContainer $cronContainer)
    {
        // register crons
        $cronContainer->add(CronContainer::EVERY_FIFTEEN_MINUTES, ExportCron::class);
    }
}