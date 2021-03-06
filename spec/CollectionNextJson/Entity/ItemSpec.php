<?php

namespace spec\CollectionNextJson\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ItemSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CollectionNextJson\Entity\Item');
        $this->shouldBeAnInstanceOf('CollectionJson\Entity\Item');
        $this->shouldImplement('JsonSerializable');
    }

    function it_should_be_chainable()
    {
        $this->setHref('value')->shouldHaveType('CollectionNextJson\Entity\Item');
        $this->addLink([])->shouldHaveType('CollectionNextJson\Entity\Item');
        $this->addLinkSet([])->shouldHaveType('CollectionNextJson\Entity\Item');
        $this->addData([])->shouldHaveType('CollectionNextJson\Entity\Item');
        $this->addDataSet([])->shouldHaveType('CollectionNextJson\Entity\Item');
    }

    function it_should_inject_data()
    {
        $data = [
            'href' => 'http://example.com'
        ];
        $this->inject($data);
        $this->getHref()->shouldBeEqualTo('http://example.com');
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
     * @param \CollectionNextJson\Entity\Data $data
     */
    function it_should_return_an_empty_array_when_the_href_field_is_not_defined($data)
    {
        $data->toArray()->willReturn(
            [
                'name' => 'Name',
                'value' => null
            ]
        );

        $this->addData($data);
        $this->toArray()->shouldBeEqualTo([]);
    }

    /**
     * @param \CollectionNextJson\Entity\Data $data
     */
    function it_should_not_return_empty_array($data)
    {
        $data->toArray()->willReturn(
            [
                'name' => 'Name',
                'value' => null
            ]
        );

        $this->setHref('http://example.com');
        $this->addData($data);
        $this->toArray()->shouldBeEqualTo(
            [
                'data' => [
                    [
                        'name' => 'Name',
                        'value' => null
                    ]
                ],
                'href' => 'http://example.com',
            ]
        );
    }

    /**
     * @param \CollectionNextJson\Entity\Data $data
     */
    function it_should_add_data_when_it_is_passed_as_an_object($data)
    {
        $this->addData($data);
        $this->getDataSet()->shouldHaveCount(1);
    }

    function it_should_add_data_when_it_is_passed_as_an_array()
    {
        $this->addData(['value' => 'value 1']);
        $this->getDataSet()->shouldHaveCount(1);
    }

    /**
     * @param \CollectionNextJson\Entity\Data $data
     */
    function it_should_add_a_data_set($data)
    {
        $this->addDataSet([$data, ['value' => 'value 2'], new \stdClass()]);
        $this->getDataSet()->shouldHaveCount(2);
    }

    /**
     * @param \CollectionNextJson\Entity\Data $data1
     * @param \CollectionNextJson\Entity\Data $data2
     */
    function it_should_retrieve_the_data_by_name($data1, $data2)
    {
        $data1->getName()->willReturn('name1');
        $data2->getName()->willReturn('name2');

        $this->addDataSet([$data1, $data2]);

        $this->getDataByName('name1')->shouldBeEqualTo($data1);
        $this->getDataByName('name2')->shouldBeEqualTo($data2);
    }

    function it_should_return_null_when_data_is_not_the_set()
    {
        $this->getDataByName('name1')->shouldBeNull(null);
    }

    /**
     * @param \CollectionNextJson\Entity\Link $link
     */
    function it_should_add_a_link_when_it_is_passed_as_an_object($link)
    {
        $this->addLink($link);
        $this->getLinkSet()->shouldHaveCount(1);
    }

    function it_should_add_a_link_when_it_is_passed_as_an_array()
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
        $this->setHref('uri');
        $this->getLinkSet()->shouldHaveCount(2);
    }
}
