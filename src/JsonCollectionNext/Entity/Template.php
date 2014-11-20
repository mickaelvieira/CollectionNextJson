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

use JsonCollection\Entity\Template as BaseTemplate;

/**
 * Class Template
 * @package JsonCollectionNext\Entity
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 * @link http://amundsen.com/media-types/collection/format/#objects-template
 */
class Template extends BaseTemplate
{
    /**
     * @var \JsonCollectionNext\Entity\Method
     * @link http://code.ge/media-types/collection-next-json/#object-method
     */
    protected $method;

    /**
     * @var \JsonCollectionNext\Entity\Enctype
     * @link http://code.ge/media-types/collection-next-json/#object-enctype
     */
    protected $enctype;

    /**
     * @param \JsonCollectionNext\Entity\Method $method
     * @return \JsonCollectionNext\Entity\Template
     */
    public function setMethod(Method $method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return \JsonCollectionNext\Entity\Method
     */
    public function getMethod()
    {
        if (is_null($this->method)) {
            $this->method = new Method();
        }
        return $this->method;
    }

    /**
     * @param \JsonCollectionNext\Entity\Enctype $enctype
     * @return \JsonCollectionNext\Entity\Template
     */
    public function setEnctype(Enctype $enctype)
    {
        $this->enctype = $enctype;
        return $this;
    }

    /**
     * @return \JsonCollectionNext\Entity\Enctype
     */
    public function getEnctype()
    {
        if (is_null($this->enctype)) {
            $this->enctype = new Enctype();
        }
        return $this->enctype;
    }
}
