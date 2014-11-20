<?php

namespace spec\CollectionNextJson\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->shouldBeAnInstanceOf('CollectionJson\Entity\Collection');
        $this->shouldImplement('JsonSerializable');
    }

    /**
     * @param \CollectionNextJson\Entity\Error $error
     * @param \CollectionNextJson\Entity\Status $status
     * @param \CollectionNextJson\Entity\Template $template
     */
    function it_should_inject_data($error, $status, $template)
    {
        $data = [
            'href'     => 'http://example.com',
            'error'    => $error,
            'status'   => $status,
            'template' => $template
        ];
        $this->inject($data);
        $this->getHref()->shouldBeEqualTo('http://example.com');
        $this->getError()->shouldBeEqualTo($error);
        $this->getStatus()->shouldBeEqualTo($status);
        $this->getTemplate()->shouldBeEqualTo($template);
    }

    function it_should_not_set_the_href_field_if_it_is_not_a_string()
    {
        $this->setHref(true);
        $this->getHref()->shouldBeNull();
    }

    function it_should_not_set_the_href_field_if_it_is_not_a_valid_url()
    {
        $this->setHref('uri');
        $this->getHref()->shouldBeNull();
    }

    /**
     * @param \CollectionNextJson\Entity\Item $item
     * @param \CollectionNextJson\Entity\Query $query
     * @param \CollectionNextJson\Entity\Error $error
     * @param \CollectionNextJson\Entity\Status $status
     * @param \CollectionNextJson\Entity\Template $template
     */
    function it_should_be_chainable($item, $query, $error, $status, $template)
    {
        $this->setHref('href')->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->addItem($item)->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->addItemSet([$item])->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->addQuery($query)->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->addQuerySet([$query])->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->setError($error)->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->setStatus($status)->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->setTemplate($template)->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->addLink([])->shouldHaveType('CollectionNextJson\Entity\Collection');
        $this->addLinkSet([])->shouldHaveType('CollectionNextJson\Entity\Collection');
    }

    function it_should_not_extract_null_and_empty_array_fields()
    {
        $this->toArray()->shouldBeEqualTo([
            'collection' => [
                'version' => '1.0'
            ]
        ]);
    }

    /**
     * @param \CollectionNextJson\Entity\Item $item
     */
    function it_should_add_a_item($item)
    {
        $this->addItem($item);
        $this->getItemSet()->shouldHaveCount(1);
    }

    /**
     * @param \CollectionNextJson\Entity\Item $item1
     * @param \CollectionNextJson\Entity\Item $item2
     */
    function it_should_add_multiple_items($item1, $item2)
    {
        $this->addItemSet([$item1, $item2]);
        $this->getItemSet()->shouldHaveCount(2);
    }

    /**
     * @param \CollectionNextJson\Entity\Query $query
     */
    function it_should_add_a_query($query)
    {
        $this->addQuery($query);
        $this->getQuerySet()->shouldHaveCount(1);
    }

    /**
     * @param \CollectionNextJson\Entity\Query $query1
     * @param \CollectionNextJson\Entity\Query $query2
     */
    function it_should_add_multiple_queries($query1, $query2)
    {
        $this->addQuerySet([$query1, $query2]);
        $this->getQuerySet()->shouldHaveCount(2);
    }

    /**
     * @param \CollectionNextJson\Entity\Link $link
     */
    function it_should_add_a_link($link)
    {
        $this->addLink($link);
        $this->getLinkSet()->shouldHaveCount(1);
    }

    function it_should_add_a_link_when_passing_an_array()
    {
        $this->addLink([
            'href'   => 'Href value',
            'rel'    => 'Rel value',
            'render' => 'link'
        ]);
        $this->getLinkSet()->shouldHaveCount(1);
    }

    /**
     * @param \CollectionNextJson\Entity\Link $link1
     */
    function it_should_add_a_link_set($link1)
    {
        $this->addLinkSet([
            $link1,
            [
                'href'   => 'Href value2',
                'rel'    => 'Rel value2',
                'render' => 'link2'
            ],
            new \stdClass()
        ]);
        $this->getLinkSet()->shouldHaveCount(2);
    }

    /**
     * @param \CollectionNextJson\Entity\Status $status
     */
    function it_should_set_the_status($status)
    {
        $status->getCode()->willReturn("status code");
        $this->setStatus($status);
        $this->getStatus()->shouldBeAnInstanceOf('CollectionNextJson\Entity\Status');
        $this->getStatus()->getCode()->shouldBeEqualTo("status code");
    }

    /**
     * @param \CollectionNextJson\Entity\Error $error
     */
    function it_should_set_the_error($error)
    {
        $error->getCode()->willReturn("error code");
        $this->setError($error);
        $this->getError()->shouldBeAnInstanceOf('CollectionNextJson\Entity\Error');
        $this->getError()->getCode()->shouldBeEqualTo("error code");
    }

    /**
     * @param \CollectionNextJson\Entity\Template $template
     */
    function it_should_set_the_template($template)
    {
        $this->setTemplate($template);
        $this->getTemplate()->shouldBeAnInstanceOf('CollectionNextJson\Entity\Template');
    }
}
