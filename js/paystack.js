	function payWithPaystack(){
      var handler = PaystackPop.setup({
        key: 'pk_test_c7dd5e846247461fa0423b50313b412107657ece',
        email: '<?php echo $email; ?>',
        amount: <?php echo $total; ?>00,
        metadata: {
           custom_fields: [
              {
                  display_name: "Mobile Number",
                  variable_name: "mobile_number",
                  value: "+2348012345678"
              }
           ]
        },
        callback: function(response){
            alert('success. transaction ref is ' + response.reference);
            window.open('index.php', '_self');
        },
        onClose: function(){
            location.reload();

        }
      });
      handler.openIframe();
    }
