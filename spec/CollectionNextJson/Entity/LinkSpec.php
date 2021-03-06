<?php

namespace spec\CollectionNextJson\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LinkSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CollectionNextJson\Entity\Link');
        $this->shouldBeAnInstanceOf('CollectionJson\Entity\Link');
        $this->shouldImplement('JsonSerializable');
    }

    function it_should_be_chainable()
    {
        $this->setHref('value')->shouldHaveType('CollectionNextJson\Entity\Link');
        $this->setRel('value')->shouldHaveType('CollectionNextJson\Entity\Link');
        $this->setType('value')->shouldHaveType('CollectionNextJson\Entity\Link');
        $this->setName('value')->shouldHaveType('CollectionNextJson\Entity\Link');
        $this->setPrompt('value')->shouldHaveType('CollectionNextJson\Entity\Link');
        $this->setRender('value')->shouldHaveType('CollectionNextJson\Entity\Link');
    }

    function it_should_inject_data()
    {
        $data = [
            'href'   => 'http://example.com',
            'rel'    => 'Link Rel',
            'type'   => 'Link Type',
            'name'   => 'Link Name',
            'render' => 'image',
            'prompt' => 'Link Prompt'
        ];
        $this->inject($data);
        $this->getHref()->shouldBeEqualTo('http://example.com');
        $this->getRel()->shouldBeEqualTo('Link Rel');
        $this->getType()->shouldBeEqualTo('Link Type');
        $this->getName()->shouldBeEqualTo('Link Name');
        $this->getRender()->shouldBeEqualTo('image');
        $this->getPrompt()->shouldBeEqualTo('Link Prompt');
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

    function it_should_not_set_the_rel_field_if_it_is_not_a_string()
    {
        $this->setRel(true);
        $this->getRel()->shouldBeNull();
    }

    function it_should_not_set_the_type_field_if_it_is_not_a_string()
    {
        $this->setType(true);
        $this->getType()->shouldBeNull();
    }

    function it_should_not_set_the_name_field_if_it_is_not_a_string()
    {
        $this->setName(true);
        $this->getName()->shouldBeNull();
    }

    function it_should_return_the_default_render_value()
    {
        $this->getRender()->shouldBeEqualTo('link');
    }

    function it_should_not_set_the_render_field_if_it_is_a_valid_render_type()
    {
        $this->setRender("Render this");
        $this->getRender()->shouldBeEqualTo('link');
    }

    function it_should_not_set_the_prompt_field_if_it_is_not_a_string()
    {
        $this->setPrompt(true);
        $this->getPrompt()->shouldBeNull();
    }

    function it_should_return_an_empty_array_when_the_href_field_is_null()
    {
        $this->setRel('Rel value');
        $this->toArray()->shouldBeEqualTo([]);
    }

    function it_should_return_an_empty_array_when_the_rel_field_is_null()
    {
        $this->setHref('Href value');
        $this->toArray()->shouldBeEqualTo([]);
    }

    function it_should_not_return_null_values()
    {
        $this->setRel('Rel value');
        $this->setHref('http://example.com');
        $this->toArray()->shouldBeEqualTo([
            'href'   => 'http://example.com',
            'rel'    => 'Rel value',
            'render' => 'link'
        ]);
    }
}
