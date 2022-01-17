<?php

namespace App\Models;

use App\Services\Database\DB;

class Movies {
	private $conn;
	private $table = 'movies';

	// Post Properties
	public $id;
	public $title;
	public $description;
	public $year;
	public $name_of_director;
	public $release_date;

	// Constructor with DB
	public function __construct() {
		$con = new DB;
		$this->conn = $con->getConnection();
	}

	
	public function getListMovie()
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
		var_dump($stmt);
		$stmt->execute();

		return $stmt;
	}

	/**
	 * create
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function create($data)
	{
		// Create query
		$query = 'INSERT INTO ' . $this->table . ' SET title = :title, description = :description, year = :year, name_of_director = :name_of_director, release_date = :release_date';

		// Prepare statement
		$stmt = $this->conn->prepare($query);

		// Clean data
		$this->title = $data['title'];
		$this->description = $data['description'];
		$this->year = $data['year'];
		$this->name_of_director = $data['name_of_director'];
		$this->release_date = $data['release_date'];


		// Bind data
		$stmt->bindParam(':title', $data['title']);
		$stmt->bindParam(':description', $data['description']);
		$stmt->bindParam(':year', $data['year']);
		$stmt->bindParam(':name_of_director', $data['name_of_director']);
		$stmt->bindParam(':release_date', $data['release_date']);

		// Execute query
		if ($stmt->execute()) {
			return true;
		}

		printf("Error: %s.\n", $stmt->error);

		return false;
	}


	public function delete($id)
	{
		// Create query
		$query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

		$stmt = $this->conn->prepare($query);

		$this->id = $id;

		$stmt->bindParam(':id', $this->id);


		// Execute query
		if ($stmt->execute()) {
			return true;
		}

		printf("Error: %s.\n", $stmt->error);

		return false;
	}
}