<?php 

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RangeaoTest extends TestCase
{
    /**
     * @dataProvider arraySequenceProvider
     */
    public function testObtenerRango($range, $expected): void
    {   
        $rangeao = new Rangeao\Rangeao($range);
        
        $this->assertEquals($expected, $rangeao->getRange());
    }

    /**
     * @dataProvider arraySequenceToLiteralProvider
     */
    public function testRangoConversionARangoLiteral($range, $expected): void
    {   
        $rangeao = new Rangeao\Rangeao($range);
        
        $this->assertEquals($expected, $rangeao->toLiteralRange());
    }
    
    /**
     * @dataProvider arrayLiteralToSequenceProvider
     */
    public function testLiteralConversionASecuencia($range, $expected): void
    {   
        $rangeao = new Rangeao\Rangeao($range);
        
        $this->assertEquals($expected, $rangeao->toSequence());
    }

    
    public function arraySequenceProvider()
    {
        return [
            [[0,1,2,3], [0,1,2,3]],
            [[0,1,3,5,6,7,8], [0,1,3,5,6,7,8]],
            [[0,3,8], [0,3,8]],
            [[0-3,5,8-22], [0-3,5,8-22]],
        ];
    }

    public function arraySequenceToLiteralProvider()
    {
        return [
            [[0,1,2,3], ['0-3']],
            [[0,1,3,5,6,7,8], ['0-1',3,'5-8']],
            [[0,3,8], [0,3,8]],
        ];
    }

    public function arrayLiteraltoSequenceProvider()
    {
        return [
            [['0-3'], [0,1,2,3]],
            [['0-1',3,'5-8'], [0,1,3,5,6,7,8]],
            [[0,3,8], [0,3,8]],
        ];
    }
}