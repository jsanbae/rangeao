<?php

namespace Rangeao;

use Rangeao\Exceptions\InvalidRangeException;

class Rangeao {

    const RANGE_DELIMITER = '-';

    private $range;
    private $step;
    private $isLiteralRange;
    private $isSequence;

    function __construct($_range, $_step = 1) 
    {
        $this->range = $_range;
        $this->step = $_step;
    }

    public function getRange()
    {
        return $this->range;
    }
    
    public function toLiteralRange()
    {
        $numbers = $this->range;

        $literalRanges = [];
        
        sort($numbers);
        $min = min($numbers);
        $max = max($numbers);

        for ($i = 0; $i < count($numbers); $i++) {

            $current_number = $numbers[$i];
            $next_number = ($current_number === $max) ? $current_number : $numbers[$i + 1];
            $diff = $next_number - $current_number;
            
            if ($i === 0) {
                $initial_range = $min;
            }

            if ($diff !== $this->step) {
                $final_range = $current_number;

                if ($initial_range == $final_range) {
                    $literalRanges[]= $initial_range;
                } else {
                    $literalRanges[]= $initial_range . self::RANGE_DELIMITER . $final_range;
                }

                $initial_range = $next_number;
                
            }

        }

        return $literalRanges;

    }

    public function toSequence() 
    {
       $sequence = [];

       foreach ($this->range as $range) {

            if ($this->isSequence($range)) {
                $number = $range;
                $sequence[] = $number;

            } else {
                $literalRange = $range;

                $this->isValidRange($literalRange);
                $this->isWellFormedRange($literalRange);

                $interval = $this->convertLiteralRangetoInterval($literalRange);

                sort($interval);
                $range_start = $interval[0];
                $range_end = $interval[1];

                while ($range_start <= $range_end) {
                    if (!in_array($range_start, $sequence)) {
                        $sequence[]= $range_start;
                    }
                    $range_start += $this->step;
                }

            }      
        }

        sort($sequence);

        return $sequence;
    }

    public function isSequence($range)
    {
        return strpos($range, self::RANGE_DELIMITER) === false;
    }

    public function isLiteralRange($range)
    {
        return strpos($range, self::RANGE_DELIMITER) !== false;       
    }
    
    public function convertLiteralRangetoInterval($literalRange)
    {
        $interval = explode(self::RANGE_DELIMITER, $literalRange);
        $interval = array_filter($interval, 'strlen');

        return $interval;
    }
    
    public function isValidRange($literalRange)
    {
        $interval = $this->convertLiteralRangetoInterval($literalRange);

        if ($interval[0] === $literalRange) {
            throw new InvalidRangeException("Rango " . $literalRange . " inválido");
        }

        return true;        
    }

    public function isWellFormedRange($literalRange)
    {
        $interval = $this->convertLiteralRangetoInterval($literalRange);

        if (count($interval) !== 2) {
            throw new InvalidRangeException("Rango " . $literalRange . " malformado ");
        }

        return true;
    }


}