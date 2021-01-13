<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');
global $wpdb;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
<script>

function ag(userlogin) {
    var result;
    
    $.ajax({
        type: 'POST',
        url: 'https://www.ba-666.com/wp-content/themes/new/ag/balance.php',
        data: 'username=' + userlogin,

        success: function(respone) {
            
            
            
            console.log('balance成功');
            result = respone;
            window['ag_b_'+userlogin] = respone;
			
        },
        error: function() {
            console.log('balance錯誤');
        },



    });
    return result;
}

function dg(userlogin) {
    var result;
    
    $.ajax({
        type: 'POST',
        url: 'https://www.ba-666.com/wp-content/themes/new/dg/balance.php',
        data: 'username=' + userlogin,

        success: function(respone) {
            
          
        
            console.log('balance成功');
            result = respone;
            window['dg_b_'+userlogin] = respone;
        },
        error: function() {
            console.log('balance錯誤');
        },



    });
    return result;
}

function s128(userlogin) {
    var result;
    $.ajax({
        type: 'POST',
        url: 'https://www.ba-666.com/wp-content/themes/new/animal/s128/balance.php',
        data: 'username=' + userlogin,

        success: function(respone) {

        
            console.log('balance成功');
            result = respone;
            window['s128_b_'+userlogin] = respone;
        },
        error: function() {
            console.log('balance錯誤');
        },



    });
    return result;
}

function cmd(userlogin) {
    var result;
    $.ajax({
        type: 'POST',
        url: 'https://www.ba-666.com/wp-content/themes/new/sport/cmd/balance.php',
        data: 'username=' + userlogin,

        success: function(respone) {

        
            console.log('balance成功');
            result = respone;
            window['cmd'+userlogin] = respone;
        },
        error: function() {
            console.log('balance錯誤');
        },



    });
    return result;
}

function lcc(userlogin) {
    var result;
    $.ajax({
        type: 'POST',
        url: 'https://www.ba-666.com/wp-content/themes/new/tab/lcc/balance.php',
        data: 'username=' + userlogin,

        success: function(respone) {

       
            console.log('balance成功');
            result = respone;
            window['lcc_b_'+userlogin] = respone;
        },
        error: function() {
            console.log('balance錯誤');
        },



    });
    return result;
}


</script>

<div>
<div>創建帳號</div>

<div>帳號<input id="createusername" type="text" ></div>
<div>密碼<input id="createuserpassword" type="text"></div>
<button id="testbutton" type="button" class="btn btn-primary btn-lg">創建</button>


</div>
<?php
			$tcountt = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}users;"));
			
			
			?>
      <table style="width:95%;">
        <tbody>
          <tr>
            <th>帳號</th>
            <th>姓名</th>
            <th>儲存</th>
            <th>出金 </th>
            <th>手機</th>
            <th>反水</th>
            <th>洗碼(下注總額)</th>
            <th>註冊跟最後登入時間</th>
            <th>總餘額</th>
			  <th>刪除</th>
          </tr>
			<?php
			$count_time = 0;
			foreach ($tcountt as $b) {
			$nickname = $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM {$wpdb->prefix}usermeta WHERE user_id='%d';",$b->ID));
			$count_time = $count_time +1;
			
			?>
			<script>
			setTimeout(function() {
			
			var aa = '<?php echo $b->user_login;?>';
			this['ag_b_'+aa] = ag(aa);
			this['dg_b_'+aa] = dg(aa);
			this['s128_b_'+aa] = s128(aa);
			this['cmd_b_'+aa] = cmd(aa);
			this['lcc_b_'+aa] = lcc(aa);
				
			setTimeout(function() {
			var ag_bb = this['ag_b_'+aa];
			var dg_bb = this['dg_b_'+aa];
			var s128_bb = this['s128_b_'+aa];
			var cmd_bb = this['cmd_b_'+aa];
			var lcc_bb = this['lcc_b_'+aa];
			$('#totalbalanceid'+aa).html(ag_bb+dg_bb+s128_bb+lcc_bb);
			
			 }, 1500);
			}, <?php echo $count_time;?>000);
			</script>
          <tr>
            <td><?php echo $b->user_login;?></td>
            <td><?php echo $nickname;?></td>
            <td></td>
            <td></td>
            <td><?php echo $b->phone;?></td>
            <td></td>
            <td></td>
            <td><?php echo $b->user_registered;?></td>
            <td id="totalbalanceid<?php echo $b->user_login;?>"></td>
			  <td><button class="btn btn-dark">刪除</button></td>
          </tr>
			<?php }?>
        </tbody>
      </table>





<script>
$('#testbutton').click(function() {
	var creatname = $('#createusername').val();
	var creatpsd = $('#createuserpassword').val();
	//創建帳號tcg平台
	$.ajax({
        type: 'POST',
        url: '../wp-content/themes/new/ag/creatuser.php',
        data: 'creatname=' + creatname + '&creatpsd=' + creatpsd,
        success: function(response) {
            if (response == 'null') {
                
                console.log(response);
            } else {
                
                console.log(response);
            }
        },
        error: function() {
            console.log('錯誤');
        }
    });
	//創建帳號WP
	$.ajax({
        type: 'POST',
        url: '../wp-content/themes/new/backendaddmember.php',
        data: 'creatname=' + creatname + '&creatpsd=' + creatpsd,
        success: function() {
            
                
                console.log('wp成功');
            
        },
        error: function() {
            console.log('錯誤');
        }
    });
	
	
});
	



	

	

    
    

</script>