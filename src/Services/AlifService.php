<?php

namespace Ibrokhim\AlifPhp\Services;

class AlifService
{
    /**
     * @var FileIOService
     */
    private $fileIOService;

    public function __construct(
        FileIOService $fileIOService
    ) {
        $this->fileIOService = $fileIOService;
    }

    public function solve(string $filename, string $operand, string $positiveFile, string $negativeFile): bool
    {
        $data = explode("\n", $this->fileIOService->readFromFile($filename));
        $positiveResults = [];
        $negativeResults = [];

        foreach ($data as $row) {
            $values = explode(' ', $row);

            switch ($operand) {
                case "addition":
                    $result = (double)$values[0] + (double)$values[1];
                    break;
                case "subtraction":
                    $result = (double)$values[0] - (double)$values[1];
                    break;
                case "multiplication":
                    $result = (double)$values[0] * (double)$values[1];
                    break;
                case "division":
                    $result = (double)$values[0] / (double)$values[1];
                    break;
                default:
                    echo "Wrong operation selected!" . PHP_EOL;
                    exit();
            }

            if ($result >= 0) {
                $positiveResults[] = $result;
            } else {
                $negativeResults[] = $result;
            }
        }

        $this->fileIOService->writeToFile($positiveFile, implode("\n", $positiveResults), LOCK_EX);
        $this->fileIOService->writeToFile($negativeFile, implode("\n", $negativeResults), LOCK_EX);

        return true;
    }
}