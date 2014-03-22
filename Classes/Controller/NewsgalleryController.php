<?php
namespace TYPO3\WizzNewsgallery\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Fabian Lachman <flachman@wizzbit.nl>, Wizzbit
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 *
 */
class NewsgalleryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * newsRepository
	 *
	 * @var \TYPO3\WizzNewsgallery\Domain\Repository\NewsRepository
	 * @inject
	 */
	protected $newsRepository;

	/**
	 * Show gallery
	 *
	 * @return void
	 */
	public function showAction() {
		$news = $this->newsRepository->findAll();

		$max = $this->settings['limit'] ? $this->settings['limit'] : 10;
		$galleryItems = array();

		foreach($news as $newsItem) {
			$media = $this->getMediaTypeImage($newsItem);
			if (count($media) > 0) {
				$galleryItems[] = array(
					'image' => $media[rand(0,count($media) - 1)],
					'newsItem' => $newsItem
				);
			}

			if (count($galleryItems) >= $max) {
				break;
			}
		}

		$this->view->assign('media', $galleryItems);
	}

    /**
     * Get image-type media items from a news item
     *
     * @param \Tx_News_Domain_Model_News $news
     * @return array|null
     */
    protected function getMediaTypeImage(\Tx_News_Domain_Model_News $news) {
        $mediaElements = $news->getMedia();

        $collection = array();
        foreach ($mediaElements as $mediaElement) {
            if ((int)$mediaElement->getType() === \Tx_News_Domain_Model_Media::MEDIA_TYPE_IMAGE) {
                $collection[] = $mediaElement;
            }
        }

        if (count($collection) > 0) {
            return $collection;
        }

        return NULL;
    }

}
?>