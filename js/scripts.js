//generating xhr requests 
function xhr(url,cFunction) { var xmlHttp = new
XMLHttpRequest(); xmlHttp.open("GET",url,true);
	 
	 xmlHttp.onreadystatechange=function(){ 
	 	if (this.readyState == 4 && this.status == 200) { 
	 		cFunction(this.responseText);
 } 
} 
xmlHttp.send(); 
}
//selecting elements 
function $(elem){
 return document.querySelector(elem); 
}

//looking up for empty values 
function isEmpty(str){ 
	if (str == "") { 
return true;
 }
 return false; 
}

//showing a loading process
function startLoader(elem, msg){
	let targetElem = document.querySelector(elem);
	targetElem.innerHTML='<i>'+msg+'</i>';
}
function stopLoader(elem, msg){
	let targetElem = document.querySelector(elem);
	targetElem.innerHTML=msg;
}

function startLoader(elem){
	let targetElem = document.querySelector(elem)
}
let btnAddPayable = document.querySelectorAll('#btnAddPayable'); 
let btnRemovePayable = document.querySelectorAll('#btnRemovePayable');

//capture add payable click 
for(var x=0; x<btnAddPayable.length; x++){
btnAddPayable[x].addEventListener('click',function(e){ 
var id = e.target.getAttribute('data-id'); //ajax
xhr("processCrude.php?payableId="+id+"&operation=add",function(res){

if (!res == "") { 
	$('#upcoming_payables').html(res); 
} 
}); 
}); 
} 
//captureremove upcoming payable click
 for(var x=0; x<btnRemovePayable.length; x++){
btnRemovePayable[x].addEventListener('click',function(e){ var id =
e.target.getAttribute('data-id'); //ajax
xhr("processCrude.php?payableId="+id+"&operation=remove",function(res){

$('#upcoming_payables').html(res);
 }); 
}); 
}

//reports for All students
$('#btnSearchAll').addEventListener('click',function(){
let cls = document.querySelector('#class').value;
let payment =document.querySelector('#paymentFor').value;
 let condition = document.querySelector('#condition').value;
let amount = document.querySelector('#amount').value;

//check for empty fields 
if (isEmpty(amount)) { return; }

let queryParams = new FormData();
queryParams.append('class', cls);
queryParams.append('payment', payment);
queryParams.append('condition', condition);
queryParams.append('amount', amount);

fetch('process-get-reports-all.php',{
	method: 'POST',
	body: queryParams
}).then(response=>response.json())
.then(response=>{
	//if no data was foud
	if (response.length == 0) {
		document.querySelector('#reportData').innerHTML=
		`
		<div class="alert alert-danger text-center">
		<a href='#' class='close' data-dismiss='alert'>&times;</a>
		No data matching this criteria was found. Please try again.
		</div>
		`;
		return;
	}
	//loop throught the data
	let tr = '<tbody>';
	for (let i = 0; i < response.length; i++) {
		tr +=
		`<tr>
			<td>${response[i].name}</td>
			<td>${response[i].adm}</td>
			<td>${response[i].class}</td>
			<td>${response[i].amt}</td>
		</tr>
		`;
	}
	tr +='</tbody>';
	//display the data
	document.querySelector('#reportData').innerHTML=tr;

}).catch(err=>console.log(err));
});

 //reports All students onchange  //payment change 
 function fetchByPayment(payment){
 console.log("fetching by"); 
 } //condition change
function fetchByCondition(condition){
 	
 } //repports specific student // 
 var btnSearchOne = document.getElementById('btnSearchOne'); //
btnSearchOne.addEventListener('click',function(){
 // 
 var adm = $("#admNo").value;
xhr("processCrude.php?getOne=true&adm="+adm+"&") 
// 
}); 

//get payment details of a certain student
function getReportSpecific(){ 
let adm = document.querySelector('#admNo').value; 
let pymt = document.querySelector('#paymentFor').value;
 let bal_rep = document.querySelector('#bal_report').value; 
if (isEmpty(adm)) {
 return;
 }

xhr("processCrude.php?getOne=true&adm="+adm+"&bal_rep="+bal_rep+"&pymt="+pymt,function(res){
let table = document.querySelector('#tablResults');
table.innerHTML=res; 
}); 
}

//getting overall results(reportOverall)
function getOverall(){
	let pymt = document.querySelector('#paymentFor').value;
	let bal_rep = document.querySelector('#bal_report').value;
	if (bal_rep == 'Report') {
		//get payment report
		xhr("processCrude.php?getOverall=true&pymt="+pymt+"&bal_rep="+bal_rep,function(response){
			//fill the table
			document.querySelector('#tableResult').innerHTML=response;
		});
		//get payment summary of the payment
		xhr("processCrude.php?getSummary=true&pymt="+pymt, function(res){
			document.querySelector('#paymentSummary').innerHTML=res;
		});
	}
	//get balance

}

//adding gallery categories
function addGalleryCategory(){
	let category = document.querySelector('#cc-categoryName').value;
//check if empty 
if(isEmpty(category)){
	return;
}
//ajax
xhr("processCrude.php?add_gallery_category=true&category="+category,function(res){
	document.querySelector('#cc-categoryName').value = '';
	document.querySelector('#availCategories').innerHTML=res;
});
}

//adding department categories
function addDepartmentCategory(){
	var categoryName = document.querySelector('#cc-deptCategoryName').value;
	if(isEmpty(categoryName)){
		return;
	}

	//ajax
	xhr("processCrude.php?addDeptCategory=true&deptName="+categoryName,function(res){
	document.querySelector('#cc-deptCategoryName').value='';
	document.querySelector('#availCategories').innerHTML=res;
	});
}

//preview of receipts-reports overall
function openReceiptPreview(receiptHolder){
let receiptSrc = receiptHolder.getAttribute('receipt-img');
let receipt_for = receiptHolder.getAttribute('data-for');
let receiptHeader = document.querySelector('div#modal_receipt_preview div.modal-header');
let receiptImage = document.querySelector('#receipt_image');
receiptImage.setAttribute('src', receiptSrc);
receiptHeader.innerHTML='Receipt for: '+receipt_for;
$('#modal_receipt_preview').modal('show');

}

//preview receipts - specific student
function viewReceipt(receiptHolder){
	let receiptSrc = receiptHolder.getAttribute('data-img-src');
	let receipt_for = receiptHolder.getAttribute('data-for');
	//title
	document.querySelector('#modal-student-receipt-preview div.modal-header').innerHTML="Payment receipt for: "+receipt_for;
	//receipt image
	document.querySelector('#payment-receipt-image').setAttribute('src', receiptSrc);
	//show modal
	$('#modal-student-receipt-preview').modal('show');
	
}