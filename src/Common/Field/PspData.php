<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Field;

/**
 * Future use. (20190926)
 * Private data of Psp.
 *
 * @author Guiled <guislain.duthieuw@gmail.com>
 */
class PspData extends Field
{
    protected $data1;

    public function __construct($data1)
    {
        $this->data1 = $data1;
    }
}
