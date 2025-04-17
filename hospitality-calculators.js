document.addEventListener('DOMContentLoaded', function () {
    // ADR Calculator
    function calculateADR() {
        var revenue = document.getElementById('adr_total_room_revenue').value.replace(/\$/g, '').trim();
        var rooms = document.getElementById('adr_total_rooms_sold').value.trim();
        var errorRevenue = document.getElementById('adr_total_room_revenue_error');
        var errorRooms = document.getElementById('adr_total_rooms_sold_error');
        var result = document.getElementById('adr_result');
        errorRevenue.textContent = '';
        errorRooms.textContent = '';
        if (isNaN(revenue) || revenue === '') {
            errorRevenue.textContent = 'Enter a valid dollar amount.';
            result.textContent = '--';
            return;
        }
        if (isNaN(rooms) || rooms === '' || parseInt(rooms) === 0) {
            errorRooms.textContent = 'Enter a valid number of rooms.';
            result.textContent = '--';
            return;
        }
        var adr = parseFloat(revenue) / parseInt(rooms);
        result.textContent = "Your Property's ADR is: $" + adr.toFixed(2);
    }

    // RevPAR Calculator
    function calculateRevPAR() {
        var revenue = document.getElementById('revpar_total_room_revenue').value.replace(/\$/g, '').trim();
        var available = document.getElementById('revpar_total_rooms_available').value.trim();
        var errorRevenue = document.getElementById('revpar_total_room_revenue_error');
        var errorAvailable = document.getElementById('revpar_total_rooms_available_error');
        var result = document.getElementById('revpar_result');
        errorRevenue.innerHTML = '';
        errorAvailable.innerHTML = '';
        if (isNaN(revenue) || revenue === '') {
            errorRevenue.innerHTML = 'Enter a valid dollar amount.';
            result.innerHTML = '--';
            return;
        }
        if (isNaN(available) || available === '' || parseFloat(available) == 0) {
            errorAvailable.innerHTML = 'Enter a valid number for available rooms.';
            result.innerHTML = '--';
            return;
        }
        var revpar = parseFloat(revenue) / parseFloat(available);
        result.innerHTML = "Your Property's RevPAR is: " + ' $' + revpar.toFixed(2);
    }

    function calculateGOPPAR() {
        var gop = document.getElementById('goppar_gop').value.replace(/\$/g, '').trim();
        var available = document.getElementById('goppar_total_rooms_available').value.trim();
        var errorGOP = document.getElementById('goppar_gop_error');
        var errorAvailable = document.getElementById('goppar_total_rooms_available_error');
        var result = document.getElementById('goppar_result');
        errorGOP.innerHTML = '';
        errorAvailable.innerHTML = '';
        if (isNaN(gop) || gop === '') {
            errorGOP.innerHTML = 'Enter a valid dollar amount.';
            result.innerHTML = '--';
            return;
        }
        if (isNaN(available) || available === '' || parseFloat(available) == 0) {
            errorAvailable.innerHTML = 'Enter a valid number for available rooms.';
            result.innerHTML = '--';
            return;
        }
        var goppar = parseFloat(gop) / parseFloat(available);
        result.innerHTML = "Your Property's GOPPAR is: " + ' $' + goppar.toFixed(2);
    }
    function calculateTRevPAR() {
        var revenue = document.getElementById('trevpar_total_revenue').value.replace(/\$/g, '').trim();
        var available = document.getElementById('trevpar_rooms_available').value.trim();
        var errorRevenue = document.getElementById('trevpar_total_revenue_error');
        var errorAvailable = document.getElementById('trevpar_rooms_available_error');
        var result = document.getElementById('trevpar_result');
        errorRevenue.innerHTML = '';
        errorAvailable.innerHTML = '';
        if (isNaN(revenue) || revenue === '') {
            errorRevenue.innerHTML = 'Enter a valid dollar amount.';
            result.innerHTML = '--';
            return;
        }
        if (isNaN(available) || available === '' || parseFloat(available) == 0) {
            errorAvailable.innerHTML = 'Enter a valid number for available rooms.';
            result.innerHTML = '--';
            return;
        }
        var trevpar = parseFloat(revenue) / parseFloat(available);
        result.innerHTML = "Your Property's TRevPAR is: " + ' $' + trevpar.toFixed(2);
    }
    function calculateTRevPAB() {
        var revenue = document.getElementById('trevpab_total_revenue').value.replace(/\$/g, '').trim();
        var bedNights = document.getElementById('trevpab_total_bed_nights').value.trim();
        var errorRevenue = document.getElementById('trevpab_total_revenue_error');
        var errorBedNights = document.getElementById('trevpab_total_bed_nights_error');
        var result = document.getElementById('trevpab_result');
        errorRevenue.innerHTML = '';
        errorBedNights.innerHTML = '';
        if (isNaN(revenue) || revenue === '') {
            errorRevenue.innerHTML = 'Enter a valid dollar amount.';
            result.innerHTML = '--';
            return;
        }
        if (isNaN(bedNights) || bedNights === '' || parseFloat(bedNights) == 0) {
            errorBedNights.innerHTML = 'Enter a valid number for available bed nights.';
            result.innerHTML = '--';
            return;
        }
        var trevpab = parseFloat(revenue) / parseFloat(bedNights);
        result.innerHTML = "Your Property's TRevPAB is: " + ' $' + trevpab.toFixed(2);
    }
    function calculateOccupancy() {
        var occupied = document.getElementById('occupancy_total_rooms_occupied').value.trim();
        var available = document.getElementById('occupancy_total_rooms_available').value.trim();
        var errorOccupied = document.getElementById('occupancy_total_rooms_occupied_error');
        var errorAvailable = document.getElementById('occupancy_total_rooms_available_error');
        var result = document.getElementById('occupancy_result');
        errorOccupied.innerHTML = '';
        errorAvailable.innerHTML = '';
        if (isNaN(occupied) || occupied === '' || parseFloat(occupied) <= 0) {
            errorOccupied.innerHTML = 'Enter a valid number for rooms occupied.';
            result.innerHTML = '--';
            return;
        }
        if (isNaN(available) || available === '' || parseFloat(available) <= 0) {
            errorAvailable.innerHTML = 'Enter a valid number for rooms available.';
            result.innerHTML = '--';
            return;
        }
        if (parseFloat(occupied) > parseFloat(available)) {
            errorOccupied.innerHTML = 'Occupied rooms cannot exceed available rooms.';
            result.innerHTML = '--';
            return;
        }
        var occupancyRate = (parseFloat(occupied) / parseFloat(available)) * 100;
        result.innerHTML = "Your Property’s Occupancy Rate is: " + occupancyRate.toFixed(2) + '%';
    }


    // Event listeners for all calculator buttons
    document.querySelectorAll('.calc-btn').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            var calcType = this.getAttribute('data-calc');
            switch (calcType) {
                case 'adr':
                    calculateADR();
                    break;
                case 'revpar':
                    calculateRevPAR();
                    break;
                case 'goppar':
                    calculateGOPPAR();
                    break;
                case 'trevpar':
                    calculateTRevPAR();
                    break;
                case 'trevpab':
                    calculateTRevPAB();
                    break;
                case 'occupancy':
                    calculateOccupancy();
                    break;
                default:
                    console.error('Unknown calculator type:', calcType);
            }
        });
    });
});