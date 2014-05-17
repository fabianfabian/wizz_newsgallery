<?php
namespace TYPO3\WizzNewsgallery\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Fabian Lachman <flachman@wizzbit.nl>, Wizzbit
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 * @package wizz_newsgallery
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class NewsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    protected $storagePid;

    protected $ignoreStoragePid = false;

	public function findAll() {
		$query = $this->createQuery();
        if ($this->shouldIgnoreStoragePid()) {
            $query->getQuerySettings()->setRespectStoragePage(false);
        }
        else {
            $query->getQuerySettings()->setRespectStoragePage(true);
            $query->getQuerySettings()->setStoragePageIds(array($this->getStoragePid()));
        }
		$query->setOrderings(array('datetime' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
	    return $query->execute();
	}

    /**
     * @return boolean
     */
    public function shouldIgnoreStoragePid()
    {
        return $this->ignoreStoragePid;
    }

    /**
     * @param boolean $ignoreStoragePid
     */
    public function setIgnoreStoragePid($ignoreStoragePid)
    {
        $this->ignoreStoragePid = $ignoreStoragePid;
    }



    /**
     * @return mixed
     */
    public function getStoragePid()
    {
        return $this->storagePid;
    }

    /**
     * @param mixed $storagePid
     */
    public function setStoragePid($storagePid)
    {
        $this->storagePid = $storagePid;
    }



}
