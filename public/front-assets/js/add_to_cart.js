$(document).ready(function(){

    getData();
    count();
    function getData() {
        let itemsGetString = localStorage.getItem('shops');
        console.log(itemsGetString);
        if (itemsGetString) {
            let itemsGetArray = JSON.parse(itemsGetString);
            console.log(itemsGetArray);

            let data = '';
            let j = 1 ;
            total=0;
            $.each(itemsGetArray,function(i,v){
                // console.log("This is key"+i);
                // console.log(v.stu_name);
                //subtotal=v.qty * v.price;
                subtotal = Math.round((v.price-(v.price*(v.discount/100)))*v.qty)

                data += `<tr>
                        <td>${j++}</td>
                        <td>${v.name}</td>
                        <td><img src="${v.image}" width="50"</td>
                        <td>${v.price}</td>
                        <td>${v.discount}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary min" data-key="${i}">-</button>
                                ${v.qty}
                            <button class="btn btn-sm btn-outline-secondary max" data-key="${i}">+</button>
                        </td>
                        <td>${subtotal} MMK</td>
                    </tr>`


                total+=subtotal;
                // console.log(total);

               $('#total').html(total);

            })
            data += `<tr>
                <td colspan="6">Total</td>
                <td>${total} MMK</td>
            </tr>`

            $('#body').html(data);

        }
    }


    function count() {
        let itemsString = localStorage.getItem('shops');
        if (itemsString) {
            let itemsArray = JSON.parse(itemsString);
            // console.log(itemsArray);

            if (itemsArray != 0) {
                let count = itemsArray.length;
                $('#count_item').text(count);
            }
        }
    }



    $('.addToCart').click(function(){
        // alert('hello');
        let id = $(this).data('id');
        let name = $(this).data('name');
        let price = $(this).data('price');
        let discount = $(this).data('discount');
        let image = $(this).data('image');
        let qty = $('.qty').val();
        console.log(id,name,price);

        let items = {
            id: id,
            name: name,
            price: price,
            discount: discount,
            image: image,
            qty:qty
        }

        let itemsString = localStorage.getItem('shops')
        let itemsArray;

        if (itemsString == null) {
            itemsArray = [];
        } else {
            itemsArray = JSON.parse(itemsString);
        }

        let status = false;
        $.each(itemsArray,function(i,v){
            if (v.id == id) {
                //v.qty++;
                v.qty = Number(v.qty) + Number(qty);
                status=true;
            }
        })

        if (status == false) {
            itemsArray.push(items);
        }

        let itemsData = JSON.stringify(itemsArray);
        localStorage.setItem('shops',itemsData);

        count();

    })

    $('#body').on('click','.min',function(){
        let key = $(this).data('key');
        // alert(key);

        let itemsString = localStorage.getItem('shops');
        if (itemsString) {
            let itemsArray = JSON.parse(itemsString);

            $.each(itemsArray,function(i,v){
                if (i == key) {
                    v.qty--;
                    if (v.qty == 0) {
                        itemsArray.splice(key,1)//splice(start,number)
                    }
                }
            });
            let itemsData = JSON.stringify(itemsArray);
            localStorage.setItem('shops',itemsData);

            getData();

        }
    })

    $('#body').on('click','.max',function(){
        let key = $(this).data('key');
        // alert(key);

        let itemsString = localStorage.getItem('shops');
        if (itemsString) {
            let itemsArray = JSON.parse(itemsString);

            $.each(itemsArray,function(i,v){
                if (i == key) {
                    v.qty++;
                    // if (v.qty == 0) {
                    //     itemsArray.splice(key,1)//splice(start,number)
                    // }
                }
            });
            let itemsData = JSON.stringify(itemsArray);
            localStorage.setItem('shops',itemsData);

            getData();

        }
    })


    $('#order_now').click(function(){
        let ans = confirm('Are you sure order?');
        if (ans) {
            localStorage.removeItem('shops');
            window.location.href = "index.html";
        }
    })

})
