<?php

namespace DM\MenuBundle\NodeVisitor;

use DM\MenuBundle\Node\Node;

/**
 * This visitor will propagate the route of the current node to the direct parent if it does not have a route yet.
 *
 * Class NodeRoutePropagator
 */
class NodeRoutePropagator implements NodeVisitorInterface
{
    /**
     * @param Node $node
     *
     * @return mixed|void
     */
    public function visit(Node $node)
    {
        $parent = $node->getParent();
        if ($parent && $node->hasRoute() && !$parent->hasRoute()) {
            $parent->setRoute($node->getRoute());
            $parent->setRouteParams($node->getRouteParams());
        }
    }
}
