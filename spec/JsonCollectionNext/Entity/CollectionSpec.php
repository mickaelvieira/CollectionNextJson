<?php

namespace spec\JsonCollectionNext\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->shouldBeAnInstanceOf('JsonCollection\Entity\Collection');
        $this->shouldImplement('JsonSerializable');
    }

    /**
     * @param \JsonCollectionNext\Entity\Error $error
     * @param \JsonCollectionNext\Entity\Status $status
     * @param \JsonCollectionNext\Entity\Template $template
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
     * @param \JsonCollectionNext\Entity\Item $item
     * @param \JsonCollectionNext\Entity\Query $query
     * @param \JsonCollectionNext\Entity\Error $error
     * @param \JsonCollectionNext\Entity\Status $status
     * @param \JsonCollectionNext\Entity\Template $template
     */
    function it_should_be_chainable($item, $query, $error, $status, $template)
    {
        $this->setHref('href')->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->addItem($item)->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->addItems([$item])->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->addQuery($query)->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->addQueries([$query])->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->setError($error)->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->setStatus($status)->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->setTemplate($template)->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->addLink([])->shouldHaveType('JsonCollectionNext\Entity\Collection');
        $this->addLinkSet([])->shouldHaveType('JsonCollectionNext\Entity\Collection');
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
     * @param \JsonCollectionNext\Entity\Item $item
     */
    function it_should_add_a_item($item)
    {
        $this->addItem($item);
        $this->getItems()->shouldHaveCount(1);
    }

    /**
     * @param \JsonCollectionNext\Entity\Item $item1
     * @param \JsonCollectionNext\Entity\Item $item2
     */
    function it_should_add_multiple_items($item1, $item2)
    {
        $this->addItems([$item1, $item2]);
        $this->getItems()->shouldHaveCount(2);
    }

    /**
     * @param \JsonCollectionNext\Entity\Query $query
     */
    function it_should_add_a_query($query)
    {
        $this->addQuery($query);
        $this->getQueries()->shouldHaveCount(1);
    }

    /**
     * @param \JsonCollectionNext\Entity\Query $query1
     * @param \JsonCollectionNext\Entity\Query $query2
     */
    function it_should_add_multiple_queries($query1, $query2)
    {
        $this->addQueries([$query1, $query2]);
        $this->getQueries()->shouldHaveCount(2);
    }

    /**
     * @param \JsonCollectionNext\Entity\Link $link
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
     * @param \JsonCollectionNext\Entity\Link $link1
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
     * @param \JsonCollectionNext\Entity\Status $status
     */
    function it_should_set_the_status($status)
    {
        $status->getCode()->willReturn("status code");
        $this->setStatus($status);
        $this->getStatus()->shouldBeAnInstanceOf('JsonCollectionNext\Entity\Status');
        $this->getStatus()->getCode()->shouldBeEqualTo("status code");
    }

    /**
     * @param \JsonCollectionNext\Entity\Error $error
     */
    function it_should_set_the_error($error)
    {
        $error->getCode()->willReturn("error code");
        $this->setError($error);
        $this->getError()->shouldBeAnInstanceOf('JsonCollectionNext\Entity\Error');
        $this->getError()->getCode()->shouldBeEqualTo("error code");
    }

    /**
     * @param \JsonCollectionNext\Entity\Template $template
     */
    function it_should_set_the_template($template)
    {
        $this->setTemplate($template);
        $this->getTemplate()->shouldBeAnInstanceOf('JsonCollectionNext\Entity\Template');
    }
}
