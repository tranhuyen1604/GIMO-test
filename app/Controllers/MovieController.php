<?php

namespace App\Controllers;

use App\Models\Movies;
use PDO;
class MovieController extends BaseController
{
	private $movies;

	function __construct()
	{
		$this->movies = new Movies();
	} 
	
	/**
	 * index
	 *
	 * @return array
	 */
	public function index()
	{
		$listmovies = $this->movies->getListMovie();
		$num = $listmovies->rowCount();
		if ($num > 0) {
			$list_arr = array();
			$list_arr['data'] = array();
			
			while($row = $listmovies->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
	  
				$list_item = array(
					'id' => $id,
					'title' => $title,
					'year' => $year,
					'description' => $description,
					'name_of_director' => $name_of_director,
					'release_date' => $release_date,
				);
	  
				array_push($list_arr['data'], $list_item);
			}
			var_dump($list_arr);

			return $list_arr;
		} else {
			echo json_encode(
				array('message' => 'No Categories Found')
			);
		}
	}

    	/**
	 * create
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function create($data)
	{
		if ($this->songs->create($data)) {
			return true;
		}

		return false;
	}
	
	/**
	 * update
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function update($data)
	{
	}
	
	/**
	 * delete data
	 *
	 * @param  mixed $id
	 * @return void
	 */
	public function delete($id)
	{
		if ($this->songs->delete($id)) {
			return true;
		}

		return false;
	}
}