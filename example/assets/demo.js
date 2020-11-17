cardForm.mount('gpg-form-container');
cardForm.on('TOKEN_CREATION',
        (token) => {
            //send charge request to backend
            $.post('charge.php', {token: token.id}, function (response) {
                //handle charge errors
                if (response.errors) {
                    $('.responseContainer').html('<p><b>Charging failed:</b> ' + response.title + '<p>');
                    $('.responseContainer').addClass('error');
                    cardForm.resetForm();
                } else {
                    //handle ok response
                    $('.responseContainer').hide();
                    $('.responseContainer').html('<h2>Thank you ' + response.billing_info.first_name + '<h2>');
                    $('.responseContainer').append('<h4>You have been charged ' + (response.amount / 100).toFixed(2) + ' ' + response.currency_code + '<h4>');
                    $('.responseContainer').append('<hr>');
                    $('.responseContainer').append('<p>Transaction id: <b>' + response.client_transaction_id + '</b></p>');
                    $('.responseContainer').append('<p>Invoice #: <b>' + response.client_invoice_id + '</b></p>');
                    $('.responseContainer').append('<p>' + response.client_transaction_description + '</p>');
                    $('.responseContainer').removeClass('error');
                    $('.responseContainer').addClass('success');
                    $('#gpg-form-container').css('height', '230px');
                    cardForm.showSuccess();
                    $('.responseContainer').fadeIn(1000);
                }
            });
        },
        (error) => {
            //handle token error
            cardForm.resetForm();
            $('.responseContainer').html(JSON.stringify(error));
        }
);