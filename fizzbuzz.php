<?php

/**
 * Interface Word
 */
interface Word
{
    public function word();
}

/**
 * Class Fizz
 */
class Fizz implements Word
{
    public function word()
    {
        return 'Fizz';
    }
}

/**
 * Class Buzz
 */
class Buzz implements Word
{
    public function word()
    {
        return 'Buzz';
    }
}

/**
 * Class FizzBuzz
 */
class FizzBuzz
{
    /**
     * @var Fizz
     */
    protected $fizz;

    /**
     * @var Buzz
     */
    protected $buzz;

    /**
     * FizzBuzz constructor.
     * @param Fizz $fizz
     * @param Buzz $buzz
     */
    public function __construct(Fizz $fizz, Buzz $buzz)
    {
        $this->fizz = $fizz;
        $this->buzz = $buzz;
    }

    /**
     * @param int $startInt
     * @param int $endInt
     * @param int $fizzInt
     * @param int $buzzInt
     * @return Generator
     */
    public function generateFizzBuzz(
        int $startInt = 1,
        int $endInt = 100,
        int $fizzInt = 3,
        int $buzzInt = 5
    )
    {
        for ($i = $startInt; $i <= $endInt; $i++) {

            $isFizz = $this->isMultiple($i, $fizzInt);
            $isBuzz = $this->isMultiple($i, $buzzInt);

            if( $isFizz && $isBuzz ){
                yield $this->fizz->word() . $this->buzz->word();
                continue;
            }

            if( $isFizz ){
                yield $this->fizz->word();
                continue;
            }

            if( $isBuzz ){
                yield $this->buzz->word();
                continue;
            }

            yield $i;

        }
    }

    /**
     * @param int $value
     * @param int $multiple
     * @return bool
     */
    private function isMultiple(int $value, int $multiple): bool
    {
        return 0 === $value % $multiple;
    }
}

$fizz = new Fizz();

$buzz = new Buzz();

$fizzBuzz = new FizzBuzz($fizz, $buzz);

foreach ($fizzBuzz->generateFizzBuzz() as $value) {
    echo $value, PHP_EOL;
}
