<?php

/*
 * This file is part of the `liip/LiipImagineBundle` project.
 *
 * (c) https://github.com/liip/LiipImagineBundle/graphs/contributors
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Liip\ImagineBundle\DependencyInjection\Factory;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

interface FactoryInterface
{
    /**
     * @return string The resolver service id
     */
    public function create(ContainerBuilder $container, string $name, array $config): string;

    public function getName(): string;

    public function addConfiguration(ArrayNodeDefinition $builder): void;
}
