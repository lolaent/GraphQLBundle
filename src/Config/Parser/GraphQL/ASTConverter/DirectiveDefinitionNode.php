<?php

namespace Overblog\GraphQLBundle\Config\Parser\GraphQL\ASTConverter;

use GraphQL\Language\AST\Node;

class DirectiveDefinitionNode implements NodeInterface
{
    public static function toConfig(Node $node): array
    {
        $config = [];

        $config['name'] = $node->name->value;

        $config['locations'] = [];
        if (!empty($node->locations)) {
            foreach ($node->locations as $location) {
                $config['locations'][] = $location->value;
            }

            /*  if (!empty($definition->arguments)) {
                  $fieldConfig['args'] = self::toConfig($definition, 'arguments');
              }*/

            return [
                'class_name' => $node->name->value.'Directive',
                'type' => 'directive',
                'config' => $config,
            ];
        }
    }
}