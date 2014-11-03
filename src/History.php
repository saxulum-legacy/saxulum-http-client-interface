<?php

namespace Saxulum\HttpClient;

class History
{
    /**
     * @var HistoryEntry[]
     */
    protected $historyEntries = array();

    /**
     * @param  HistoryEntry $historyEntry
     * @return $this
     */
    public function addHistoryEntry(HistoryEntry $historyEntry)
    {
        $this->historyEntries[] = $historyEntry;

        return $this;
    }

    /**
     * @return HistoryEntry[]
     */
    public function getHistoryEntries()
    {
        return $this->historyEntries;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = '';
        $seperator = "\n-----\n";
        foreach ($this->historyEntries as $historyEntry) {
            $string .= (string) $historyEntry . $seperator;
        }

        $string = substr($string, 0, strlen($seperator) * -1);

        return $string;
    }
}
