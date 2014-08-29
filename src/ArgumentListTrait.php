<?php

namespace Gigablah\GuzzleHttp\Command;

/**
 * This trait allows Guzzle operations to be called with an argument list.
 *
 * Each argument is matched with the corresponding parameter name in the same
 * order as defined in the operation config. If the last argument is an array,
 * it is merged into the parameter array.
 *
 * @author Chris Heng <bigblah@gmail.com>
 */
trait ArgumentListTrait
{
    public function __call($name, array $arguments)
    {
        $name = ucfirst($name);
        $params = $this->getCommand($name)->getOperation()->getParams();
        $packed = [];

        while ($argument = array_shift($arguments)) {
            if (!count($arguments) && is_array($argument)) {
                $packed += $argument;
            } elseif ($param = array_shift($params)) {
                $packed[$param->getName()] = $argument;
            }
        }

        return parent::__call($name, [$packed]);
    }
}
