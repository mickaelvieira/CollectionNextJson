<?php

namespace spec\JsonCollectionNext\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ListDataSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('JsonCollectionNext\Entity\ListData');
        $this->shouldImplement('JsonCollection\ArrayInjectable');
        $this->shouldImplement('JsonCollection\ArrayConvertible');
        $this->shouldImplement('JsonSerializable');
    }

    function it_should_be_chainable()
    {
        $this->setMultiple('value')->shouldHaveType('JsonCollectionNext\Entity\ListData');
        $this->setDefault('value')->shouldHaveType('JsonCollectionNext\Entity\ListData');
        $this->addOption([])->shouldHaveType('JsonCollectionNext\Entity\ListData');
        $this->addOptionSet([])->shouldHaveType('JsonCollectionNext\Entity\ListData');
    }

    function it_should_inject_data()
    {
        $data = [
            'multiple' => true,
            'default'    => 'Default Value'
        ];
        $this->inject($data);
        $this->getDefault()->shouldBeEqualTo('Default Value');
        $this->shouldBeMultiple();
    }

    function it_should_not_set_the_default_field_if_it_is_not_a_string()
    {
        $this->setDefault(true);
        $this->getDefault()->shouldBeNull();
    }

    function it_should_not_set_the_multiple_field_if_it_is_not_a_boolean()
    {
        $this->setMultiple(1);
        $this->isMultiple()->shouldBeNull();
    }

    function it_should_extract_an_empty_array_when_there_is_no_option()
    {
        $this->setMultiple(true);
        $this->setDefault('Default Value');
        $this->toArray()->shouldBeEqualTo([]);
    }

    /**
     * @param \JsonCollectionNext\Entity\Option $option
     */
    function it_should_not_return_null_values($option)
    {
        $option->toArray()->willReturn([
            'value' => 'test'
        ]);

        $this->addOption($option);
        $this->toArray()->shouldBeEqualTo([
            'options' => [
                [
                    'value' => 'test'
                ]
            ]
        ]);
    }


    /**
     * @param \JsonCollectionNext\Entity\Option $option1
     * @param \JsonCollectionNext\Entity\Option $option2
     */
    function it_should_return_an_array_with_the_options_list($option1, $option2)
    {
        $option1->toArray()->willReturn([
            'value' => 'Value 1',
            'prompt' => 'Prompt 1'
        ]);
        $option2->toArray()->willReturn([
            'value' => 'Value 2',
            'prompt' => 'Prompt 2'
        ]);

        $this->addOption($option1);
        $this->addOption($option2);
        $this->toArray()->shouldBeEqualTo([
            'options' => [
                [
                    'value' => 'Value 1',
                    'prompt' => 'Prompt 1'
                ],
                [
                    'value' => 'Value 2',
                    'prompt' => 'Prompt 2'
                ]
            ]
        ]);
    }

    /**
     * @param \JsonCollectionNext\Entity\Option $option1
     */
    function it_should_add_option_when_it_is_passed_as_an_object($option1)
    {
        $this->addOption($option1);
        $this->getOptionSet()->shouldHaveCount(1);
    }

    function it_should_add_option_when_it_is_passed_as_an_array()
    {
        $this->addOption([
            'value' => 'Value 2',
            'prompt' => 'Prompt 2'
        ]);
        $this->getOptionSet()->shouldHaveCount(1);
    }

    /**
     * @param \JsonCollectionNext\Entity\Option $option1
     * @param \JsonCollectionNext\Entity\Option $option2
     */
    function it_should_add_option_set($option1, $option2)
    {
        $this->addOptionSet([$option1, $option2, new \stdClass()]);
        $this->getOptionSet()->shouldHaveCount(2);
    }
}
