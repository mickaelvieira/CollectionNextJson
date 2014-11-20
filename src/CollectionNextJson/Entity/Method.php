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

namespace CollectionNextJson\Entity;

use CollectionNextJson\BaseEntity;
use CollectionNextJson\OptionAware;
use CollectionNextJson\OptionContainer;

/**
 * Class Method
 * @package CollectionNextJson\Entity
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 * @link http://code.ge/media-types/collection-next-json/#object-method
 */
class Method extends BaseEntity implements OptionAware
{

    use OptionContainer;

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        $data = $this->getSortedObjectVars();
        $data = $this->filterEmptyArrays($data);

        return $data;
    }
}
