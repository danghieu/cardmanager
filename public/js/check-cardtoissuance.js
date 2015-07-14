$("#issuance-card-form").validate({
	rules:{
		cardnumber:{
			required:true,
			minlength:8,
			maxlength:8,
			
		}
	},
	messages: {
		cardnumber:{
			remote:"Thẻ không hợp lệ!"
		}
	}
});