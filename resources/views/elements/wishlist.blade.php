@inject('currency', 'App\Currency')

<script>

    function addToWishList(id){
        for (var i = wishItems.length; i--;)
            if (wishItems[i].id == id)
                return showNotification("pastel-danger", "{{$lang->get(24)}}", "bottom", "center", "", "");  // This product already on wishlist
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("foodsInfo") }}',
            data: {
                id: id,
            },
            success: function (data){
                console.log(data);
                if (data.food == null)
                    return;

                // save to local wishlist
                var item = {
                    id: data.food.id,
                    title: data.food.name,
                    price: data.food.price,
                    discountprice: data.food.discountprice,
                    image: data.food.image,
                };
                wishItems.push(item);
                localStorage.setItem('wishItems', JSON.stringify(wishItems));
                showNotification("pastel-info", "{{$lang->get(26)}}", "bottom", "center", "", "");  // Product added to wishlist
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    let wishItems = JSON.parse(localStorage.getItem("wishItems")) || [];

    function initTableWish(){
        document.getElementById("wish_tbody").innerHTML = wishItems.map((product, i) => {
            if (product.discountprice != 0)
                var currentPrice = parseFloat(product.discountprice);
            else
                var currentPrice = parseFloat(product.price);
            if ({{$currency->rightSymbol()}} == "false")
                var price = parseFloat(currentPrice).toFixed({{$currency->symbolDigits()}}) + "{{$currency->currency()}}";
            else
                var price = "{{$currency->currency()}}" + parseFloat(currentPrice).toFixed({{$currency->symbolDigits()}});
            return `
                <tr>
                    <td class="pro-thumbnail"><a href="{{route('/foodDetails')}}?id=${product.id}"><img src="${product.image}" class="img-fluid" alt="Product"></a></td>
                    <td class="pro-title"><a href="{{route('/foodDetails')}}?id=${product.id}">${product.title}</a></td>
                    <td class="pro-price"><span>${price}</span></td>
                    <td class="pro-remove"><a href="#"><img src="img/delete.png" onclick="removeFromWish(${product.id});" class="img-fluid" style="max-height: 30px"/></a></td>
                </tr>
                `;
        }).join("");
    }

    function removeFromWish(id){
        for (var i = wishItems.length; i--;)
            if (wishItems[i].id == id)
                wishItems.splice(i, 1);
        localStorage.setItem('wishItems', JSON.stringify(wishItems));
        initTableWish();
    }


</script>
