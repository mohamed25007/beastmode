//DATATABLE SCROLL -->
$(document).ready(function() {
    $("#tabs").tabs( {
        "activate": function(event, ui) {
            $( $.fn.dataTable.tables( true ) ).DataTable().columns.adjust();
        }
    } );
     
	 	////PRODUCT DB TABLE
     var table = $("#DBTable").dataTable( {
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": false,
        "jQueryUI": true,
		"bAutoWidth": false
    });
	
	
	$('#DBTable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
			table.$('.selectedTD').removeClass('selectedTD');
			$('#selectedResult').html("");
        }
        else {
            table.$('tr.selected').removeClass('selected');
			table.$('.selectedTD').removeClass('selectedTD');
            $(this).addClass('selected');
			$('tr.selected>td').addClass('selectedTD');
			
			
			var elements = document.getElementsByClassName("selectedTD");
			var str = "";
			for (var i = 0; i < elements.length; i++) {
			var str = str + "<td>" + elements[i].innerHTML + "</td>";
							}

			$('#selectedResult').html(str);
        }
    } );
	
	//// CUSTOMER DB TABLE
	
	 var tableCustomer = $("#DBTableCustomer").dataTable( {
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": false,
        "jQueryUI": true
    });
	
		$('#DBTableCustomer tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selectedCustomer') ) {
            $(this).removeClass('selectedCustomer');
			tableCustomer.$('.selectedTDCustomer').removeClass('selectedTDCustomer');
			$('#selectedResultCustomer').html("");
        }
        else {
            tableCustomer.$('tr.selectedCustomer').removeClass('selectedCustomer');
			tableCustomer.$('.selectedTDCustomer').removeClass('selectedTDCustomer');
            $(this).addClass('selectedCustomer');
			$('tr.selectedCustomer>td').addClass('selectedTDCustomer');
			var elements = document.getElementsByClassName("selectedTDCustomer");
			var str = "";
			for (var i = 0; i < elements.length; i++) {
			var str = str + "<td>" + elements[i].innerHTML + "</td>";
							}

			$('#selectedResultCustomer').html(str);
        }
    } );
	
	//// ORDERS DB TABLE
	
		 var tableOrders = $("#DBTableOrders").dataTable( {
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": false,
        "jQueryUI": true
    });
	
		$('#DBTableOrders tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selectedOrders') ) {
            $(this).removeClass('selectedOrders');
			tableOrders.$('.selectedTDOrders').removeClass('selectedTDOrders');
			$('#selectedResultOrders').html("");
        }
        else {
            tableOrders.$('tr.selectedOrders').removeClass('selectedOrders');
			tableOrders.$('.selectedTDOrders').removeClass('selectedTDOrders');
            $(this).addClass('selectedOrders');
			$('tr.selectedOrders>td').addClass('selectedTDOrders');
			var elements = document.getElementsByClassName("selectedTDOrders");
			var str = "";
			for (var i = 0; i < elements.length; i++) {
			var str = str + '<td class="selectedTDOrd">' + elements[i].innerHTML + "</td>";
							}

			$('#selectedResultOrders').html(str);
        }
    } );
	
	//// TABLE BUTTONS

 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
	
	 
    $('#button').click( function () {
        tableCustomer.row('.selectedCustomer').remove().draw( false );
    } );
	
	   $('#button').click( function () {
        tableOrders.row('.selectedOrders').remove().draw( false );
    } );
	
	//// HEADER RESIZE
	$(window).on('resize', function () {
		table.fnAdjustColumnSizing();
		tableCustomer.fnAdjustColumnSizing();
		tableOrders.fnAdjustColumnSizing();
		} );
	
        
        
	
} );
  
  
  
  ////////////////////////////////////////////// DIALOG FUNCTIONS! ////////////
  ////////////////////PRODUCT DIALOGS//////////////
  //  CLOSE DIALOG FUNCTION
  $(document).ready(function(){
    $('#cancel').click(function(){
        $(this).closest('.ui-dialog-content').dialog('close'); 
    });

});


// NEW PRODUCT DIALOG
  function showDialog()
{
    $("#dialog-modal").dialog(
    {
        width: 900,
        height: 600,
        open: function(event, ui)
        {
            var textarea = $('<textarea style="height: 300px;">');
            $(textarea).redactor({
                focus: true,
                autoresize: false,
                initCallback: function()
                {
                    this.set('<p>Lorem...</p>');
                }
            });
        }
     });
}

// DELETE PRODUCT DIALOG
  function showConfirmationDialog()
{
if (document.getElementsByClassName("selectedTD").length > 2)
{
    $("#dialog-modal-confirm").dialog(
    {
        width: 900,
        height: 250,
        open: function(event, ui)
        {			
			var elements = document.getElementsByClassName("selectedTD");
			var str = elements[1].firstChild.data;
			var productID = elements[0].firstChild.data;
			$("#productID").val(productID);
			$('#deleteConfirmationP').html(str);	
            
        }
     });
	 } else {
	 alert('You have not selected a product! Click a product on the table first!');
	 }
}

// EDIT PRODUCT DIALOG 

 
  function showEditDialog()
{

if (document.getElementsByClassName("selectedTD").length > 2)
{
    $("#dialog-modal-edit").dialog(
    {
        width: 900,
        height: 600,
        open: function(event, ui)
        {
			var elements = document.getElementsByClassName("selectedTD");
			//alert(elements[0].firstChild.data);
			var pid =id= elements[0].firstChild.data;
			var productName = elements[1].firstChild.data;
			var name = productName.trim();
			
			var ProductDescription = elements[3].firstChild.data;
			var description = ProductDescription.trim();
			
			
			
			var price = elements[5].firstChild.data;
				var Updprice = price.trim();
				var resPrice = Updprice.slice(1);
				
			var ProductSpecification = elements[6].firstChild.data;
			var specification = ProductSpecification.trim();
			var delivery = elements[7].firstChild.data;
					var Upddelivery = delivery.trim();
					var resdelivery = Upddelivery.slice(1);
			      
		   $("#pid").val(pid);
		   $("#edit-productID").val(pid);
		   $("#edit-productName").val(name);
		 //  var manufacture=elements[2].firstChild.data;
		  // $("#edit-productName").html(manufacture);
		   
		   $("#edit-productDesc").val(description);
           $("#edit-productPrice").val(resPrice);
		   $("#edit-productSpec").val(specification);
		   $("#edit-productDelivery").val(resdelivery);
		  
		   
					
        }
     });
	 } else {
	 alert('You have not selected a product! Click a product on the table first!');
	 }
}

// ADD REMOVE IMAGES DIALOG

  function showImageDialog()
{

if (document.getElementsByClassName("selectedTD").length > 2)
{
	
    $("#dialog-modal-image").dialog(
    {
        width: 900,
        height: 300,
        open: function(event, ui)
        {
		var elements = document.getElementsByClassName("selectedTD");
			
		  var id = elements[0].firstChild.data;
		  var ProdName = elements[1].firstChild.data;
		  //alert(id);
		 $("#ProdID").val(id);
			
        	$('#ProductName').html(ProdName);	
			
			
			
		}
     });

	} else {
	 alert('You have not selected a product! Click a product on the table first!');
	 }
	
}

// Add New Category
  function showDialogCat()
{
    $("#dialog-modal-cat").dialog(
    {
        width: 900,
        height: 600,
        open: function(event, ui)
        {
            var textarea = $('<textarea style="height: 300px;">');
            $(textarea).redactor({
                focus: true,
                autoresize: false,
                initCallback: function()
                {
                    this.set('<p>Lorem...</p>');
                }
            });
        }
     });
}


// Add Manufacture
  function showDialogMaunfacture()
{
    $("#dialog-modal-manu").dialog(
    {
        width: 900,
        height: 600,
        open: function(event, ui)
        {
            var textarea = $('<textarea style="height: 300px;">');
            $(textarea).redactor({
                focus: true,
                autoresize: false,
                initCallback: function()
                {
                    this.set('<p>Lorem...</p>');
                }
            });
        }
     });
}


////////////////////////////// CUSTOMER DIALOGS ///////////////////////////////////

////EDIT CUSTOMER DIALOG
  function showEditDialogCustomer()
{
if (document.getElementsByClassName("selectedTDCustomer").length > 2)
{
    $("#dialog-modal-edit-customer").dialog(
    {
        width: 900,
        height: 500, 
        open: function(event, ui)
        {		
			var elements = document.getElementsByClassName("selectedTDCustomer");
					$("#edit-customerTitle").val(elements[1].firstChild.data);
           			$("#edit-customerFName").val(elements[2].firstChild.data);
					$("#edit-customerLName").val(elements[3].firstChild.data);
					$("#edit-customerEmail").val(elements[4].firstChild.data);
					$("#edit-customerNumber").val(elements[5].firstChild.data);
					var address = elements[6].firstChild.data;
					var addressArray = address.split("|");
					$("#edit-customerAddressL1").val(addressArray[0]);
					$("#edit-customerAddressL2").val(addressArray[1]);
					$("#edit-customerAddressCity").val(addressArray[2]);
					$("#edit-customerAddressPostal").val(addressArray[3]);
					$("#edit-customerID").val(elements[0].firstChild.data);
        }
     });
	 } else {
	 alert('You have not selected a customer! Click a customer on the table first!');
	 }
}


// DELETE CUSTOMER DIALOG
  function showConfirmationDialogCustomer()
{
if (document.getElementsByClassName("selectedTDCustomer").length > 2)
{
    $("#dialog-modal-confirm-customer").dialog(
    {
        width: 900,
        height: 250,
        open: function(event, ui)
        {			
			var elements = document.getElementsByClassName("selectedTDCustomer");
			var str = elements[2].firstChild.data+" "+elements[3].firstChild.data;
			var customerID = elements[0].firstChild.data;
			$("#customerID").val(customerID);
			$('#deleteConfirmationCustomer').html(str);	
            
        }
     });
	 } else {
	 alert('You have not selected a Customer! Click a Customer on the table first!');
	 }
}

//// EMAIL CUSTOMER DIALOG

  function showEmailDialog()
{
if (document.getElementsByClassName("selectedTDCustomer").length > 2)
{
    $("#dialog-modal-email-customer").dialog(
    {
        width: 900,
        height: 500,
        open: function(event, ui)
        {			
			var elements = document.getElementsByClassName("selectedTDCustomer");
			var customerEmail = elements[4].firstChild.data;
			var customerName = elements[2].firstChild.data+" "+elements[3].firstChild.data;
			$("#email-customerID").text(customerEmail);
           $("#email-label-customerName").text(customerName);
        }
     });
	 } else {
	 alert('You have not selected a Customer! Click a Customer on the table first!');
	 }
}

///////////////////////////// ORDERS DIALOGS //////////////////////////////////////////////

 function showViewCustomerDialog()
{
if (document.getElementsByClassName("selectedTDOrders").length > 2)
{
    $("#dialog-modal-view-customer").dialog(
    {
        width: 900,
        height: 500,
        open: function(event, ui)
        {			
			var elements = document.getElementsByClassName("selectedTDOrders");
			
			var customerID = parseInt(elements[3].firstChild.data);
			var rowID = "customerRow"+customerID;
			var customer = document.getElementsByClassName(rowID);					
			$("#view-label-customerEmail").text(customer[4].firstChild.data);
            $("#view-label-customerName").text(customer[2].firstChild.data+" "+customer[3].firstChild.data);
		    $("#view-label-customerNumber").text(customer[5].firstChild.data);
			$("#view-label-customerAddress").text(customer[6].firstChild.data);
        }
     });
	 } else {
	 alert('You have not selected an Order! Click an Order on the table first!');
	 }
}


 function showViewOrderDialog()
{
if (document.getElementsByClassName("selectedTDOrders").length > 2)
{
    $("#dialog-modal-view-order").dialog(
    {
        width: 1000,
        height: 700,
        open: function(event, ui)
        {			
			var elements = document.getElementsByClassName("selectedTDOrders");
			var productIDs = elements[1].firstChild.data.split("|");
			var quantities = elements[2].firstChild.data.split("|");
			var str = "";
			var i = 0;
			var customerID = parseInt(elements[3].firstChild.data);
			var rowID = "customerRow"+customerID;
			var customer = document.getElementsByClassName(rowID);	
			
			for (i = 0; i < productIDs.length; i++){
			
			var rowID = "productRow"+parseInt(productIDs[i]);
			var product = document.getElementsByClassName(rowID);
			var productName = product[1].firstChild.data;
			var productPrice = product[2].firstChild.data;
			str += "Name: "+productName+"| Quantity: "+quantities[i]+"| Price:"+"£"+productPrice+"\n \n";
			
			}			
				
			$("#view-label-orderPayment").text(elements[7].firstChild.data);
			$("#view-label-orderProducts").text(str);
			$("#view-label-order-customerName").text(customer[2].firstChild.data+" "+customer[3].firstChild.data+"\n");
			$("#view-label-dateTime").text(elements[4].firstChild.data+" at "+elements[5].firstChild.data);
			$("#view-label-order-customerEmail").text(customer[4].firstChild.data+"\n");
			var address = customer[6].firstChild.data.split("|");
			$("#view-label-order-customerAddress").text(address[0]+"\n"+address[1]+"\n"+address[2]+"\n"+address[3]+"\n");
        }
     });
	 
	 } else {
	 alert('You have not selected an Order! Click an Order on the table first!');
	 }
}

function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

  function showEditStatusDialog()
{
if (document.getElementsByClassName("selectedTDOrders").length > 2)
{
    $("#dialog-modal-edit-status").dialog(
    {
        width: 400,
        height: 200, 
        open: function(event, ui)
        {		
			var elements = document.getElementsByClassName("selectedTDOrders");
			var statusID = elements[0].firstChild.data.replace ( /[^\d.]/g, '' );
			var selectBox = document.getElementById('selectStatus');
			selectBox.value = statusID;
			$("#edit-order").val(elements[0].firstChild.data);

        }
     });
	 } else {
	 alert('You have not selected an Order! Click an Order on the table first!');
	 }
}



/////////////////////// LOGIN /////////////////

 function showLoginDialog()
{
    $("#dialog-modal-login").dialog(
    {
        width: 600,
        height: 200,
        open: function(event, ui)
        {	
		
        }
     });
	 
}





































