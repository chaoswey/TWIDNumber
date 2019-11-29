<?php namespace Chaoswey\TWIDNumber;

use Exception;

class TWIDNumberGenerator
{
    private $headPoint = [
        'A' => ['code' => 10, 'number' => 1, 'title' => '臺北市'],
        'B' => ['code' => 11, 'number' => 10, 'title' => '臺中市'],
        'C' => ['code' => 12, 'number' => 19, 'title' => '基隆市'],
        'D' => ['code' => 13, 'number' => 28, 'title' => '臺南市'],
        'E' => ['code' => 14, 'number' => 37, 'title' => '高雄市'],
        'F' => ['code' => 15, 'number' => 46, 'title' => '新北市'],
        'G' => ['code' => 16, 'number' => 55, 'title' => '宜蘭縣'],
        'H' => ['code' => 17, 'number' => 64, 'title' => '桃園市'],
        'I' => ['code' => 34, 'number' => 39, 'title' => '嘉義市'],
        'J' => ['code' => 18, 'number' => 73, 'title' => '新竹縣'],
        'K' => ['code' => 19, 'number' => 82, 'title' => '苗栗縣'],
        'M' => ['code' => 21, 'number' => 11, 'title' => '南投縣'],
        'N' => ['code' => 22, 'number' => 20, 'title' => '彰化縣'],
        'O' => ['code' => 35, 'number' => 48, 'title' => '新竹市'],
        'P' => ['code' => 23, 'number' => 29, 'title' => '雲林縣'],
        'Q' => ['code' => 24, 'number' => 38, 'title' => '嘉義縣'],
        'T' => ['code' => 27, 'number' => 65, 'title' => '屏東縣'],
        'U' => ['code' => 28, 'number' => 74, 'title' => '花蓮縣'],
        'V' => ['code' => 29, 'number' => 83, 'title' => '臺東縣'],
        'W' => ['code' => 32, 'number' => 21, 'title' => '金門縣'],
        'X' => ['code' => 30, 'number' => 3, 'title' => '澎湖縣'],
        'Z' => ['code' => 33, 'number' => 30, 'title' => '連江縣'],
    ];

    private function getSex(): int
    {
        return mt_rand(1, 2);
    }

    private function getNumbers(): array
    {
        $numbers = [];
        for ($i = 0; $i < 7; $i++) {
            $numbers[] = mt_rand(0, 9);
        }
        array_unshift($numbers, $this->getSex());
        return $numbers;
    }

    private function getHeadRandNumber(): string
    {
        return array_rand($this->headPoint);
    }

    private function getTotal(string $index, array $numbers)
    {
        $total = 0;
        $total += $this->getHeadNumber($index);
        foreach ($numbers as $key => $number) {
            $total += $number * (8 - $key);
        }
        return $total;
    }

    private function getHeadNumber(string $index): int
    {
        if (!array_key_exists($index, $this->headPoint)) {
            throw Exception('error');
        }
        return $this->headPoint[$index]['number'];
    }

    public function generate()
    {
        $numbers = $this->getNumbers();
        $index = $this->getHeadRandNumber();
        $total = $this->getTotal($index, $numbers);

        return (($rem = ($total % 10)) == 0)
            ? $index . implode('', $numbers) . 0
            : $index . implode('', $numbers) . (10 - $rem);
    }
}
