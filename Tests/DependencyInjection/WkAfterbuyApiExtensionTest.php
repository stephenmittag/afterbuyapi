<?php

namespace Wk\AfterbuyApiBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Wk\AfterbuyApiBundle\DependencyInjection\WkAfterbuyApiExtension;

/**
 * Class WkAfterbuyApiExtensionTest
 */
class WkAfterbuyApiExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @var array
     */
    private $config;

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
        $this->load($this->config);

        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.error_language', 'de');
        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.partner.id', 123456789);
        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.partner.password', '5gjhgjh983');
        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.user.id', 'usertest');
        $this->assertContainerBuilderHasParameter('wk_afterbuy_api.user.password', '5gjhgjh983');
    }

    /**
     * Test that the services exist in the container
     */
    public function testLoadContainer()
    {
        $this->load($this->config);

        $this->assertContainerBuilderHasService('wk_afterbuy_api.xml.client', 'Wk\AfterbuyApiBundle\Services\Xml\Client');
        $this->assertContainerBuilderHasServiceDefinitionWithArgument('wk_afterbuy_api.xml.client', 0, '%wk_afterbuy_api.user.id%');
        $this->assertContainerBuilderHasServiceDefinitionWithArgument('wk_afterbuy_api.xml.client', 1, '%wk_afterbuy_api.user.password%');
        $this->assertContainerBuilderHasServiceDefinitionWithArgument('wk_afterbuy_api.xml.client', 2, '%wk_afterbuy_api.partner.id%');
        $this->assertContainerBuilderHasServiceDefinitionWithArgument('wk_afterbuy_api.xml.client', 3, '%wk_afterbuy_api.partner.password%');
        $this->assertContainerBuilderHasServiceDefinitionWithArgument('wk_afterbuy_api.xml.client', 4, '%wk_afterbuy_api.error_language%');
        $this->assertContainerBuilderHasServiceDefinitionWithMethodCall('wk_afterbuy_api.xml.client', 'setSerializer', ['serializer']);
        $this->assertContainerBuilderHasServiceDefinitionWithMethodCall('wk_afterbuy_api.xml.client', 'setLogger', ['logger']);
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

    /**
     * set up config
     */
    protected function setUp() {
        parent::setUp();

        $this->config = [
            'partner' => [
                'id' => 123456789,
                'password' => '5gjhgjh983',
            ],
            'user' => [
                'id' => 'usertest',
                'password' => '5gjhgjh983',
            ],
            'error_language' => 'de',
        ];
    }
}
