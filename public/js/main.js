$(document).ready(function () {

    //$(".hamburger").click(function(){ 
    //var active = $(".wrapper").toggleClass("active");
    // if($('#wrapper').hasClass('active')){
    //  localStorage.setItem('activeId','active');
    // }else{
    //  localStorage.removeItem('activeId');
    //}
    //}) 
    //var activeID = localStorage.getItem('activeId');

    //if(activeID){
    //  $(".wrapper").addClass('active');

    // }

    menu_li();
    product_delete();
    product_add();

    add_stock();
    stock_delete();

});


function menu_li() {

    var current = location.pathname;
    $('.inner__sidebar_menu ul li a').each(function () {
        var $this = $(this);
        // if the current path is like this link, make it active
        if ($this.attr('href').indexOf(current) !== -1) {
            $this.addClass('active');
        }
    })

}

function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function product_add(){
    var token = $("meta[name='csrf-token']").attr("content");
    var myForm  = $("form#add_product");

    myForm.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: myForm.attr('action'),
            data: myForm.serialize(),
            success: function (data) {
                swal.fire({
                    title: "Success!",
                    text: "Product Added!",
                    icon: "success",
                    confirmButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                })
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal.fire({
                    title: "Oops!",
                    text: "An error occurred",
                });
            }
        });
    });      
}

function product_delete() {
    var token = $("meta[name='csrf-token']").attr("content");
    $(".deletebtn").click(function () {
        var id = this.value
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'delete',
                    url: "product/" + id,
                    data: {
                        "_token": token,
                        "id": id,
                    },
                    success: function (data) {
                        swal.fire({
                            title: "Success!",
                            text: "Event deleted!",
                            icon: "success",
                            confirmButtonColor: '#3085d6',
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        })
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal.fire({
                            title: "Oops!",
                            text: "An error occurred",
                        });
                    }
                });
            }
        })
    });
}


function add_stock(){
  var token = $("meta[name='csrf-token']").attr("content");
  $(".add_stock").click(function () {
        var id = this.value;
        //console.log(id); 
        (async () => {
          const { value:  quantity} = await Swal.fire({
            title: 'Enter stock',
            icon: "info",
            input: 'number',
            inputPlaceholder: 'How many?'
          })
          
          if (quantity) {
            $.ajax({
              type: 'post',
              url: "product/add_stock/",
              data: {
                  "_token": token,
                  "id": id,
                  "quantity": quantity
              },
              success: function (data) {
                  swal.fire({
                      title: "Success!",
                      text: "Stock added successfully!",
                      icon: "success",
                      confirmButtonColor: '#3085d6',
                  }).then((result) => {
                      if (result.value) {
                          location.reload();
                      } else {
                          location.reload();
                      }
                  })
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  swal.fire({
                      title: "Oops!",
                      text: "An error occurred",
                  });
              }
            });
          }
        })(); 
  })
};

function display_profit(){
    var sales =  $('#input_sales').val();
    var price = $('#input_price').val();
    var profit = sales-price;

    $('#input_profit').val(profit);
    
}

function stock_delete() {
    var token = $("meta[name='csrf-token']").attr("content");
    var myForm  = $("form#stock_delete");
    var product_quantity = 
    myForm.submit(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'delete',
                    url: myForm.attr('action'),
                    data: myForm.serialize(),
                    success: function (data) {
                        swal.fire({
                            title: "Success!",
                            text: "Event deleted!",
                            icon: "success",
                            confirmButtonColor: '#3085d6',
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        })
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal.fire({
                            title: "Oops!",
                            text: "An error occurred",
                        });
                    }
                });
            }
        })
    });
}


