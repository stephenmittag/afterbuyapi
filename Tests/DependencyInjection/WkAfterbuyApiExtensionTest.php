<?php

namespace Wk\AfterbuyApi\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Wk\AfterbuyApi\DependencyInjection\WkAfterbuyApiExtension;

/**
 * Class WkAfterbuyApiExtensionTest
 */
class WkAfterbuyApiExtensionTest extends AbstractExtensionTestCase
{
    /**
     * Provides data for parameter misconfiguration
     */
    public function dataLoadParameterException()
    {
        $languageMessage = 'Invalid configuration for path "wk_afterbuy_api.error_language": Invalid language code %s. It should consist of two letters.';
        $partnerMessage = 'Invalid type for path "wk_afterbuy_api.partner.id". Expected int, but got %s.';

        return [
            [['error_language' => 'den'], sprintf($languageMessage, '"den"')],
            [['error_language' => 'DE'], sprintf($languageMessage, '"DE"')],
            [['error_language' => 10], sprintf($languageMessage, 10)],
            [['error_language' => true], sprintf($languageMessage, 'true')],
            [['error_language' => null], 'The path "wk_afterbuy_api.error_language" cannot contain an empty value, but got null.'],
            [['partner' => ['id' => 'BLA']], sprintf($partnerMessage, 'string')],
            [['partner' => ['id' => true]], sprintf($partnerMessage, 'boolean')],
        ];
    }

    /**
     * Tests exception for parameter misconfiguration
     *
     * @param array  $parameters
     * @param string $message
     *
     * @dataProvider dataLoadParameterException
     */
    public function testLoadParameterException(array $parameters, $message)
    {
        $this->setExpectedException(InvalidConfigurationException::class, $message);
        $this->load($parameters);
    }

    /**
     * Tests the container extension
     */
    public function testLoadParameter()
    {
        $this->load([
            'partner' => [
                'id' => 123456789,
                'password' => '5gjhgjh983',
            ],
            'user' => [
                'id' => 'usertest',
                'password' => '5gjhgjh983',
            ],
            'error_language' => 'de',
        ]);

        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.error_language', 'de');
        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.partner.id', 123456789);
        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.partner.password', '5gjhgjh983');
        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.user.id', 'usertest');
        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.user.password', '5gjhgjh983');
    }

    /**
     * @return array
     */
    protected function getContainerExtensions()
    {
        return array(
            new WkAfterbuyApiExtension()
        );
    }
}
