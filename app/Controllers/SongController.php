<?php

namespace App\Controllers;

use App\Models\Songs;
use PDO;
class SongController extends BaseController
{
	private $songs;

	function __construct()
	{
		$this->songs = new Songs();
	} 
	
	/**
	 * index
	 *
	 * @return array
	 */
	public function index()
	{
		$listSongs = $this->songs->getListSong();
		$num = $listSongs->rowCount();
		if ($num > 0) {
			$list_arr = array();
			$list_arr['data'] = array();
			
			while($row = $listSongs->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
	  
				$list_item = array(
					'id' => $id,
					'title' => $title,
					'name_of_album' => $name_of_album,
					'description' => $description,
					'name_of_artist' => $name_of_artist,
					'release_date' => $release_date,
				);
	  
				array_push($list_arr['data'], $list_item);
			}
			// var_dump($list_arr);

			return $list_arr;
		} else {
			echo json_encode(
				array('message' => 'No Categories Found')
			);
		}
	}
}