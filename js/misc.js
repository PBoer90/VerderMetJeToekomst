/**
 * Check if param is a int
 *
 * @param n
 * @returns {boolean}
 */

function isInt(n) {
    return n % 1 === 0;
}

/**
 * Check if param is undefined
 *
 * @param variable
 * @returns {boolean}
 */
function isSet(variable) {
    return typeof variable !== 'undefined';
}

/**
 * Check if character is inside of a string
 *
 * @param char
 * @param string
 * @returns {boolean}
 */
function inString(char, string){
    if ( string.indexOf(char) > -1 )
        return true;
    return false;
}

/**
 * Fix string so we can have clean values for eg html class
 *
 * @param string
 * @returns {XML|string|void}
 */
function stringFix(string){
    var fixedString = string.replace('/','-');

    while(inString('/', fixedString)){
        fixedString = fixedString.replace('/','-');
    }

    while(inString(' ', fixedString)){
        fixedString = fixedString.replace(' ','_');
    }

    return fixedString;

}