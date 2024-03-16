<?php 
  
  // Store the file name into variable 
  $file = 'Assets/forms/admission_cancel_form.pdf'; 
  $filename = 'Admission_Cancel_Form.pdf'; 
    
  // Header content type 
  header('Content-type: application/pdf'); 
    
  header('Content-Disposition: inline; filename="' . $filename . '"'); 
    
  header('Content-Transfer-Encoding: binary'); 
    
  header('Accept-Ranges: bytes'); 
    
  // Read the file 
  @readfile($file); 
      
  ?>