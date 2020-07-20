<?php
//supose that I have one button 
//when click and show table in onlcick

?>
<!DOCTYPE html>
<html>
    <head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    </head>
<body>
<button type="button" id="showtable">show table</button>
<div id="tables_div"></div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#showtable").click(function(){
     var tableHtml = '';
     tableHtml += '<table><tr><th>Company</th><th>Contact</th><th>Country</th></tr>';
     tableHtml += '<tr><td>Alfreds Futterkiste</td><td>Maria Anders</td><td>Germany</td></tr>';
     tableHtml += '<tr><td>Centro comercial Moctezuma</td><td>Francisco Chang</td><td>Mexico</td></tr>';
     tableHtml += '<tr><td>Ernst Handel</td><td>Roland Mendel</td><td>Austria</td></tr>';
     tableHtml += '</table>';
     $("#tables_div").html(tableHtml);
  });
});
</script>
</html>