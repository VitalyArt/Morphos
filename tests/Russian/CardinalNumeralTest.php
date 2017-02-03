<?php
namespace morphos\test\Russian;
require __DIR__.'/../../vendor/autoload.php';

use morphos\NumeralCreation;
use morphos\Russian\Cases;
use morphos\Russian\CardinalNumeral;

class CardinalNumeralTest extends \PHPUnit_Framework_TestCase {
    protected $cardinal;

    public function setUp() {
        $this->cardinal = new CardinalNumeral();
    }

    /**
     * @dataProvider numbersProvider
     */
    public function testGetForms($number, $gender, $case, $case2, $case3, $case4, $case5, $case6) {
        $this->assertEquals(array(
            Cases::IMENIT => $case,
            Cases::RODIT => $case2,
            Cases::DAT => $case3,
            Cases::VINIT => $case4,
            Cases::TVORIT => $case5,
            Cases::PREDLOJ => $case6,
        ), $this->cardinal->getForms($number, $gender));
    }

    public function numbersProvider() {
        return array(
            array(1, NumeralCreation::MALE, 'один', 'одного', 'одному', 'один', 'одним', 'об одном'),
            array(1, NumeralCreation::FEMALE, 'одна', 'одной', 'одной', 'одну', 'одной', 'об одной'),
            array(201, NumeralCreation::MALE, 'двести один', 'двухсот одного', 'двумстам одному', 'двести один', 'двумястами одним', 'о двухстах одном'),
            array(344, NumeralCreation::MALE, 'триста сорок четыре', 'трехсот сорока четырех', 'тремстам сорока четырем', 'триста сорок четыре', 'тремястами сорока четырьмя', 'о трехстах сорока четырех'),
            array(1007, NumeralCreation::MALE, 'одна тысяча семь', 'одной тысячи семи', 'одной тысяче семи', 'одну тысячу семь', 'одной тысячей семью', 'об одной тысяче семи'),
            array(3651, NumeralCreation::MALE, 'три тысячи шестьсот пятьдесят один', 'трех тысяч шестисот пятидесяти одного', 'трем тысячам шестистам пятидесяти одному', 'три тысячи шестьсот пятьдесят один', 'тремя тысячами шестьюстами пятьюдесятью одним', 'о трех тысячах шестистах пятидесяти одном'),
            array(9999, NumeralCreation::MALE, 'девять тысяч девятьсот девяносто девять', 'девяти тысяч девятисот девяноста девяти', 'девяти тысячам девятистам девяноста девяти', 'девять тысяч девятьсот девяносто девять', 'девятью тысячами девятьюстами девяноста девятью', 'о девяти тысячах девятистах девяноста девяти'),
            array(1234567890, NumeralCreation::MALE,
                'один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяносто',
                'одного миллиарда двухсот тридцати четырех миллионов пятисот шестидесяти семи тысяч восьмисот девяноста',
                'одному миллиарду двумстам тридцати четырем миллионам пятистам шестидесяти семи тысячам восьмистам девяноста',
                'один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяносто',
                'одним миллиардом двумястами тридцатью четырьмя миллионами пятьюстами шестьюдесятью семью тысячами восьмистами девяноста',
                'об одном миллиарде двухстах тридцати четырех миллионах пятистах шестидесяти семи тысячах восьмистах девяноста',
            ),
        );
    }
}

