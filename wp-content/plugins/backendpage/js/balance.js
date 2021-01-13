alert("999");
function ag(userlogin) {
    var result;
    
    $.ajax({
        type: 'POST',
        url: 'https://www.ba-666.com/wp-content/themes/new/ag/balance.php',
        data: 'username=' + userlogin,

        success: function(respone) {
            
            
            
            console.log('balance成功');
            result = respone;
            this['ag_b_'+userlogin] = respone;
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
            this['dg_b_'+userlogin] = respone;
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
            this['s128_b_'+userlogin] = respone;
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
            this['cmd'+userlogin] = respone;
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
            this['lcc_b_'+userlogin] = respone;
        },
        error: function() {
            console.log('balance錯誤');
        },



    });
    return result;
}