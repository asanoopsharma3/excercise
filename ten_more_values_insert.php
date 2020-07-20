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
<button type="button" id="moretable">More Append</button>
<div id="tables_div">
    
<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#moretable").click(function(){
        var tableHtml2 = '';
        tableHtml2 += '<tr><td>Alfreds Futterkiste</td><td>Maria Anders</td><td>Germany</td></tr>';
        tableHtml2 += '<tr><td>Centro comercial Moctezuma</td><td>Francisco Chang</td><td>Mexico</td></tr>';
        tableHtml2 += '<tr><td>Ernst Handel</td><td>Roland Mendel</td><td>Austria</td></tr>';
        tableHtml2 += '<tr><td>Alfreds Futterkiste</td><td>Maria Anders</td><td>Germany</td></tr>';
        tableHtml2 += '<tr><td>Centro comercial Moctezuma</td><td>Francisco Chang</td><td>Mexico</td></tr>';
        tableHtml2 += '<tr><td>Ernst Handel</td><td>Roland Mendel</td><td>Austria</td></tr>';
        tableHtml2 += '<tr><td>Alfreds Futterkiste</td><td>Maria Anders</td><td>Germany</td></tr>';
        tableHtml2 += '<tr><td>Centro comercial Moctezuma</td><td>Francisco Chang</td><td>Mexico</td></tr>';
        tableHtml2 += '<tr><td>Ernst Handel</td><td>Roland Mendel</td><td>Austria</td></tr>';
        $("#tables_div").append(tableHtml2);
    });
});
</script>
</html>