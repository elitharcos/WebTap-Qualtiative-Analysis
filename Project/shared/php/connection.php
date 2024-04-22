<?php
	$conn = mysqli_connect("localhost","team08","i3GDh1GeOHOFF7X","team08");

	if (mysqli_connect_errno()){
		exit();
	}

	function execute_query($c, $query, $data) {
		$st = $c->prepare($query);
		$types = "";
		foreach ($data as $value) {
			switch (gettype($value)) {
				case 'string':
					$types .= 's';
					break;
				case 'double':
					$types .= 'd';	
					break;
				case 'integer':
					$types .= 'i';
					break;
			}
		}

		$st->bind_param($types, ...$data);
		$st->execute();
		return $st->get_result();
	}
