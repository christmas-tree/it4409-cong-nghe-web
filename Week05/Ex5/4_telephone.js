function telephoneCheck(str) {
    let re = /^(1\s?)?((\(\d{3}\))|(\d{3}))[\s-]?\d{3}[\s-]?\d{4}$/;

    /*
    GIAI THICH:
    - (1\s?)?
        Xau co the bat dau bang "1", "1 " hoac khong co
    - ((\(\d{3}\))|(\d{3}))
        Tiep theo, co the gom cap ngoac don va 3 chu so o trong, hoac chi co 3 chu so
    - [\s-]?
        Tiep theo co the la dau cach hoac dau tru, hoac khong co dau
    - \d{3}
        Tiep theo la 3 chu so
    - \d{4}
        Tiep theo la 4 chu so
    - ^...$
        Xau bat dau va ket thuc theo dung quy luat
    */

    return re.test(str);
}
