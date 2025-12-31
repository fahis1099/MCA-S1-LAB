function createCalendar() {
    // 1. Get input values
    var year = document.getElementById("y").value;
    var month = document.getElementById("m").value;
    let mon = month - 1; // months in JS are 0..11, not 1..12
    
    // 2. Set the starting date (first day of the month)
    let d = new Date(year, mon);
    
    // 3. Start the table with headers and the first row
    let table = '<table><tr><th>SUN</th><th>MON</th><th>TUE</th> <th>WED</th><th>THU</th><th>FRI</th><th>SAT</th></tr><tr>';

    // 4. Add blank cells for the first week (padding for days before the 1st)
    // The d.getDay() gives the weekday (0=Sun, 6=Sat) of the 1st of the month.
    for (let i = 0; i < d.getDay(); i++) {
        table += '<td></td>';
    }

    // 5. Loop through all days of the month
    while (d.getMonth() == mon) {
        table += '<td>' + d.getDate() + '</td>'; // Add the day number

        // Check if it's Saturday (last day of the week, d.getDay() == 6)
        if (d.getDay() == 6) { 
            table += '</tr><tr>'; // Close the current row and start a new one
        }

        // Move to the next day
        d.setDate(d.getDate() + 1);
    }
    
    // 6. Add blank cells for the last week (padding for days after the last day)
    // d is now the first day of the *next* month. We want to pad if it's not Sunday (0).
    // Note: If the loop ended exactly on Saturday, d.getDay() will be 0 (Sunday) 
    // and this block will be skipped, which is correct.
    if (d.getDay() != 0) {
        for (let i = d.getDay(); i < 7; i++) {
            table += '<td></td>';
        }
    }
    
    // 7. Close the last row and the table
    table += '</tr></table>';

    // 8. Display the finished calendar
    document.getElementById("cal").innerHTML = table;
}