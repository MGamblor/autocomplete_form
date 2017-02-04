<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Animal Record Keeping System">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="Matthew Johnson">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <title>Animal Record Keeping System</title>
    
    
  <link rel="stylesheet" href="assets/css/style.css" type="text/css" /> <!-- CSS STYLESHEET-->  
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css"> <!--JQUERY UI STYLESHEET-->
  <script src="https://code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script> <!--JQUERY LIBRARY-->
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script> <!--JQUERY UI LIBRARY-->
    
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> <!--TIME PICKER CSS-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>  <!--TIME PICKER JQUERY FILE-->     

  <script type="text/javascript">      
        

/*
############################################################################
#                      JQueryUI Autocomplete Function                      #
############################################################################
*/          
      
       $(function() {
            $( "#animal" ).autocomplete({
               source: 'search.php',                //name of the PHP Source
               minLength: 3,                        // Autocomplete Active after 3 characters
             
			   select:function(event, ui){          //  select the animal field and display the associated fields
										
										$(this).val(ui.item.label);
                                        $('#family').val(ui.item.value);
                                        $('#code').val(ui.item.id);
										return false;
										},
                
			  change: function(event, ui) {        // Must match Data in the database
                                         if (!ui.item) {
                                         $(this).val("");
                                         }
                                    }
			  
            });
         });
      
                  
        //Prevent future date being selcted
                  
        $(function() {
            $( "#arrivalDate" ).datepicker({ dateFormat: 'dd-mm-yy', maxDate: new Date });
         });
      
        $(function(){
           $('#timepicker').timepicker({
               interval: 15
           }).attr('readonly','readonly')
        });
      
      
  </script>    
    
</head>

<!--
############################################################################
#                              HTML BELOW                                  #
############################################################################
-->     
    
<body>
  
  <h2 id="heading">Incident Record</h2>
  
  <div id="mandatory">
  <p>Mandatory fields marked with <span class="required">*</span></p> 
  </div>
    
  <div id='box'>
    
    <form id="inccidentRecord" action="handler.php" method="post">
    
  
      <label>Your ID Number <span class="required">*</span></label>
        <input type="text" name="EmployeeID" required="" placeholder="Your ID Number" maxlength="5" />
          
      <br />
        
      <label>Animal Name <span class="required">*</span> </label>
        <input id='animal' type="text" name="AnimalName" required="" placeholder="Enter the type of animal as a best guess" maxlength="100" />

        
      <br />
        
      <label>NPWS Code</label>
        <input id="code" type="text" name="NPWS" placeholder="NPWS Code" maxlength="5"/>
      
        
      <br />
      
      <label>Family <span class="required">*</span></label>
        <input id="family" type="text" name="Family" required="" placeholder="Family"/>
      
      
      <br />
      
      <label>Arrival Date:</label>
        <input  type="text" id="arrivalDate" name="ArrivalDate" placeholder="dd-mm-yyyy" />
      
      
      <br />
      
      <label>Arrival Time</label>
        <input type="text" id="timepicker" class="arrival"  name="ArrivalTime" />
      
      
      <br />
      
      <label>Address Found At</label>
        <input type="text" name="Address" placeholder="Street, Suburb" maxlength="200"/>
     
      <br />
      
      <label>Reason for Animal coming in <span class="required">*</span></label>
        <textarea name="Reason" required="" placeholder="Type reason here..." maxlength="200"></textarea>
 
 
      <br />
        
      <div id="buttonHolder">
        <input type='submit' name='submit' value='Add Record' />
      </div>
        
    </form>
  </div>
</body>

</html>