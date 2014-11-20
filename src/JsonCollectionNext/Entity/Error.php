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

use JsonCollection\Entity\Error as BaseError;
use JsonCollectionNext\MessageAware;

/**
 * Class Error
 * @package JsonCollectionNext\Entity
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 * @link http://amundsen.com/media-types/collection/format/#objects-error
 */
class Error extends BaseError implements MessageAware
{
    /**
     * @var array
     * @link http://code.ge/media-types/collection-next-json/#array-messages
     */
    protected $messages = [];

    /**
     * @param \JsonCollectionNext\Entity\Message|array $message
     * @return \JsonCollectionNext\Entity\Error
     */
    public function addMessage($message)
    {
        if (is_array($message)) {
            $message = new Message($message);
        }
        if ($message instanceof Message) {
            array_push($this->messages, $message);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getMessageSet()
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     * @return \JsonCollectionNext\Entity\Error
     */
    public function addMessageSet(array $messages)
    {
        foreach ($messages as $message) {
            $this->addMessage($message);
        }
        return $this;
    }
}
