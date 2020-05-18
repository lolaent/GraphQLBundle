<?php

namespace Overblog\GraphQLBundle\Config;

class DirectiveTypeDefinition extends TypeDefinition
{
    public function getDefinition()
    {
        $node = self::createNode('_directive_config');

        $node
            ->children()
                ->append($this->nameSection())
                ->append($this->descriptionSection())
                ->arrayNode('locations')
                    ->prototype('scalar')->info('One of the directive locations.')->end()
                ->end()
                ->arrayNode('arguments')

                ->end()
            ->end()
            ->end();

        return $node;
    }
}
