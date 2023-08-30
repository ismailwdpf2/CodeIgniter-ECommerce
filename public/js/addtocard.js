$(document).ready(function () {
  $("#cart").hide();
  $(".bi-cart-dash-fill").mouseenter(function () {
    $("#cart").show();
  });

  $(".bi-cart-dash-fill").click(function () {
    $("#cart").hide();
  });

  var cart_item_count = 0;
  $(".cart_btn").click(function () {
    cart_item_count++;

    var img_src = $(this).parents(".p_card").find("img").attr("src");
    var title = $(this).parents(".p_card").find(".card-title").text();
    var price = $(this).parents(".p_card").find(".card-price").text();

    var cart_item = `
					<div class="main d-flex p-3 border border-left-o border-right-0 border-top-0">
							<div class="col-1 border border-left-0 border-top-0 border-bottom-0">
									<img src="${img_src}" class="w-100" alt="" style="width:20px;height:50px"/>
							</div>
	
							<div id="title" class="col-3 d-flex flex-wrap align-content-center" style="margin-left:86px;">
									<h6>${title}</h6>
							</div>
	
							<div class="col-3 d-flex flex-wrap align-content-center" style="margin-left:2px;">
							<input type="number" id="myNumber" style="width:90px">
									
							</div>
	
							<div class="col-2 d-flex flex-wrap align-content-center" id="t_price" style="margin-left:23px;">
									<h6 class="mt-2 d-flex"><span> $ </span> <span class="cart_item_price"> ${price} </span></h6>
							</div>
	
							<div class="col-1 d-flex flex-wrap align-content-center">
									<span class="close" style="cursor:pointer;font-size:25px">&times;</span>
							</div>
					</div>
			`;

    $("#order").append(cart_item);
    $("#cart_item_count").text(cart_item_count);

    $(".close").click(function () {
      $(this).parents(".main").remove();
      item_count();
    });

    item_count();
  });

  function item_count() {
    var res = $("#order").children().length;
    $("#cart_item_count").text(res);
  }
});
