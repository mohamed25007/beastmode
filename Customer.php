class Customer 
{

	public $id;
	public $title;
	public $firstName;
	public $lastName;
	public $email;
	public $phoneNumber;
	public $addressLine1;
	public $addressLine2;
	public $addressCity;
	public $addressPostal;
	public $password;
	
	function __construct($inId=null,$inTitle=null,$inFName=null,$inLName
	,$inEmail=null,$inPNumber=null,$inAddress1=null,$inAddress2=null
	,$inAddressCity=null,$inAddressPostal=null,$inPassword=null)
	{
	
	if (!empty($inId)) $this->id = $inId
	if (!empty($inTitle)) $this->title = $inTitle;
	if (!empty($inFName)) $this->firstName = $inFName;
	if (!empty($inLName)) $this->lastName = $inLName;
	if (!empty($inEmail)) $this->email = $inEmail;
	if (!empty($inPNumber)) $this->phoneNumber = $inPNumber;
	if (!empty($inAddress1)) $this->addressLine1 = $inAddress1;
	if (!empty($inAddress2)) $this->addressLine2 = $inAddress2;
	if (!empty($inAddressCity)) $this->addressCity = $inAddressCity;
	if (!empty($inAddressPostal)) $this->addressPostal = $inAddressPostal;
	if (!empty($inPassword)) $this->password = $inPassword;
	
	} //END CONSTRUCT


} //END CLASS