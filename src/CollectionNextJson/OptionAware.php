<?php

/*
 * This file is part of CollectionNextJson, a php implementation
 * of the Collection.next+JSON Media Type
 *
 * (c) Mickaël Vieira <contact@mickael-vieira.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CollectionNextJson;

/**
 * Class OptionAware
 * @package CollectionNextJson
 */
interface OptionAware
{
    /**
     * @param \CollectionNextJson\Entity\Option|array $option
     */
    public function addOption($option);

    /**
     * @param array $set
     * @return mixed
     */
    public function addOptionSet(array $set);

    /**
     * @return array
     */
    public function getOptionSet();
}
