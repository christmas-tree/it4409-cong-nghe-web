function palindrome(str) {

    let cleanedStr = str.replace(/[^A-Za-z0-9]/g, '').toLowerCase();
    let reversedStr = cleanedStr.split('').reverse().join('');

    return cleanedStr === reversedStr;
}


console.log(palindrome("eye"));
console.log(palindrome("My age is 0, 0 si ega ym."));

