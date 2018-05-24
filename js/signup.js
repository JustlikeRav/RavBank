$(document).ready(function(){
	$('.error').hide();
	$('.button').click(function(){
		
		var check=true;
		$('.error').hide();
		var fn=$("input#fname").val();
		
		if(fn==""){
			$("#firstname_empty").show();
			check=false;
		}
		
		for(var i=0;i<fn.length;i++){
			if(fn[i]>='0'&&fn[i]<='9'){
				$("#firstname_invalid").show();
				check=false;
			}
		}

		var ln=$("input#lname").val();

		if(ln==""){
			$("#lastname_empty").show();
			check=false;
		}		

		for(var i=0;i<ln.length;i++){
			if(ln[i]>='0'&&ln[i]<='9'){
				$("#lastname_invalid").show();
				check=false;
			}
		}

		var pass = $("input#password").val();
		var letter=false, number=false;		
		if(pass.length <8){
			$("#pass_empty").show();
			check=false;
		}
		
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

		var cpass = $("input#cpassword").val();
		if(cpass==""){
			$("#cpass_match").show();	
			check = false;		
		}
		else if(!(cpass===pass)){
			$("#cpass_match").show();	
			check = false;		
		}
	
		if(check==false)	return check;

		if(check==true){

			return check;
		}
		
	});
	
});
