<form id="form1" runat='server'>		
	<input type="button" value="Print this div" onclick= 		"javascript:printDiv('sample')" />    
</form>
	
<div class='sample' id='sample'>
	Whatever you need to save as PDF goes here. 
</div>
 
<!--Javascript function to save data inside 'sample' div -->
 
    <script language="javascript" type="text/javascript">
        function printDiv(divID) 
		{
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
 
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";
 
            window.print();
 
            document.body.innerHTML = oldPage;
        }
    </script>