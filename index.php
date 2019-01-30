<html>
        <head>
            <script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        </head>
        <body>
<form method="post" action="uploads.php" enctype="multipart/form-data">
    <h2 style = "color:#0000ff;">Upload Files and Store Data :</h2>
    <input type="file" name="Filename"> 
    <br/>
    <br/>
    <input TYPE="submit" name="upload" value="Submit"/>
</form>
<form>
 <strong>Click on button to view users</strong></p>

</div>
</form>
<button id="RUN">GET UPLOADED FILE DETAILS</button>
                <h3>Output: </h3>
                <div id="output"></div>

            <script type="text/javascript">
                $(document).ready(function(){
   		    $("#RUN").click(function() {
		        $.ajax({
				url: 'json.php',
				data: 'data',
				dataType: 'json',
            		                success: function(data){
					MyReturns = data;
  					alert('success');
  					$.each(MyReturns, function(i, order){
						$('#output').append("<p>"+order.filename+" - "+order.extension+" - "+order.size+" bytes</p>");
					});
		      	        },
		      	        error: function(data){
		    		    alert(data);
		    	         }
		         })
		     });

                  }); 

            </script>
</body>
