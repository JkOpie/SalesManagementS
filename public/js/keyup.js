$(document).ready(function () {

    $('.cal_payment_invoice').keyup(function() { 
        var tp = $('.cal_tp_invoice').val();
        var payment = this.value;

        var total =  parseInt(payment) - parseInt(tp);
        console.log(payment);
        console.log(total);
        
        
        
        $('.cal_balance_invoice').val(total);
        
    });

    $('#ap_price').keyup(function() { 
        var sales = $('#ap_sales').val();
        var price = this.value;
        var profit = parseInt(sales) - parseInt(price);

        console.log(sales);
        console.log(price);
        console.log(profit);
        

        $('#ap_profit').val(profit);
        
    });

   

    $('.input_sales').keyup(function() { 
        var sales = $('.input_price').val();
        var price = this.value;
        var profit = parseInt(price) - parseInt(sales);

        console.log(sales);
        console.log(price);
        console.log(profit);
        

        $('.input_profit').val(profit);
        
    });

    

    $('#ap_sales').keyup(function() { 
        var price = $('#ap_price').val();
        var sales = this.value;

        var profit = parseInt(sales)-parseInt(price);
        console.log(profit);
        

        $('#ap_profit').val(profit);
        
    });



    $('.for_error').hide();

    $('.input_quantity').keyup(function() { 
        var sales = $('.input_sales').val();
        var max_quantity = $('.input_max_quantity').val();
        var quantity = this.value;

        var total_price = parseInt(sales)*parseInt(quantity);

         if (parseInt(max_quantity) <=  parseInt(quantity)){
              $('.for_error').show()
        }else{
            $('.for_error').hide()
        }

        $('.input_total_price').val(total_price);
    });



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

    
    console.log(price);


    $('.input_profit').val(profit);    
}
