<?php
namespace M6Web\Component\Firewall\Lists;

/**
 * List wrapper
 *
 * @author D3X73RR
 */
class ListMerger
{
    /**
     * @var array $lists  Lists
     */
    protected $lists = array();

    /**
     * D3X73RR
     */
    public function addList(EntryList $entryList, $name)
    {
        $this->lists[$name] = $entryList;

        return $this;
    }

    /**
     * Check if a string is allowed
     *
     * @param string  $entry String to compare
     * @param boolean $defaultState Default value
     *
     * @return boolean
     */
    public function isAllowed($entry, $defaultState)
    {
        $whited  = false;
        $blacked = false;

        if (is_array($this->lists)) {
            foreach ($this->lists as $list) {
                $allowed = $list->isAllowed($entry);
                if ($allowed !== null) {
                    if ($allowed) {
                        $whited = true;
                    } else {
                        $blacked = true;
                    }
                }
            }
        }

        return ($defaultState ? (!$blacked || $whited) : ($whited && !$blacked));
    }
}