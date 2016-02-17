<?php

use Flaviozantut\Parser;

class ParserTest extends TestCase
{
    /**
     * @expectedException Exception
     */
    public function testParserMetadataException()
    {
        $parser = new Parser('hello');
    }

    public function testParser()
    {
        $delimiter = Config::get('skorry.metadata_delimiter');

        $content = "$delimiter
type: article
title: \"Hello from skorry\"
date: 2011-07-03 5:59
comments: true
external_url:
tags:
permalink:
$delimiter
Hello";
        $parser = new Parser($content);
        $this->assertInstanceOf('Flaviozantut\Parser', $parser);

        return $parser;
    }

    /**
     * @depends testParser
     */
    public function testMetadata($parser)
    {
        $metadata = $parser->metadata();
        $this->assertArrayHasKey('type', $metadata);
    }

    /**
     * @depends testParser
     */
    public function testMetadataByIndex($parser)
    {
        $metadata = $parser->metadata('type');
        $this->assertEquals('article', $parser->metadata('type'));
    }

    /**
     * @depends testParser
     */
    public function testContent($parser)
    {
        $content = $parser->content();
        $this->assertEquals('<p>Hello</p>', $content);
    }
}
