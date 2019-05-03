$(function(){
                    $("#productform").validate({

                    	rules: {
                             showroomid: "required",
                             product : "required",
                             count   : {
                             	required: true,
                             	number  : true

                             }
                             image   : {
                             	required : true,
                             	extension:
                             }
                    		
                    	},

                    	messages : {
                    		showroom : "Please select a showroom",
                    		product  : "Please enter the product name",
                    		count    : {
                    		   required : "Please enter the count of products",
                    		   number   : "Please enter an interger"	
                    		}
                    		image: {
                    			required: "Please upload product image",
                    			extension: "Please select a jpeg file"
                    		}
                    	}
                    });

            		});