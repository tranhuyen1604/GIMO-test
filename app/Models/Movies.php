<?php

namespace App\Models;

use App\Services\Database\DB;

class Movies {
	private $conn;
	private $table = 'videos';

	// Post Properties
	public $id;
	public $title;
	public $description;
	public $year;
	public $name_of_director;
	public $release_date;

	// Constructor with DB
	public function __construct($db) {
		$this->conn = DB::getConnection();
	}

	
	public function getListSong()
	{
		$query = 'SELECT
		id,
		title,
		year,
		description,
		name_of_director,
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