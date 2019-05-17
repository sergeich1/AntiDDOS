<?php
namespace M6Web\Component\Firewall\Entry;

/**
 * IPV6 Range Entry
 * 
 * @author D3X73RR
 */
class IPV6Range extends IPV6
{
    use Traits\IPRange;

    /**
     * @static string $separatorRegex Regular expression of separator
     */
    public static $separatorRegex = '(\s*)\-(\s*)';
}