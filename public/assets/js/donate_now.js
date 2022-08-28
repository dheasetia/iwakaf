const MessageCreate = function () {
    let payment = {
        code: '',
        name: '',
        transactionFee: 0,
        maintenanceFee: 0,
        displayText: '',
        amount: 0
    };


    const handleAmountChoice = function ()
    {
        $('#first_choice').on('click', function (e){
            payment.amount = $(this).val();
            updateCards();
        });
        $('#second_choice').on('click', function (e){
            payment.amount = $(this).val();
            updateCards();

        });
        $('#third_choice').on('click', function (e){
            payment.amount = $(this).val();
            updateCards();

        });
        $('#fourth_choice').on('click', function (e){
            payment.amount = $(this).val();
            updateCards();

        });


    }

    const handlePaymentMethod = function ()
    {
        $('.card').on('click', function () {
            const ini = $(this);
            payment.code = ini.data('code');
            payment.name = ini.data('display');
            $.get('/api/getpaymentfee', {
                method: payment.code,
                amount: payment.amount
            }, function (data, status){
                if (status === 'success') {
                    payment.transactionFee = data;
                    updateCards();
                }
            });

        });
    }

    const updateCards = function ()
    {
        payment.maintenanceFee = parseInt($('#maintenance_fee').text());
        const cards = $('.card');
        cards.each(function () {
            const ini = $(this);
            if (ini.data('code') === payment.code) {
                ini.addClass('active');
            } else {
                ini.removeClass('active');
            }
        });

        if (payment.amount === 0) {
            $('#donation_amount').val('');
        } else {
            $('#donation_amount').val(payment.amount);
        }
        const totalAmount = parseInt(payment.amount) + parseInt(payment.transactionFee) + parseInt(payment.maintenanceFee)
        $('#total_payment').text(totalAmount);
        $('#payment_method_name').text(payment.name);
        $('#transaction_fee').text(payment.transactionFee);
        console.log(payment);
    }

    const handleFillInput = function ()
    {
        $('#donation_amount').on('keyup', function () {
            if ($(this).val() === "") {
                payment.amount = 0;
            } else {
                payment.amount = $(this).val();
            }
            updateCards();
        })
    }

    const getPaymentFee = function (amount, paymentMethod)
    {
        $.get('/api/getpaymentfee', {
            method: paymentMethod,
            amount: amount
        }, function (data, status){
            if (status === 'success') {
                payment.transactionFee = data;
            }
        });
    }

    const thousandSeparator = function(num)
    {
        var num_parts = num.toString().split(".");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return num_parts.join(".");
    }

    return {
        init: function () {
            handleFillInput()
            handleAmountChoice();
            handlePaymentMethod();
            updateCards();
        }
    }
}();

jQuery(document).ready(function () {
    MessageCreate.init();
});
