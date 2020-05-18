<?php

namespace Overblog\GraphQLBundle\Config\Parser\GraphQL\ASTConverter;

use GraphQL\Language\AST\Node;

class ObjectExtensionNode
{
    const TYPENAME = 'objectExtension';

    public static function toConfig(Node $node)
    {
        $config = [
            //'description' => DescriptionNode::toConfig($node),
            'fields' => FieldsNode::toConfig($node),
        ];

        if (!empty($node->interfaces)) {
            $interfaces = [];
            foreach ($node->interfaces as $interface) {
                $interfaces[] = TypeNode::astTypeNodeToString($interface);
            }
            $config['interfaces'] = $interfaces;
        }

        return [
            'type' => static::TYPENAME,
            'config' => $config,
        ];
    }
}
