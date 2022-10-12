<?php

namespace Tkaratug\PoweredEnum\Tests;

use Tkaratug\PoweredEnum\PoweredEnum;
use PHPUnit\Framework\TestCase;

class PoweredEnumTest extends TestCase
{
    /**
     * @test
     */
    public function it_checks_if_enum_value_equals_to_given_value(): void
    {
        // Arrange
        $enum = PoweredEnumTestStub::ONE;

        // Assert
        $this->assertTrue($enum->is(PoweredEnumTestStub::ONE));
        $this->assertFalse($enum->is(PoweredEnumTestStub::TWO));
    }

    /**
     * @test
     */
    public function it_checks_if_enum_value_does_not_equal_to_given_value(): void
    {
        // Arrange
        $enum = PoweredEnumTestStub::ONE;

        // Assert
        $this->assertFalse($enum->isNot(PoweredEnumTestStub::ONE));
        $this->assertTrue($enum->isNot(PoweredEnumTestStub::TWO));
    }

    /**
     * @test
     */
    public function it_checks_if_the_enum_has_given_name(): void
    {
        // Assert
        $this->assertTrue(PoweredEnumTestStub::hasName('ONE'));
        $this->assertFalse(PoweredEnumTestStub::hasName('FOUR'));
    }

    /**
     * @test
     */
    public function it_checks_if_the_enum_has_given_value(): void
    {
        // Assert
        $this->assertTrue(PoweredEnumTestStub::hasValue(1));
        $this->assertFalse(PoweredEnumTestStub::hasValue(4));
    }

    /**
     * @test
     */
    public function it_returns_an_array_of_names_of_the_enum_cases(): void
    {
        // Act
        $response         = PoweredEnumTestStub::getNames();
        $filteredResponse = PoweredEnumTestStub::getNames([
            PoweredEnumTestStub::ONE,
            PoweredEnumTestStub::TWO,
        ]);

        // Assert
        $this->assertIsArray($response);
        $this->assertSame(
            ['ONE', 'TWO', 'THREE'],
            $response
        );

        $this->assertIsArray($filteredResponse);
        $this->assertSame(
            ['ONE', 'TWO'],
            $filteredResponse
        );
    }

    /**
     * @test
     */
    public function it_returns_an_array_of_values_of_the_enum_cases(): void
    {
        // Act
        $response         = PoweredEnumTestStub::getValues();
        $filteredResponse = PoweredEnumTestStub::getValues([
            PoweredEnumTestStub::ONE,
            PoweredEnumTestStub::TWO,
        ]);

        // Assert
        $this->assertIsArray($response);
        $this->assertSame(
            [1, 2, 3],
            $response
        );

        $this->assertIsArray($filteredResponse);
        $this->assertSame(
            [1, 2],
            $filteredResponse
        );
    }

    /**
     * @test
     */
    public function it_returns_a_combined_array_of_values_and_names_of_the_enum_cases(): void
    {
        // Act
        $response         = PoweredEnumTestStub::toArray();
        $filteredResponse = PoweredEnumTestStub::toArray([
            PoweredEnumTestStub::ONE,
            PoweredEnumTestStub::TWO,
        ]);

        // Assert
        $this->assertIsArray($response);
        $this->assertSame(
            [1 => 'ONE', 2 => 'TWO', 3 => 'THREE'],
            $response
        );

        $this->assertIsArray($filteredResponse);
        $this->assertSame(
            [1 => 'ONE', 2 => 'TWO'],
            $filteredResponse
        );
    }

    /**
     * @test
     */
    public function it_returns_an_array_of_names_of_the_enum_cases_except_given_ones(): void
    {
        // Act
        $response = PoweredEnumTestStub::getNamesExcept([PoweredEnumTestStub::ONE]);

        // Assert
        $this->assertIsArray($response);
        $this->assertSame(
            ['TWO', 'THREE'],
            $response
        );
    }

    /**
     * @test
     */
    public function it_returns_an_array_of_values_of_the_enum_cases_except_given_ones(): void
    {
        // Act
        $response = PoweredEnumTestStub::getValuesExcept([PoweredEnumTestStub::ONE]);

        // Assert
        $this->assertIsArray($response);
        $this->assertSame(
            [2, 3],
            $response
        );
    }

    /**
     * @test
     */
    public function it_returns_a_combined_array_of_values_and_names_of_the_enum_cases_except_given_ones(): void
    {
        // Act
        $response = PoweredEnumTestStub::toArrayExcept([PoweredEnumTestStub::ONE]);

        // Assert
        $this->assertIsArray($response);
        $this->assertSame(
            [2 => 'TWO', 3 => 'THREE'],
            $response
        );
    }

    /**
     * @test
     */
    public function it_returns_a_random_name_of_enum_cases(): void
    {
        // Assert
        $this->assertSame('ONE', SingleCaseEnumTestStub::getRandomName());
    }

    /**
     * @test
     */
    public function it_returns_a_random_value_of_enum_cases(): void
    {
        // Assert
        $this->assertSame(1, SingleCaseEnumTestStub::getRandomValue());
    }

    /**
     * @test
     */
    public function it_returns_a_random_case_of_enum_cases(): void
    {
        // Assert
        $this->assertSame(SingleCaseEnumTestStub::ONE, SingleCaseEnumTestStub::getRandomCase());
    }
}

enum PoweredEnumTestStub: int
{
    use PoweredEnum;

    case ONE   = 1;
    case TWO   = 2;
    case THREE = 3;
}

enum SingleCaseEnumTestStub: int
{
    use PoweredEnum;

    case ONE = 1;
}
