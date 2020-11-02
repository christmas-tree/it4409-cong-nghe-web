function convertToRoman(num) {

    const dict = [
        ["", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X"],
        ["", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC", "C"],
        ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM", "M"],
    ]

    let roman = '';
    for (let i = 0; i < 3; i++) {
        let digit = num % 10;
        num = Math.floor(num / 10);
        roman = dict[i][digit] + roman;
    }

    // Process the remaining digits
    roman = Array(num + 1).join('M') + roman;
    return roman;
}

console.log(convertToRoman(2048));
