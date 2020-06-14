<?php
$getfile = file_get_contents('test.json');
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="add.php">Add</a>
<table align="center">
    <tr>
        <th>Title</th>
        <th>Background Image</th>
        <th>Video URL (Link to Video)</th>
        <th>Description of Video</th>
        <th></th>
    </tr>
    <tbody>
        <?php foreach ($jsonfile->playlist as $index => $obj): ?>
            <tr>
                <td><?php echo $obj->title; ?></td>
                <td><?php echo $obj->title_bg; ?></td>
                <td><?php echo $obj->link; ?></td>
                <td><?php echo $obj->description; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $index; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $index; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $json = $jsonfile;
foreach ($json->playlist as $item) {
    if ($item->title == "dfff") {
        echo $item->title_bg;
    }
} 
?>

<form action="" method="get">
    <input type="text" id="s" name="s">
    <button type="submit">Cari</button>
</form>

<?php 

if (isset($_GET['s'])) {
    $s = $_GET['s'];
    echo "<h2></h2>";
    $json = $jsonfile;
    foreach ($json->playlist as $item) {
        if (strpos($item->title, $s) !== FALSE) {
            echo $item->title;
            echo $item->title_bg; 
        }
    } 
    
}

 ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script>
  $(function() {
    $( "#s" ).autocomplete({
      source: 'autocomplete_search.php'
    });
  });
  </script>
</body>
</html>




<!-- <!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Search HTML Table Data by using JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #result {
   position: absolute;
   width: 100%;
   max-width:870px;
   cursor: pointer;
   overflow-y: auto;
   max-height: 400px;
   box-sizing: border-box;
   z-index: 1001;
  }
  .link-class:hover{
   background-color:#f1f1f1;
  }
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">JSON Live Data Search using Ajax JQuery</h2>
   <h3 align="center">Employee Data</h3>   
   <br /><br />
   <div align="center">
    <input type="text" name="search" id="search" placeholder="Search Employee Details" class="form-control" />
   </div>
   <ul class="list-group" id="result"></ul>
   <br />
   <div id="s"></div>
  </div>
  
 </body>
</html>

<script>
$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $('#search').keyup(function(){
  $('#result').html('');
  $('#state').val('');
  var searchField = $('#search').val();
  var expression = new RegExp(searchField, "i");
  $.getJSON('data.json', function(data) {
   $.each(data, function(key, value){
    if (value.name.search(expression) != -1 || value.location.search(expression) != -1)
    {
     $('#result').append('<li class="list-group-item link-class"> '+value.name+' | <span class="text-muted">'+value.location+'</span></li>');
    }
   });   
  });
 });
 
 $('#result').on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $('#search').val($.trim(click_text[0]));
  $("#result").html('');
  $('#s').append('<li class="list-group-item link-class"> '+$.trim(click_text[1])+'</li>');
 });
});
</script> -->