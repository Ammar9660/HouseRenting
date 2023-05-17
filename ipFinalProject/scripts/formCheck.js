function formValidation(){
	var amount = document.getElementById('amount');

	if((checkAmount(amount)) {
		return true;
	}
	else{
		return false;
	}
}
		
function checkAmount(number){
	var phoneExp = '^[0-9]+$';
	if(number.value.match(phoneExp)){
		document.getElementById('p8').innerText="aaaaaaaaaaaaaaaa";
		return true;
	}
	else{
		document.getElementById('p8').innerText="* Please enter a valid amount";
		text.focus();
		return false;
	}
}