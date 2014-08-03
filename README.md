ZenCart Ajax Cart Handler
=========
NOTICE : This is an experimental code, don't use this code on live site.

This handler is using a great contribution from [Kuroi - Zen Cart Ajax Handler] for the ajax handler and Native Zen Cart Observer Class to listen on some shopping cart event.

Installation
----
Just bring the code on your Zen Cart installation, no core files modified. Unless you already use [Kuroi - Zen Cart Ajax Handler] and modified some of the files, you have to merge it.

Usage
-----------
It's AJAX so It's rely on javascript to make the HTTP Request. This is an example code using jQuery that listening on "Add to Cart" button on product info page.

```js
jQuery(document).ready(function(){
  jQuery('form[name="cart_quantity"]').submit(function(ev){
    ev.preventDefault();
    var url = jQuery(this).attr('action');
    var data = jQuery(this).serialize();
    jQuery.ajax({
      type: "POST",
      url: url,
      data: data,
      success: function(data){
        jQuery.post('ajax.php', 'handler=ajax_cart',function(response){
          //console.log(response);
        },'json');
      }
    });
  });
});
```

The JSON data contain JSON version of $_SESSION['cart'] PHP object. You can view the response from your browser console. 

  [Kuroi - Zen Cart Ajax Handler]: https://github.com/kuroi/Zen-Cart-Ajax-Handler
  
    
