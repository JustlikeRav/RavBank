$(document).ready(function(){
	$('.error').hide();
	$('.button').click(function(){
		
		var check=true;
		$('.error').hide();
		var AccTypePayee=$('input[name="AccountTypePayee"]:checked').val();
		
		if(AccTypePayee==undefined){
			$("#AccountTypePayee_empty").show();
			check=false;
		}

		var AccTypeReciever=$('input[name="AccountTypeReciever"]:checked').val();
		
		if(AccTypeReciever==undefined){
			$("#AccountTypeReciever_empty").show();
			check=false;
		}

		var uid = $("input#recieverID").val();
		
		if(uid==""){
			$("#uid_empty").show();
			check=false;
		}

		var am = $("input#Amount").val();
		
		if(am==""){
			$("#Amount_empty").show();
			check=false;
		}
		
	
		if(check==false)	return check;

		if(check==true)		return check;
		
	});
	
});
