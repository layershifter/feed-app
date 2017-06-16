<?php

namespace {
    /**
     * @param array $needle
     * @param array $flatten
     *
     * @return array
     */
    function array_flatten(array $needle, array &$flatten = []): array
    {
        foreach ($needle as $item) {
            if (is_array($item)) {
                array_flatten($item, $flatten);
                continue;
            }

            $flatten[] = $item;
        }

        return $flatten;
    }
}
