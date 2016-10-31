	  function validate_form() {
 		  valid = true;
		  var form = document.forms.form_sort;
		  var elem1 = form.elements.inlineRadioOptions;
		  var elem2 = form.elements.input_date;
		  
		  if (!elem1.value && elem2.value) {
			  $("#error-radio").html('Ви не выбрали');
			
			  valid = false;
		  }
		   if (!elem2.value && elem1.value) {
			  $("#error-input").html('Ви не выбрали');
			  $("#date-sort").addClass("error_input");
			  valid = false;
		  }
		  return valid;
	  }
			  

	  //валидация формы отправки отзывов
	function valid_all() {
		validate_create_recall();
		    var form = document.forms.create_recall;
		  var elem1 = form.elements.author;
		  var elem2 = form.elements.e_mail;
		  var elem3 = form.elements.text_name;
		  var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
		if((elem1.value.length >= 3) && (pattern.test(elem2.value))  && (elem3.value.length >= 2))
		  {
			  showValues();
			
			  valid = true;
			 
		  }
		  return valid;
	  }
	  
	 function validate_create_recall() {
 		  valid = true;
		  var form = document.forms.create_recall;
		  var elem1 = form.elements.author;
		  var elem2 = form.elements.e_mail;
		  var elem3 = form.elements.text_name;
		  //author
		  if (!elem1.value) {
			  $('#author').text('Поле не должно быть пустым').css("color","red");
			  $("#input_author").addClass("error_input");
			  valid = false;
		  }
		   else if(elem1.value.length < 3)
		   {
			  
			  $("#author").text("Неправельное имя").css("color","red");
			  $("#input_author").addClass("error_input");
			  valid = false; 
		   }
		   else {
			   $("#input_author").removeClass("error_input");
				  $("#author").empty();		   
		   }
		   //e_mail
		    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
	        
		   if (!elem2.value) {
			  $('#mail').text('Поле не должно быть пустым').css("color","red");
			  $("#e_mail").addClass("error_input");
			  valid = false;
		  }
		   else if(!pattern.test(elem2.value)){
			  $("#mail").text("Неправельное введеный e-mail").css("color","red");
			  $("#e_mail").addClass("error_input");
			  valid = false; 
		   }
		   else {
			   $("#e_mail").removeClass("error_input");
				  $("#mail").empty();		   
		   }
		   
		   //textarea
		  if (!elem3.value) {
			  $('#text_name').text('Поле не должно быть пустым').css("color","red");
			  $("#textarea").addClass("error_input");
			  valid = false;
		  }
		   else if(elem3.value.length < 2)
		   {
			  
			  $("#text_name").text("Неправельнно введеный текст").css("color","red");
			  $("#textarea").addClass("error_input");
			  valid = false; 
		   }
		   else {
			   $("#textarea").removeClass("error_input");
				  $("#text_name").empty();		   
		   }
		   return valid;
		 }
	 
    function showValues() {
	var fields = $("#input_author, #textarea").serializeArray();
	var today = new Date();
	var date = today.getDate();
	var month = today.getMonth() + 1;
	var year = today.getFullYear();
	  $("#media-body").empty();
       jQuery.each(fields, function(i, field){
         $("#media-body").append(field.value + "</br>");
		   });
			  $("#media-body").append(year + "-" + month + "-" + date + "</br>" );
			    $("#media").addClass("media");
			      $("#media-left").addClass("media-left");
			        $("#media-left").append("<img class='media-object' src='../../views/img/no_foto2.png'>");
			          $("#media-body").addClass("media-body");
			            $("#new-div").addClass("panel panel-default");
	                     $("#panel-heading").addClass("panel-heading");
	           
    }