

$(".add_to_cart").click(function(){
var product_id=$(this).attr("id_pro");
// console.log(id);

$.ajax({
url:"./add_to_cart",
method:"post",
data:{product_id:product_id , _token:_token},

success:function(success){
//  console.log(success);
$("#All_item").load(location.href+"#All_item",function(){  cart();  });


},

    error:function(error){
        console.log(error);
        },
});
});


function delete_cart(){
 $(".delete_item").click(function(){
    $(this).closest(".cart_item").remove();
    cart()
    var product_id=$(this).attr("id_pro");
    $.ajax({
        url:"./destroy",
        method:"delete",
        data:{product_id:product_id,_token:_token},

        succuss:function(succuss){
            console.log(succuss);
            },

            error:function(error){
                console.log(error);
                },

    })
 })

}
delete_cart();



function cart(){
    const price=document.querySelectorAll(".price_item");
    const count=document.querySelectorAll(".count_item");
    var total=0;
    var num_item=$(".cart_item").length;
    for(let i = 0 ; i < price.length ; i++){
        var total=total + + price[i].innerHTML*count[i].innerHTML;
    }
    $(".total-amount").html("$"+total)
    $(".total_item").html(num_item+"  items");
    $(".total-items").html(num_item);
}
cart()

//search


$(".search").keyup(function(){
 var    search=$(".search").val();
//  console.log(search);
$.ajax({
    url:"./search",
    method:"post",
    data:{_token:_token,search:search},

    succuss:function(succuss){
       $(".search_div").html(succuss);
        },

    error:function(error){
     console.log(error);
    },
})


});
