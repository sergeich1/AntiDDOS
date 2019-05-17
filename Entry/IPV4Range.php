<?php
namespace M6Web\Component\Firewall\Entry;

/**
 * IPV4 Range Entry
 * 
 * @author D3X73RR
 */
class IPV4Range extends IPV4
{
    use Traits\IPRange;

    /**
     * @static string $separatorRegex Regular expression of separator
     */
    public static $separatorRegex = '(\s*)\-(\s*)';
}