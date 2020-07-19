<?php
/**
 * Created by enea dhack - 19/06/2020 18:53.
 */

namespace Vaened\Searcher\Tests\Dates;

use Carbon\Carbon;
use Vaened\Searcher\Dates\Dateable;
use Vaened\Searcher\Dates\Format;
use Vaened\Searcher\Tests\TestCase;

abstract class BetweenDatesTestCase extends TestCase
{
    abstract protected function createBetweenDates(): Dateable;

    abstract protected function getExpectedStartDate(): Carbon;

    abstract protected function getExpectedEndDate(): Carbon;

    public function test_generate_a_date_range(): void
    {
        $dates = $this->createBetweenDates();
        $this->assertEquals([$this->getExpectedStartDate(), $this->getExpectedEndDate()], $dates->getRange());
    }

    public function test_check_date_transformation(): void
    {
        $dates = $this->createBetweenDates();
        $this->assertCarbonEquals($this->getExpectedStartDate(), $dates->getStartDate());
        $this->assertCarbonEquals($this->getExpectedEndDate(), $dates->getEndDate());
    }

    public function test_check_date_format(): void
    {
        $dates = $this->createBetweenDates();
        $this->assertEquals($this->getExpectedStartDate()->format($this->getDateFormat()), $dates->getFormattedStartDate());
        $this->assertEquals($this->getExpectedEndDate()->format($this->getDateFormat()), $dates->getFormattedEndDate());
    }

    public function test_to_json_dates(): void
    {
        $dates = $this->createBetweenDates();
        $this->assertEquals(json_encode($this->datesToArray()), json_encode($dates->jsonSerialize()));
    }

    public function test_convert_dates_to_array(): void
    {
        $dates = $this->createBetweenDates();
        $this->assertEquals($this->datesToArray(), $dates->toArray());
    }

    public function test_convert_dates_to_json(): void
    {
        $dates = $this->createBetweenDates();
        $this->assertJson(json_encode($this->datesToArray()), $dates->toJson());
    }

    private function datesToArray(): array
    {
        return [
            'start' => $this->getExpectedStartDate(),
            'end' => $this->getExpectedEndDate(),
            'format' => [
                'start' => $this->getExpectedStartDate()->format($this->getDateFormat()),
                'end' => $this->getExpectedEndDate()->format($this->getDateFormat()),
            ],
        ];
    }

    protected function getDateFormat(): string
    {
        return Format::YMD_HIS;
    }
}
