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

namespace JsonCollectionNext;

/**
 * Interface MessageAware
 * @package JsonCollectionNext
 */
interface MessageAware
{
    /**
     * @param \JsonCollectionNext\Entity\Message|array $message
     */
    public function addMessage($message);

    /**
     * @param array $set
     */
    public function addMessageSet(array $set);

    /**
     * @return array
     */
    public function getMessageSet();
}
