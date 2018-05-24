$(document).ready(function(){
	$('.error').hide();
	$('.button').click(function(){
		
		var check=true;
		$('.error').hide();

		var UID=$("input#uid").val();
		
		if(UID==""){
			$("#uid_empty").show();
			check=false;
		}

		var fn=$("input#fname").val();
		
		if(fn==""){
			$("#fname_empty").show();
			check=false;
		}

		var Ln=$("input#lname").val();
		
		if(Ln==""){
			$("#lname_empty").show();
			check=false;
		}

		var pass = $("input#password").val();
		
		if(pass==""){
			$("#pass_empty").show();
			$("input#password").focus();
			check=false;
		}
	
		var letter=false, number=false;	

		if(pass.length >=8){
		for(var i=0;i<pass.length;i++){
			if((pass[i]>='a'&&pass[i]<='z')||(pass[i]>='A'&&pass[i]<='Z')) letter=true;
			if(pass[i]>='1'&&pass[i]<='9') number = true;
		}
		}

		if(letter==false || number==false || sc==false){
			if(pass.length>0){
				$('#pass_invalid').show();
				check=false;
			}
		}



		if(check==false)	return check;

		if(check==true){

			return check;
		}
		
	});
	
});
