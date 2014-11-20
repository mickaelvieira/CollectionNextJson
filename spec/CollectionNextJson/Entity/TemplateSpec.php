<?php

namespace spec\CollectionNextJson\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemplateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CollectionNextJson\Entity\Template');
        $this->shouldBeAnInstanceOf('CollectionJson\Entity\Template');
        $this->shouldImplement('JsonSerializable');
    }

    /**
     * @param \CollectionNextJson\Entity\Method $method
     * @param \CollectionNextJson\Entity\Enctype $enctype
     */
    function it_should_be_chainable($method, $enctype)
    {
        $this->setMethod($method)->shouldHaveType('CollectionNextJson\Entity\Template');
        $this->setEnctype($enctype)->shouldHaveType('CollectionNextJson\Entity\Template');
        $this->addData([])->shouldHaveType('CollectionNextJson\Entity\Template');
        $this->addDataSet([])->shouldHaveType('CollectionNextJson\Entity\Template');
    }

    function it_should_not_return_null_values_and_empty_arrays()
    {
        $this->toArray()->shouldBeEqualTo([]);
    }

    /**
     * @param \CollectionNextJson\Entity\Method $method
     */
    function it_should_return_an_array_with_the_method($method)
    {
        $method->toArray()->willReturn([
            'options' => [
                [
                    'value' => 'Value 1',
                    'prompt' => 'Prompt 1'
                ]
            ]
        ]);
        $this->setMethod($method);
        $this->toArray()->shouldBeEqualTo([
            'method' => [
                'options' => [
                    [
                        'value' => 'Value 1',
                        'prompt' => 'Prompt 1'
                    ]
                ]
            ]
        ]);
    }

    /**
     * @param \CollectionNextJson\Entity\Enctype $enctype
     */
    function it_should_return_an_array_with_the_enctype($enctype)
    {
        $enctype->toArray()->willReturn([
            'options' => [
                [
                    'value' => 'Value 1',
                    'prompt' => 'Prompt 1'
                ]
            ]
        ]);
        $this->setEnctype($enctype);
        $this->toArray()->shouldBeEqualTo([
            'enctype' => [
                'options' => [
                    [
                        'value' => 'Value 1',
                        'prompt' => 'Prompt 1'
                    ]
                ]
            ]
        ]);
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
    function it_should_return_an_array_with_the_data_list($data1, $data2)
    {
        $data1->toArray()->willReturn(['value' => 'value 1']);
        $data2->toArray()->willReturn(['value' => 'value 2']);

        $this->addData($data1);
        $this->addData($data2);
        $this->toArray()->shouldBeEqualTo([
            'data'   => [
                ['value' => 'value 1'],
                ['value' => 'value 2'],
            ]
        ]);
    }

    /**
     * @param \CollectionNextJson\Entity\Data $data
     */
    function it_should_add_an_envelope($data)
    {
        $data->toArray()->willReturn(['value' => 'value 1']);

        $this->addData($data);
        $this->setEnvelope('template');
        $this->toArray()->shouldBeEqualTo([
            'template' => [
                'data' => [
                    ['value' => 'value 1']
                ]
            ]
        ]);
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

    function it_should_return_a_method_entity()
    {
        $this->getMethod()->shouldHaveType('CollectionNextJson\Entity\Method');
    }

    function it_should_return_a_enctype_entity()
    {
        $this->getEnctype()->shouldHaveType('CollectionNextJson\Entity\Enctype');
    }
}
