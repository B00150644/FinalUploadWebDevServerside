// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("#registration").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        name: {
            required: true,
          minlength: 5,
              },
        address: "required",
          
          
        number:{
            required: true,
            minlength: 9,
            number:true,
            
            
        },
          
        email: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          email: true
        },
          
        checkbox:{
            required: true,
            
        },
          
        
          
        
      },
      // Specify validation error messages
      messages: {
        name:{
            required:"Enter your name please",
            minlength: "Minimum length is 5 characters",
        },
          
        address: "Enter your address please",
        number: "Please enter your mobile number",
          
        email: {
            required:"Please enter your email address",
            
        },
            
          
        checkbox:{
            required: "Please indicate that you have read the terms and conditions"
            
        }, 
          
        
          
        
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
      form.submit();
    }
    });
  });