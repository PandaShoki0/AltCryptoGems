var rates;

var exchange_loaded = false;

var checkSlugRate;





function loadConversionApi() {

    fetch('https://api.coingecko.com/api/v3/exchange_rates')

        .then(response => response.json())

        .then(data => {

             rates = data.rates;

              exchange_loaded = true; 

              console.log(data.rates);

    });

}





function initRate(){

    checkSlugRate = setTimeout(emitRate, 1000);

}



function stopSlugRate(){

    clearTimeout(checkSlugRate);

}





function convertValue(from_coin, to_base, amount, format = true)

{
    console.log("from_coin", from_coin, to_base)
    from_coin = from_coin.toLowerCase();

    to_base = to_base.toLowerCase(); 



    _coin_currency =  rates[from_coin];

    _base_currency = rates[to_base];



    var _converted_value = (_base_currency.value/_coin_currency.value) * amount;



    _final_result = (format) ? _base_currency.unit+numberWithCommas(_converted_value): _converted_value;



    console.log(_final_result);

    return _final_result;

}



function convertFromValue(from_currency, to_coin, amount){





    if(rates == undefined)

    return;



    from_currency = from_currency.toLowerCase();

    to_coin = to_coin.toLowerCase();



    _from_currency = rates[from_currency];

    _to_coin = rates[to_coin];



    unit_currency = (_from_currency.value/_to_coin.value);





    return parseFloat(amount/unit_currency);

}





function fmtVal(amount, currency){

    _base_currency = rates[currency];

    return  _base_currency.unit+numberWithCommas(amount);

}



function emitRate() {



    if(rates == undefined)

    return;



    $('.convert[data-crypto="active"]').each(function(index, element){

            base = $(element).data('coin');    

            amount = $(element).data('value');

            convert_to = $(element).data('convertto');



            //1 btc id this currency value

            _currency =  rates[convert_to];



            _base_currency = rates[base];



            if(_base_currency == undefined){

                $(element).text( amount+' '+(base.toUpperCase()) );

            }else{

                var _crypto_value = (_currency.value/_base_currency.value) * amount;

        

                var _fmt_value = numberWithCommas(_crypto_value);

                var convertedamount = _currency.unit+(_fmt_value);

                $(element).text(convertedamount);

            }

    });

    stopSlugRate();

}



function numberWithCommas(x) {

    return x.toFixed(2).toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");

}



$(document).ready(function(){

    loadConversionApi();

    initRate();

});