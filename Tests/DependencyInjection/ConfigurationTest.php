<?php

namespace Wk\AfterbuyApi\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionConfigurationTestCase;
use Wk\AfterbuyApi\DependencyInjection\Configuration;
use Wk\AfterbuyApi\DependencyInjection\WkAfterbuyApiExtension;

/**
 * Class ConfigurationTest
 */
class ConfigurationTest extends AbstractExtensionConfigurationTestCase
{
    public function testConfigurationFiles()
    {
        $expectedConfiguration = [
            'user' => [
                'id' => 'user',
                'password' => 'strong-password',
            ],
            'partner' => [
                'id' => 123456789,
                'password' => 'strong-password',
            ],
            'error_language' => 'de',
        ];

        $sources = [ __DIR__ . '/../Data/DependencyInjection/config.yml' ];

        $this->assertProcessedConfigurationEquals($expectedConfiguration, $sources);
    }

    /**
     * @inheritdoc
     */
    protected function getContainerExtension()
    {
        return new WkAfterbuyApiExtension();
    }

    /**
     * @inheritdoc
     */
    protected function getConfiguration()
    {
        return new Configuration();
    }
}
