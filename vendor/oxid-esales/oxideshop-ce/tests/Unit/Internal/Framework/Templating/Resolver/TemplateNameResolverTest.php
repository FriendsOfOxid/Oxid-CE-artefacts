<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Tests\Unit\Internal\Framework\Templating\Resolver;

use OxidEsales\EshopCommunity\Internal\Framework\Templating\TemplateEngineInterface;
use OxidEsales\EshopCommunity\Internal\Framework\Templating\Resolver\TemplateNameResolver;

class TemplateNameResolverTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider resolveSmartyDataProvider
     */
    public function testResolveSmartyTemplate($templateName, $response): void
    {
        $resolver = new TemplateNameResolver($this->getTemplateEngineMock('tpl'));

        $this->assertSame($response, $resolver->resolve($templateName));
    }

    public function resolveSmartyDataProvider(): array
    {
        return [
            [
                'template',
                'template.tpl'
            ],
            [
                'some/path/template',
                'some/path/template.tpl'
            ],
            [
                'some/path/template_name',
                'some/path/template_name.tpl'
            ],
            [
                'some/path/template.name',
                'some/path/template.name.tpl'
            ],
            [
                '',
                ''
            ]
        ];
    }

    /**
     * @dataProvider resolveTwigDataProvider
     */
    public function testResolveTwigTemplate($response, $templateName): void
    {
        $resolver = new TemplateNameResolver($this->getTemplateEngineMock('html.twig'));

        $this->assertSame($response, $resolver->resolve($templateName));
    }

    public function resolveTwigDataProvider(): array
    {
        return [
            [
                'template.html.twig',
                'template'
            ],
            [
                'some/path/template_name.html.twig',
                'some/path/template_name'
            ],
            [
                'some/path/template.name.html.twig',
                'some/path/template.name'
            ],
            [
                '',
                ''
            ]
        ];
    }

    /**
     * @param string $extension
     *
     * @return TemplateEngineInterface
     */
    private function getTemplateEngineMock($extension): TemplateEngineInterface
    {
        $engine = $this
            ->getMockBuilder('OxidEsales\EshopCommunity\Internal\Framework\Templating\TemplateEngineInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $engine->expects($this->any())
            ->method('getDefaultFileExtension')
            ->will($this->returnValue($extension));

        return $engine;
    }
}
