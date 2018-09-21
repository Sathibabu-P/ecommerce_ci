$(document).ready(function(){
  $('.addcart').click(function(){
    var id = $(this).data("id");
    if(id)
    {
       $.ajax({
          url:"http://localhost/jlr/index.php/cart/add",
          method:"POST",
          data:{id:id},
          success:function(data)
          { 
           if(data > 0) 
           $('.cartcount').html(data);
          }
       });
    }
  });
});
$( "#checkout_form" ).validate( {
        rules: {
          firstname: "required",
          lastname: "required",  
          city: "required",
          state: "required",  
          zipcode: "required",
          phoneno: "required",         
          address: {
            required: true,
            minlength: 5
          },          
          email: {
            required: true,
            email: true
          }
        },
        messages: {
          firstname: "Please enter your firstname",
          lastname: "Please enter your lastname",         
          email: "Please enter a valid email address",
          city: "Please select city",
          state: "Please select state",
          address: "Please enter valid address",
          zipcode: "Please enter valid zipcode",
          phoneno: "Please enter valid phone number"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );        
          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
          // Add the span element, if doesn't exists, and apply the icon classes to it.
          
        }
      } );
