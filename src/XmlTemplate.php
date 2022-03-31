<?php

namespace Hemengeliriz\ParamposLaravel;

class XmlTemplate
{
    public const PAYMENT = 'payment';
    public const HASH = 'hash';

    public static function generateTemplate($template, $properties = []): array|bool|string
    {
        $template = file_get_contents(__DIR__ . "/../resources/templates/$template.xml");
        foreach ($properties as $property => $value) {
            $template = str_replace("<$property></$property>", "<$property>$value</$property>", $template);
        }
        return $template;
    }
}
