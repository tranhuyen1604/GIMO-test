<?php

namespace App\Models;

use App\Services\Database\DB;

class Songs
{
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
	public function __construct()
	{
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
	
	/**
	 * create
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function create($data)
	{
		// Create query
		$query = 'INSERT INTO ' . $this->table . ' SET title = :title, description = :description, name_of_album = :name_of_album, name_of_artist = :name_of_artist, release_date = :release_date';

		// Prepare statement
		$stmt = $this->conn->prepare($query);

		// Clean data
		$this->title = $data['title'];
		$this->description = $data['description'];
		$this->name_of_album = $data['name_of_album'];
		$this->name_of_artist = $data['name_of_artist'];
		$this->release_date = $data['release_date'];


		// Bind data
		$stmt->bindParam(':title', $data['title']);
		$stmt->bindParam(':description', $data['description']);
		$stmt->bindParam(':name_of_album', $data['name_of_album']);
		$stmt->bindParam(':name_of_artist', $data['name_of_artist']);
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
