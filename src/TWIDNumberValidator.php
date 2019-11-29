<?php

namespace Chaoswey\TWIDNumber;

class TWIDNumberValidator
{
    private $keyTable = [
        'A' => 10,
        'B' => 11,
        'C' => 12,
        'D' => 13,
        'E' => 14,
        'F' => 15,
        'G' => 16,
        'H' => 17,
        'I' => 34,
        'J' => 18,
        'K' => 19,
        'L' => 20,
        'M' => 21,
        'N' => 22,
        'O' => 35,
        'P' => 23,
        'Q' => 24,
        'R' => 25,
        'S' => 26,
        'T' => 27,
        'U' => 28,
        'V' => 29,
        'W' => 32,
        'X' => 30,
        'Y' => 31,
        'Z' => 33
    ];

    private $weight = [1, 9, 8, 7, 6, 5, 4, 3, 2, 1, 1];

    public function valid($id)
    {
        $id = strtoupper($id);
        if (!preg_match('/^[A-Z][1-2][0-9]{8}$/', $id)) {
            return false;
        }

        $npid = $this->keyTable[substr($id, 0, 1)] . substr($id, 1);

        $sum = 0;
        for ($i = 0; $i < 11; $i++) {
            $sum += $this->weight[$i] * substr($npid, $i, 1);
        }

        return ($sum % 10 == 0);
    }
}