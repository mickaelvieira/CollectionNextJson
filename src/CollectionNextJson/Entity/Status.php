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

/**
 * Class Status
 * @package CollectionNextJson\Entity
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 * @link http://code.ge/media-types/collection-next-json/#object-status
 */
class Status extends BaseEntity
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-code
     */
    protected $code;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-message
     */
    protected $message;

    /**
     * @param string $code
     * @return \CollectionNextJson\Entity\Status
     */
    public function setCode($code)
    {
        if (is_string($code)) {
            $this->code = $code;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $message
     * @return \CollectionNextJson\Entity\Status
     */
    public function setMessage($message)
    {
        if (is_string($message)) {
            $this->message = $message;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        $data = $this->getSortedObjectVars();
        $data = $this->filterNullValues($data);

        return $data;
    }
}
