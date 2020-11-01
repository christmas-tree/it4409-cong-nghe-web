
function checkCashRegister(price, cash, cid) {
    const currencies = [
        { name: "ONE HUNDRED", val: 100.0 },
        { name: "TWENTY", val: 20.0 },
        { name: "TEN", val: 10.0 },
        { name: "FIVE", val: 5.0 },
        { name: "ONE", val: 1.0 },
        { name: "QUARTER", val: 0.25 },
        { name: "DIME", val: 0.1 },
        { name: "NICKEL", val: 0.05 },
        { name: "PENNY", val: 0.01 }
    ];

    let result = { status: null, change: [] };
    let owedChange = cash - price;

    // Make a drawer object
    let drawer = { total: 0 };
    cid.forEach((curr) => {
        drawer.total += curr[1];
        drawer[curr[0]] = curr[1];
    })

    // IF not enough change, return insufficient funds
    if (drawer.total < owedChange) {
        result.status = "INSUFFICIENT_FUNDS";
        return result;
    }

    // If have enough change, return closed
    if (drawer.total === owedChange) {
        result.status = "CLOSED";
        result.change = cid;
        return result;
    }

    // Loop through the currencies array
    let change = [];
    currencies.forEach((curr) => {
        let value = 0;

        // Loop until there is no more money of this type, or if the change is
        // smaller than the value of the currency.
        while (drawer[curr.name] > 0 && owedChange >= curr.val) {
            owedChange -= curr.val;
            drawer[curr.name] -= curr.val;
            value += curr.val;

            owedChange = Math.round(owedChange * 100) / 100;
        }
        if (value > 0) {
            change.push([curr.name, value]);
        }
    });

    // If there is no change, or we still have owed change left,
    // return Insufficient Funds
    if (change.length < 1 || owedChange > 0) {
        result.status = "INSUFFICIENT_FUNDS";
        return result;
    }

    // Else return OPEN with the change
    result.status = "OPEN";
    result.change = change;
    return result;
}

checkCashRegister(19.5, 20, [["PENNY", 1.01], ["NICKEL", 2.05], ["DIME", 3.1], ["QUARTER", 4.25], ["ONE", 90], ["FIVE", 55], ["TEN", 20], ["TWENTY", 60], ["ONE HUNDRED", 100]]);
