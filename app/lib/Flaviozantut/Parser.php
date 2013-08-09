<?php
namespace Flaviozantut;

use Symfony\Component\Yaml\Yaml;
use Parsedown;
use Exception;
use Config;

class Parser
{
    private $parser;

    private $delimiter;

    public function __construct($strToParse = null)
    {
        $this->parser =  new Parsedown;
        $this->delimiter = Config::get('skorry.metadata_delimiter');
        if ($strToParse) {
            $this->parse($strToParse);
        }
    }

    public function delimiter()
    {
        return $this->delimiter;
    }

    public function parse($strToParse)
    {
        $this->metadata = $this->extactMetadata($strToParse);
        $this->content = $this->extactContent($strToParse);

        return $this;
    }

    public function metadata($key = null)
    {
        if ($key) {
            return $this->metadata[$key];
        }

        return $this->metadata;
    }

    public function content()
    {
        return $this->content;
    }
    private function extactMetadata($str)
    {
        preg_match( "/^{$this->delimiter}\n(.*)\n{$this->delimiter}\n/s", $str, $match );
        if (!isset($match[1])) {
            throw new Exception('Metadata not defined');
        }

        return Yaml::parse($match[1]);
    }
    private function extactContent($str)
    {
        $md = preg_replace("/^{$this->delimiter}(.*){$this->delimiter}\n/s", "", $str);

        return $this->parser->parse($md);
    }

}
