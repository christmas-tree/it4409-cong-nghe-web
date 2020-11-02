function rot13(str) {

    let decode = (char) => {
        // If the character is before 'N' then shift forward, else shift backward
        let decodedCharCode = char.charCodeAt(0) + (char < 'N' ? 13 : -13);
        return String.fromCharCode(decodedCharCode);
    }

    // Match every character and decode using the decode function
    return str.replace(/[A-Z]/g, decode);
}

console.log(rot13("SERR CVMMN!"));
