<?php

/*
 * This file is part of JsonCollectionNext, a php implementation
 * of the Collection.next+JSON Media Type
 *
 * (c) Mickaël Vieira <contact@mickael-vieira.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JsonCollectionNext\Entity;

use JsonCollectionNext\BaseEntity;
use JsonCollectionNext\OptionAware;
use JsonCollectionNext\OptionContainer;

/**
 * Class ListData
 * @package JsonCollectionNext\Entity
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 * @link http://code.ge/media-types/collection-next-json/#object-list
 */
class ListData extends BaseEntity implements OptionAware
{

    use OptionContainer;

    /**
     * @var bool
     * @link http://code.ge/media-types/collection-next-json/#property-multiple
     */
    protected $multiple;

    /**
     * @var string
     * @link http://code.ge/media-types/collection-next-json/#property-default
     */
    protected $default;

    /**
     * @param boolean $multiple
     * @return \JsonCollectionNext\Entity\ListData
     */
    public function setMultiple($multiple)
    {
        if (is_bool($multiple)) {
            $this->multiple = $multiple;
        }
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMultiple()
    {
        return $this->multiple;
    }

    /**
     * @param string $default
     * @return \JsonCollectionNext\Entity\ListData
     */
    public function setDefault($default)
    {
        if (is_string($default)) {
            $this->default = $default;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        $data = [];
        if (!empty($this->options)) {
            $data = $this->getSortedObjectVars();
            $data = $this->filterNullValues($data);
        }
        return $data;
    }
}
