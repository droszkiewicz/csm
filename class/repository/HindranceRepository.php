<?php

/**
 * Description of HindranceRepository
 *
 * @author 
 */
class HindranceRepository
{
	/* @var $db Database */

	private $db;

	public function __construct(Database $db)
	{
		$this->db = $db;
	}

	public function persistRelation(Hindrance $hindrance, Sheet $sheet)
	{
		$query = "
		INSERT INTO `sheet_hindrance` (
			`id` ,
			`sheet_id` ,
			`hindrance_id`			
		)
		VALUES (
			NULL,
			:sheet_id ,
			:hindrance_id	
		);
		";

		$handle = $this->db->prepare($query);
		$handle->bindParam(':sheet_id', $sheet->getId(), PDO::PARAM_INT);
		$handle->bindParam(':hindrance_id', $hindrance->getId(), PDO::PARAM_INT);
		$handle->execute();
	}

}

?>
