function openNav() {
    document.getElementById("sidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("sidenav").style.width = "0";
}

// Countries Option REST API
document.addEventListener('DOMContentLoaded', () => {
    const selectDrop = document.querySelector('#countries');

    fetch('https://restcountries.com/v3.1/all').then(res => {
        return res.json();
    }).then(data => {
        let countryOpt = "";
        var sortedCountries = [];
        for (var i = 0; i < data.length; i++) {
            sortedCountries[i] = data[i].name.common;
        }
        sortedCountries.sort();
        for (var i = 0; i < sortedCountries.length; i++) {
            countryOpt += `<option>${sortedCountries[i]}</option>`;
        }
        selectDrop.innerHTML += countryOpt;
    }).catch(err => {
        console.log(err);
    })

});

// Caret-Down Categories
function caretDown() {
    
}
