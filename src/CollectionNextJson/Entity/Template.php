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

use CollectionJson\Entity\Template as BaseTemplate;

/**
 * Class Template
 * @package CollectionNextJson\Entity
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 * @link http://amundsen.com/media-types/collection/format/#objects-template
 */
class Template extends BaseTemplate
{
    /**
     * @var \CollectionNextJson\Entity\Method
     * @link http://code.ge/media-types/collection-next-json/#object-method
     */
    protected $method;

    /**
     * @var \CollectionNextJson\Entity\Enctype
     * @link http://code.ge/media-types/collection-next-json/#object-enctype
     */
    protected $enctype;

    /**
     * @param \CollectionNextJson\Entity\Method $method
     * @return \CollectionNextJson\Entity\Template
     */
    public function setMethod(Method $method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return \CollectionNextJson\Entity\Method
     */
    public function getMethod()
    {
        if (is_null($this->method)) {
            $this->method = new Method();
        }
        return $this->method;
    }

    /**
     * @param \CollectionNextJson\Entity\Enctype $enctype
     * @return \CollectionNextJson\Entity\Template
     */
    public function setEnctype(Enctype $enctype)
    {
        $this->enctype = $enctype;
        return $this;
    }

    /**
     * @return \CollectionNextJson\Entity\Enctype
     */
    public function getEnctype()
    {
        if (is_null($this->enctype)) {
            $this->enctype = new Enctype();
        }
        return $this->enctype;
    }
}
