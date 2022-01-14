<?php

namespace App\Models;

use App\Services\Database\DB;

class Songs {
	private $conn;
	private $table = 'songs';

	// Post Properties
	public $id;
	public $title;
	public $description;
	public $name_of_album;
	public $name_of_artist;
	public $release_date;

	// Constructor with DB
	public function __construct() {
		$con = new DB;
		$this->conn = $con->getConnection();
	}

		
	/**
	 * getListSong
	 *
	 * @return mixed
	 */
	public function getListSong()
	{
		$query = 'SELECT
		id,
		title,
		name_of_album,
		description,
		name_of_artist,
		release_date
		FROM
		' . $this->table . '
		ORDER BY
		id DESC';

		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt;
	}
}