
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>How to Autocomplete textbox in CodeIgniter 3 with jQuery UI</title>

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  </head>
  <body>

    Search code : <input type="text" id="autouser">

    <br><br>
    Selected user id : <input type="text" id="userid" value='0' >

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type='text/javascript'>
    $(document).ready(function(){
     // Initialize 
     $( "#autouser" ).autocomplete({
        source: function( request, response ) {
          minimumInputLength: 4,
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>Coba/userList",
            type: 'post',
            dataType: "json",
            data: {              
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#autouser').val(ui.item.value + ' | ' + ui.item.label); // display the selected text
          $('#userid').val(ui.item.label_id); // save selected id to input
          return false;
        }
      }) .data("ui-autocomplete")._renderItem = function (ul, item) {
          return $("<li>").data("ui-autocomplete-item", item).append('<div class"col" style="font-size: 14px">' + item.value + ' | ' +  item.label + '</a></div>').appendTo(ul);
        };
      });
    </script>
  </body>
</html>