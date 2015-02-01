$('.shb').click(function(e){
    e.preventDefault();
    window.open('http://serioushomebrew.eu');
});

//Check if var is an int
function isInt(n) {
    return n % 1 === 0;
}

//Check if undefined
function isSet(variable) {
    return typeof variable !== 'undefined';
}