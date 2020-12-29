//custom selector
function _(elem){
    return document.querySelector(elem);
}
const addImageToPreview = (file, targetImage) =>{
const reader = new FileReader();
reader.addEventListener('load',(e)=>{
targetImage.setAttribute('src', reader.result);
});
reader.readAsDataURL(file);
}
//images preview
_('#receipt').addEventListener('change',()=>{
let receipt = document.querySelector('#receipt').files[0];
let targetImage = _('#receipt_img');
targetImage.style.display='block';
addImageToPreview(receipt, targetImage);
});

_('#btn_next').addEventListener('click', ()=>{
let form = document.getElementById('form_fees_payment');
let feesDetails = new FormData(form);
feesDetails.append('action','verify_stud_details');
let inputs = document.querySelectorAll('form#form_fees_payment div.form-group input, select');
for(let i=0; i<inputs.length; i++){
    let input = inputs[i];
    let errorMessageHolder = input.nextElementSibling;
    if(input.value == ''){
        let errorMsg = input.getAttribute('data-msg');
        errorMessageHolder.innerText = errorMsg;
        errorMessageHolder.style.display='block';
    }else{
        errorMessageHolder.style.display='none';
    }
}

for(let i=0; i<inputs.length; i++){
    let input = inputs[i];
    if(input.value == ''){
        return;
    }
}

fetch('feesPayment.php',{
    method: "POST",
    body: feesDetails
}).then(response=> response.json())
.then(response=>{
switch(response.status){
    case 0 :
    //invalid admission number
    inputs[0].nextElementSibling.innerText=response.msg;
    inputs[0].nextElementSibling.style.display='block';
    break;
    case 1 :
        _('#section1').classList.remove('d-block');
        _('#section1').classList.add('d-none');
        
        _('#section2 p').innerHTML=
        `
        <p>
		    Please confirm payment of<b> ${response.payment}</b> amount <b>${response.amount}</b> for <b>${response.name}</b>. 
		</p>
        `;
        _('#section2').classList.remove('d-none');
        _('#section2').classList.add('d-block');
    break;
}
}).catch(err=> console.log("An error ocurred :"+ err));
});

const goToSection1 = ()=>{
_('#section2').classList.remove('d-block');
_('#section2').classList.add('d-none');

_('#section1').classList.remove('d-none');
_('#section1').classList.add('d-block');  
}
//submitting a payment
function submitPayment(){
    let feesDetails = new FormData(document.getElementById('form_fees_payment'));
    feesDetails.append('action','submit_payment');
    fetch('feesPayment.php',{
        method: "POST",
        body: feesDetails
    }).then(response=> response.json())
    .then(response=>{
_('#section3 p').innerHTML=
    `<p class="alert-success">
    Payment of <b>${response.payment}</b> for <b>${response.name}</b> amount <b>${response.amount}</b> was successfully submitted. Expected fee balance: <b>${response.balance}</b>. <br>
    Kindly note that this may change upon verification. <br>
    Thank you - Josnem Schools. 
    </p>
`;
        _('#section2').classList.remove('d-block');
        _('#section2').classList.add('d-none');

        _('#section3').classList.remove('d-none');
        _('#section3').classList.add('d-block');

    }).catch(err=> console.log(err));
}

//finish submission
function finishPayment(){
   //reset forms
    _('#section3').classList.remove('d-block');
    _('#section3').classList.add('d-none');

    _('#section1').classList.remove('d-none');
    _('#section1').classList.add('d-block');

    _('#form_fees_payment').reset();
    _('div.receipt_preview img').style.display='none';
}

//cancel payment
function cancelPayment(){
    setTimeout(()=>{
    //hide payment modal
    _('#btn_close_modal_payment').click();
    }, 150);

}