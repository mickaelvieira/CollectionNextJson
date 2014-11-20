<?php

namespace spec\JsonCollectionNext\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ErrorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('JsonCollectionNext\Entity\Error');
        $this->shouldBeAnInstanceOf('JsonCollection\Entity\Error');
        $this->shouldImplement('JsonCollectionNext\MessageAware');
        $this->shouldImplement('JsonSerializable');
    }

    /**
     * @param \JsonCollectionNext\Entity\Message $message
     */
    function it_should_be_chainable($message)
    {
        $this->setCode('value')->shouldHaveType('JsonCollectionNext\Entity\Error');
        $this->setMessage('value')->shouldHaveType('JsonCollectionNext\Entity\Error');
        $this->setTitle('value')->shouldHaveType('JsonCollectionNext\Entity\Error');
        $this->addMessage($message)->shouldHaveType('JsonCollectionNext\Entity\Error');
        $this->addMessageSet([$message])->shouldHaveType('JsonCollectionNext\Entity\Error');
    }

    function it_should_inject_data()
    {
        $data = [
            'title'   => 'Error Title',
            'code'    => 'Error Code',
            'message' => 'Error Message'
        ];
        $this->inject($data);
        $this->getTitle()->shouldBeEqualTo('Error Title');
        $this->getCode()->shouldBeEqualTo('Error Code');
        $this->getMessage()->shouldBeEqualTo('Error Message');
    }

    function it_should_not_set_the_title_field_if_it_is_not_a_string()
    {
        $this->setTitle(true);
        $this->getTitle()->shouldBeNull();
    }

    function it_should_not_set_the_code_field_if_it_is_not_a_string()
    {
        $this->setCode(true);
        $this->getCode()->shouldBeNull();
    }

    function it_should_not_set_the_message_field_if_it_is_not_a_string()
    {
        $this->setMessage(true);
        $this->getMessage()->shouldBeNull();
    }

    function it_should_not_extract_empty_array_and_null_fields()
    {
        $this->setMessage('My Message');
        $this->toArray()->shouldBeEqualTo(['message' => 'My Message']);
    }

    /**
     * @param \JsonCollectionNext\Entity\Message $message
     */
    function it_should_add_a_message_when_it_is_passed_as_an_object($message)
    {
        $this->addMessage($message);
        $this->getMessageSet()->shouldHaveCount(1);
    }

    function it_should_add_a_message_when_it_is_passed_as_an_array()
    {
        $this->addMessage([
            'name'    => 'Message Name',
            'code'    => 'Message Code',
            'message' => 'Message Message'
        ]);
        $this->getMessageSet()->shouldHaveCount(1);
    }

    /**
     * @param \JsonCollectionNext\Entity\Message $message1
     */
    function it_should_add_multiple_messages($message1)
    {
        $this->addMessageSet([
            $message1,
            [
                'name'    => 'Message Name',
                'code'    => 'Message Code',
                'message' => 'Message Message'
            ],
            new \stdClass()
        ]);
        $this->getMessageSet()->shouldHaveCount(2);
    }

    /**
     * @param \JsonCollectionNext\Entity\Message $message
     */
    function it_should_return_an_array_with_the_messages_list($message)
    {
        $message->toArray()->willReturn([
            'message' => 'Error Message'
        ]);

        $this->setTitle('Error Title');
        $this->setCode('Error Code');
        $this->addMessage($message);
        $this->toArray()->shouldBeEqualTo([
            'code' => 'Error Code',
            'messages' => [
                [
                    'message' => 'Error Message'
                ]
            ],
            'title' => 'Error Title'
        ]);
    }
}
