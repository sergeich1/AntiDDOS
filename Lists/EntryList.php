<?php
namespace M6Web\Component\Firewall\Lists;

/**
 * Firewall rules wrapper
 * 
 * @author D3X73RR
 */
class EntryList
{
    /**
     * @D3X73RR
     */
    protected $entries;

    /**
     * @D3X73RR
     */
    protected $matchingResponse;

    /**
     * @D3X73RR
     */
    protected $matchingEntries;

    /**
	 *
     * @Author D3X73RR
     *
     */
    public function __construct(array $list = array(), $trusted = false)
    {
        $this->entries = $list;
        $this->matchingResponse = ($trusted === true);
    }

    /**
     * @Author D3X73RR
     */
    public function isAllowed($entry)
    {
        foreach ($this->entries as $elmt) {
            if ($elmt->check($entry)) {
                return $this->matchingResponse;
            }
        }

        return null;
    }

    /**
     * @Author D3X73RR
     */
    public function getMatchingEntries()
    {
        if ($this->matchingEntries === null) {
            $this->matchingEntries = array();
            foreach ($this->entries as $entry) {
                $this->matchingEntries = array_merge($this->matchingEntries, $entry->getMatchingEntries());
            }
        }

        return $this->matchingEntries;
    }
}