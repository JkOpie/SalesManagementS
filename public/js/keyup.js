$(document).ready(function () {

    $('.cal_payment_invoice').keyup(function() { 
        var tp = $('.cal_tp_invoice').val();
        var payment = this.value;

        var total =  parseInt(payment) - parseInt(tp);    
        $('.cal_balance_invoice').val(total);
        
    });

    $('#ap_price').keyup(function() { 
        var sales = $('#ap_sales').val();
        var price = this.value;
        var profit = parseInt(sales) - parseInt(price);
    
        $('#ap_profit').val(profit);
        
    });

   

    $('.input_sales').keyup(function() { 
        var sales = $('.input_price').val();
        var price = this.value;
        var profit = parseInt(price) - parseInt(sales);
        
        $('.input_profit').val(profit);
    });

    

    $('#ap_sales').keyup(function() { 
        var price = $('#ap_price').val();
        var sales = this.value;

        var profit = parseInt(sales)-parseInt(price);
        
        $('#ap_profit').val(profit);
        
    });



    $('.for_error').hide();

    


    $('#payment').keyup(function() {
        var payment = this.value;
        var tp = $('#grand_total_price').val();

        var total =  parseInt(payment) - parseInt(tp)
        $('#balance').val(total);
     });



});

function display_profit(){
    var sales = $('.input_sales').val();
    var price = $('.input_price').val();
    var profit = parseInt(sales) - parseInt(price);

    $('.input_profit').val(profit);    
}

function cal_balance_invoice(){
    var tp = $('.edit_tp_invoice').val();
    var payment = $('.edit_payment_invoice').val();
    var total = parseInt(payment)-parseInt(tp);
    
    $('.edit_balance_invoice').val(total);
}

function cp_op(){
    var price = $('.ep_price').val();
    var sales = $('.ep_sales').val();
    var total = parseInt(sales) - parseInt(price);

    $('.ep_profit').val(total);
}

function popupwindow(url, title, w, h) {
    var left = (screen.width/2)-(w/2);
    var top = (screen.height/2)-(h/2);
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 

function closeandrefresh(){
    opener.location.href = opener.location.href;
    window.close(); 
  }
