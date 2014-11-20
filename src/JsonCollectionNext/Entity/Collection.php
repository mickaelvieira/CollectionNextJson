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

use JsonCollection\Entity\Collection as BaseCollection;

/**
 * Class Collection
 * @package JsonCollectionNextNext\Entity
 * @link http://code.ge/media-types/collection-next-json/
 * @link http://amundsen.com/media-types/collection/format/#objects-collection
 */
class Collection extends BaseCollection
{
    /**
     * @var \JsonCollectionNext\Entity\Status
     * @link http://code.ge/media-types/collection-next-json/#object-status
     */
    protected $status;

    /**
     * @param \JsonCollectionNext\Entity\Status $status
     * @return \JsonCollectionNext\Entity\Collection
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \JsonCollectionNext\Entity\Status|null
     */
    public function getStatus()
    {
        return $this->status;
    }
}
