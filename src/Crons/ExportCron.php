<?php

namespace ElasticExportShopping24DE\Crons;

use ElasticExportShopping24DE\Migrations\CatalogMigration;

/**
 * Class ExportCron
 *
 * @package ElasticExportShopping24DE\Crons
 */
class ExportCron
{
    /**
     * @param  CatalogMigration $exportService
     */
    public function handle(CatalogMigration $exportService)
    {

        $exportService->run();

    }
}
