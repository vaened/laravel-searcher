<?php
/**
 * Created by enea dhack - 29/12/2019 12:15.
 */

namespace Vaened\Searcher\Dates;

abstract class Dateable implements BetweenDatesContract
{
    public function getRange(): array
    {
        return [
            $this->getStartDate(),
            $this->getEndDate(),
        ];
    }

    public function getFormattedStartDate(): string
    {
        return $this->getStartDate()->format($this->getDateFormat()->value());
    }

    public function getFormattedEndDate(): string
    {
        return $this->getEndDate()->format($this->getDateFormat()->value());
    }

    protected function getDateFormat(): Format
    {
        return Format::PRESENTATION_DATETIME();
    }

    public function toArray()
    {
        return [
            'start' => $this->getStartDate(),
            'end' => $this->getEndDate(),
            'format' => [
                'start' => $this->getFormattedStartDate(),
                'end' => $this->getFormattedEndDate(),
            ],
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
