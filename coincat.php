<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aeolian Alexanders Coin Catalog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">


  </head>
  <body style="margin:0;">
<?php
    include('nav.php');
      ?>
      <main role="main">
<br />
<br />
<br />
    <div id="table">
      <table id="coin_list" class="display">
    		<thead>
    			<tr>
    				<th>Coin ID</th>
    				<th>Mint</th>
    				<th>Type ID</th>
    				<th>Obverse Die</th>
    				<th>Reverse Die</th>
    				<th>Title</th>
    				<th>Notes</th>
    			</tr>
    		</thead>
    		<tfoot>
    			<tr>
    				<th>Coin ID</th>
    				<th>Mint</th>
    				<th>Type ID</th>
    				<th>Obverse Die</th>
    				<th>Reverse Die</th>
    				<th>Title</th>
    				<th>Notes</th>
    			</tr>
    		</tfoot>
    	</table>
    </div>


  </main>

  </body>
  <script>

    $(document).ready(function() {

      var coinList = $('#coin_list').DataTable({
          "bAutoWidth": false,
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "coin_proc",
              "type": "POST"
          },
          "columns": [{
                  "data": "id"
              },
              {
                  "data": "mint"
              },
              {
                  "data": "type"
              },
              {
                  "data": "obverse"
              },
              {
                  "data": "reverse"
              },
              {
                  "data": "title"
              },
              {
                  "data": "notes"
              }
          ]
      });

      $('#coin_list tbody').on('dblclick', 'tr', function() {
        var data = coinList.row(this).data();
        var filePath = 'http://localhost/aeolianalexanders/coins/'+ data['id'];
        var win = window.open(filePath, '_blank');
        win.focus();
      });
});

  </script>

</html>
