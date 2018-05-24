<?php

/*
 * This file is part of the `liip/LiipImagineBundle` project.
 *
 * (c) https://github.com/liip/LiipImagineBundle/graphs/contributors
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Liip\ImagineBundle\Config;

use Liip\ImagineBundle\Factory\Config\FilterFactory;
use Liip\ImagineBundle\Factory\Config\FilterSetFactory;

final class FilterSetBuilder implements FilterSetBuilderInterface
{
    /**
     * @var FilterSetFactory
     */
    private $filterSetFactory;

    /**
     * @var FilterFactory
     */
    private $filterFactory;

    /**
     * @param FilterSetFactory $filterSetFactory
     * @param FilterFactory    $filterFactory
     */
    public function __construct(FilterSetFactory $filterSetFactory, FilterFactory $filterFactory)
    {
        $this->filterSetFactory = $filterSetFactory;
        $this->filterFactory = $filterFactory;
    }

    /**
     * @param string $filterSetName
     * @param array  $filterSetData
     *
     * @return FilterSetInterface
     */
    public function build(string $filterSetName, array $filterSetData): FilterSetInterface
    {
        $filters = [];
        if (!empty($filterSetData['filters'])) {
            foreach ($filterSetData['filters'] as $filterName => $filterData) {
                $filters[] = $this->filterFactory->create($filterName, $filterData);
            }
        }

        return $this->filterSetFactory->create(
            $filterSetName,
            $filterSetData['data_loader'],
            $filterSetData['quality'],
            $filters
        );
    }
}
