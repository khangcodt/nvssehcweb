/**
 * Created by Chesvn Administrator on 5/13/15.
 */

/**
 * Return data of unchecked input data, including data is null
 * @param uncheckData
 * @returns {string}
 */
function getUncheckData(uncheckData) {
    return (uncheckData === undefined || uncheckData == null || uncheckData.length <= 0)? "": uncheckData.data;
}

/**
 * return text or subtext end with ... if length of text > length
 * @param text
 * @param length limit
 * @returns {string}
 */
function getLimitText(text, length) {
    return text.length > length ? text.substr(0,length-1)+'&hellip;' : text;
}

/**
 * Return number in human readable format, remove zeros trailing, eg: 231.76k
 * @param number
 * @returns {string}
 */
function readableNumber(number) {
    if(isNaN(number)) return 'NaN';
    var thresh = 1000; //1k = 1000
    var s = ['', 'k', 'M', 'G', 'T', 'P'];
    var e = Math.floor(Math.log(number) / Math.log(thresh));
    return parseFloat((number / Math.pow(thresh, e)).toFixed(2)) + s[e];
}