<?php 

namespace Photos;

class Photo {
	private $id;
	private $image;
	private $text;

	public function __construct($id, $image, $text) {
		$this->id = $id;
		$this->image = $image;
		$this->text = $text;
	}

	public function get_html(){
		return"<a href='image.php?id=$this->id' class='item'>" . 
							"<img src='$this->image'>" .
							"<p>$this->text</p>" .
					"</a>";
	}

}

?>