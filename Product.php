class Product
{
	public $id
	public $name;
	public $description;
	public $categoryID;
	public $price;
	public $specification;	
	public $pictureArrayID;
	
	function __construct($inId=null,$inName=null,$inDesc=null,£inCat=null,$inPrice=null,$inSpec=null,$inPictures=null)
	{
	if (!empty($inId)){
	$this->id = $inId;
	}
	if (!empty($inName)){
	$this->name = $inName;
	}
	if (!empty($inDesc)){
	$this->description = $inDesc;
	}
	if (!empty($inCat)){
	$this->categoryID =  $inCat;
	}
	if (!empty($inPrice)){
	$this->price =  $inPrice;
	}
	if (!empty($inSpec)){
	$this->specification = $inSpec;
	}
	if (!empty($inPictures)){
	$this->pictureArrayID = $inPictures;
	}
	
	} //END CONTRUCT
	
	
	
} //END CLASS