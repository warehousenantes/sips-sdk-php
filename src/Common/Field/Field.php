<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Field;

/**
 * Class Field.
 */
class Field
{
    /**
     * @return Field
     */
    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        return $this;
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this as $key => $value) {
            if (null !== $value) {
                if ($value instanceof self) {
                    $array[$key] = $value->toArray();
                } elseif (\is_bool($value)) {
                    $array[$key] = ($value ? 'true' : 'false');
                } else {
                    $array[$key] = $value;
                }
            }
        }

        ksort($array);

        return $array;
    }
}
