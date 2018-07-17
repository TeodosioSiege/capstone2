
function openForm(evt, formName) {
     // Declare all variables
    var i, tabcontent, tablinks;
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(formName).style.display = "block";
    evt.currentTarget.className += " active";
}

function addToCart(itemId) {
    var quantity = $("#quantity"+itemId).val();
    //alert("The product number is " + itemId + " and the quantity is " + quantity);//testing
    console.log("This is item ID:" + itemId);
    console.log("This is the quantity:" + quantity);
    $.ajax({
        url: "action/add_to_cart.php",
        method: "POST",
        data: {
            item_id: itemId,
            item_quantity: quantity,
        },
        datatype: "text",
        success: function(data,status){
            $('a[href="cart.php"]').html(data);
        }
    })
}

function showCategories(categoryId) {
    var categoryId = categoryId
    //alert(categoryId);
    $.ajax({
        url: "action/show_items.php",
        method: "POST",
        data: 
            {
                categoryId: categoryId
            },
        dataType: "text",
        success: function(x){
            $("#products").html(x);
        }
    })
}

function loadCart() {
    $.get("action/load_cart.php", function (data, status) {
        $("#loadCart").html(data);
    });
}

function changeNoItems(id) {
    var items = $("#quantity"+id).val();
    var price = $("#price"+id).text();
    addToCart(id);
    loadCart();
}

function removeFromCart(id) {
    //console.log("You are deleting product "+id);
    var ans = confirm("Are you sure you want to delete?");
    if (ans) {
        $.ajax({
            url:"action/remove_from_cart.php",//where to go
            method:"POST",//how?
            data:{
                x:id
            },
            dataType:"text",
            success: function(data) {
                $('a[href="cart.php"]').html(data);
                loadCart();
            }
        });
    }
}

function quantity(item,quantity,orderId,name) {
    $("#quantity"+item).html("<td><form action='action/update_quantity.php' method='POST'><input type='number' name='quantity' placeholder='"
        +quantity+"'>"+"<input type='number' name='orderNumber' value='"+orderId+"' hidden>"+
        "<input type='text' name='item' value='"+item+"' hidden>"+
        "<input type='text' name='name' value='"+name+"' hidden>"+
        " <button class='btn btn-success'>Submit Update</button></form></td>");
}

function showStatus(Status) {
    var Status = Status
    //alert(categoryId);
    $.ajax({
        url: "action/show_status.php",
        method: "POST",
        data: 
            {
                Status: Status
            },
        dataType: "text",
        success: function(x){
            $("#status").html(x);
        }
    })
    }
