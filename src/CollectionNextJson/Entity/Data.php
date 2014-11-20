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

use CollectionJson\Entity\Data as BaseData;

/**
 * Class Data
 * @package CollectionNextJson\Entity
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 * @link http://amundsen.com/media-types/collection/format/#arrays-data
 */
class Data extends BaseData
{
    /**
     * @var string
     * @link http://code.ge/media-types/collection-next-json/#property-type
     */
    protected $type;

    /**
     * @var bool
     * @link http://code.ge/media-types/collection-next-json/#property-required
     */
    protected $required;

    /**
     * @var \CollectionNextJson\Entity\ListData
     * @link http://code.ge/media-types/collection-next-json/#object-list
     */
    protected $list;

    /**
     * @param string $type
     * @return \CollectionNextJson\Entity\Data
     */
    public function setType($type)
    {
        if (is_string($type)) {
            $this->type = $type;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param boolean $required
     * @return \CollectionNextJson\Entity\Data
     */
    public function setRequired($required)
    {
        if (is_bool($required)) {
            $this->required = $required;
        }
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @return \CollectionNextJson\Entity\ListData
     */
    public function getList()
    {
        if (is_null($this->list)) {
            $this->list = new ListData();
        }
        return $this->list;
    }

    /**
     * @param \CollectionNextJson\Entity\ListData $list
     * @return \CollectionNextJson\Entity\Data
     */
    public function setList(ListData $list)
    {
        $this->list = $list;
        return $this;
    }

    /**
     * @param \CollectionNextJson\Entity\Option|array $option
     * @return \CollectionNextJson\Entity\Data
     */
    public function addOptionToList($option)
    {
        $list = $this->getList();
        if (is_array($option)) {
            $option = new Option($option);
        }
        $list->addOption($option);
        return $this;
    }

    /**
     * @param array       $options
     * @param null|bool   $multiple
     * @param null|string $default
     * 
     * @return \CollectionNextJson\Entity\Data
     */
    public function addOptionsToList(array $options, $multiple = null, $default = null)
    {
        $list = $this->getList();
        $list->setMultiple($multiple);
        $list->setDefault($default);

        foreach ($options as $option) {
            $this->addOptionToList($option);
        }
        return $this;
    }
}
