<?php
namespace M6Web\Component\Firewall\Entry;

/**
 * Firewall entry model
 *
 * @author D3X73RR
 */
abstract class AbstractEntry implements EntryInterface
{
    /**
     * @Author D3X73RR
     */
    protected $template;

    /**
     * @Author D3X73RR
     */
    public function __construct($entry)
    {
        $this->template = $entry;
    }
}