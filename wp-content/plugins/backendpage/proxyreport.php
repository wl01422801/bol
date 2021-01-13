<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');
global $wpdb;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
.card {
    width: 100%;
}

.r0 {
    right: 1.25rem;
}

table {
    width: 100%;
    border-collapse: collapse;
    border-left: 1px solid gray;
    margin: 20px 0;
}

th {
    width: calc(100%/10);
    text-align: center;
    border-right: 1px solid #88badc;
    background-color: #398dc5;
    color: white;
}

th:nth-child(7) {
    width: 80px;
}

th:nth-child(8) {
    width: 80px;
}

td {
    text-align: center;
    border-bottom: 1px solid gray;
    border-right: 1px solid gray;
}

.col-4 .card {
    width: 100%;
}

.card img {
    width: 100%;
}

.card-body {
    bottom: 0;
    background: #fff;
}
</style>



<?php
			$tcountt = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}users;"));
			
			
			?>
<div style="text-align:center"><span></span></div>
<table style="width:95%;">
    <tbody>
        <tr>
            <th>帳號</th>
            <th>輸贏-總額</th>
            <th>反水-總額</th>
            <th>佔成成數</th>


        </tr>
  
		
       

                 <tr>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>

        </tr>

       
        
        
    </tbody>
</table>

