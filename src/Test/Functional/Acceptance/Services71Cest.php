<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\CloudDocker\Test\Functional\Acceptance;

/**
 * @group php71
 */
class Services71Cest extends ServicesCest
{
    /**
     * Template version for testing
     */
    protected const TEMPLATE_VERSION = '2.1.18';

    /**
     * @return array
     */
    protected function servicesDataProvider(): array
    {
        return [
            'Default' => [
                'options' => '',
                'expectedResult' => [
                    'redis:5.0',
                    'magento/magento-cloud-docker-varnish:6.2-1.2',
                    'magento/magento-cloud-docker-nginx:1.19-1.2',
                    'magento/magento-cloud-docker-php:7.1-fpm-1.2',
                    'magento/magento-cloud-docker-elasticsearch:2.4-1.2',
                    'mariadb:10.2'
                ],
                'notExpectedResult' => ['rabbitmq', 'selenium/standalone-chrome:latest', 'cron'],
            ],
            'Redis 3.2, MariaDB 10.1, php 7.1, rmq 3.5' => [
                'options' => '--redis=3.2 --db=10.1 --php=7.1 --rmq=3.5',
                'expectedResult' => [
                    'redis:3.2',
                    'magento/magento-cloud-docker-varnish:6.2-1.2',
                    'magento/magento-cloud-docker-nginx:1.19-1.2',
                    'magento/magento-cloud-docker-php:7.1-fpm-1.2',
                    'magento/magento-cloud-docker-elasticsearch:2.4-1.2',
                    'mariadb:10.1',
                    'rabbitmq:3.5'
                ],
                'notExpectedResult' => ['selenium', 'cron'],
            ],
            'Redis 4.0, MariaDB 10.2, php 7.1, rmq 3.6' => [
                'options' => '--redis=4.0 --db=10.2 --php=7.1 --rmq=3.6',
                'expectedResult' => [
                    'redis:4.0',
                    'magento/magento-cloud-docker-varnish:6.2-1.2',
                    'magento/magento-cloud-docker-nginx:1.19-1.2',
                    'magento/magento-cloud-docker-php:7.1-fpm-1.2',
                    'magento/magento-cloud-docker-elasticsearch:2.4-1.2',
                    'mariadb:10.2',
                    'rabbitmq:3.6'
                ],
                'notExpectedResult' => ['selenium', 'cron'],
            ],
            'With cron and selenium' => [
                'options' => '--with-cron --with-selenium',
                'expectedResult' => [
                    'redis:5.0',
                    'magento/magento-cloud-docker-varnish:6.2-1.2',
                    'magento/magento-cloud-docker-nginx:1.19-1.2',
                    'magento/magento-cloud-docker-php:7.1-fpm-1.2',
                    'magento/magento-cloud-docker-elasticsearch:2.4-1.2',
                    'mariadb:10.2',
                    'cron',
                    'selenium/standalone-chrome:latest'
                ],
                'notExpectedResult' => ['rabbitmq'],
            ],
        ];
    }
}
