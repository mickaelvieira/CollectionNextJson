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

use JsonCollection\Entity\Link as BaseLink;

/**
 * Class Link
 * @package JsonCollectionNext\Entity
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 * @link http://amundsen.com/media-types/collection/format/#arrays-links
 */
class Link extends BaseLink
{
    /**
     * @var string
     * @link http://code.ge/media-types/collection-next-json/#property-type
     */
    protected $type;

    /**
     * @param string $type
     * @return \JsonCollectionNext\Entity\Link
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
}
