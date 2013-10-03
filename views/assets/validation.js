
var $ = function(id){return document.getElementById(id);}

var SubmitForm= function(){
	this.fields= new Array();
	this.fields["pageMenu"]={};
	this.fields["subjectMenu"]={};
	this.fields["pageContent"]={};

	//Error messages
	this.fields["pageMenu"].rightLength = "Must be between 4 and 12 characters";
	this.fields["pageMenu"].invalidChars = "Numbers and special characters are not allowed";
	this.fields["subjectMenu"].invalidChars = "Numbers and special characters are not allowed";
	this.fields["subjectMenu"].rightLength = "Must be between 4 and 12 characters";
	this.fields["pageContent"].noEmpty = "Content cannot be blank";

}

SubmitForm.prototype.rightLength=function(text){
	if(text.length>12 || text.length<4){
		return true;
	}else{
		return false;
	}
}
SubmitForm.prototype.noEmpty=function(text){
	if(text.length==0 || text==null){
		return true;
	}else{
		return false;
	}
}

SubmitForm.prototype.invalidChars=function(text){
	var regex = /[0-9]/;
	if(regex.test(text)){
		return true;
	}else{
		return false;
	}
}

SubmitForm.prototype.validateField=function(fieldname, text){
	var field = this.fields[fieldname];
	if(field.rightLength){
		if( this.rightLength(text) ){
			throw new Error(field.rightLength);
		
		}
	}

	if(field.invalidChars){
		if( this.invalidChars(text) ){
			throw new Error(field.invalidChars);
		}
	}
	if(field.noEmpty){
		if( this.noEmpty(text) ){
			throw new Error(field.noEmpty);
		}
	}
}
SubmitForm.prototype.clearError=function(fieldname){
	$(fieldname+"_error").innerHTML="";
}
SubmitForm.prototype.validateForm=function(){
	var hasErrors = false;
	for (var fieldName in this.fields){
		if($(fieldName)){
			this.clearError(fieldName);
			try{
				this.validateField(fieldName, $(fieldName).value);
			}catch(error){
				hasErrors = true;
				$(fieldName+"_error").innerHTML=error.message;
			}
		}
	}
	return hasErrors;
}

SubmitForm.prototype.displayError=function(){
	return this.errors;
}
var submitForm;


var sendForSubmit=function(){
	
	$("editBtn").blur();
	if(submitForm.validateForm()){
		var dis = submitForm.displayError();
		alert("Please correct the errors on the page.");
	}else{
		$("form1").submit();
	}

}


window.onload=function(){
	submitForm = new SubmitForm();

	$("editBtn").onclick=sendForSubmit;

}
