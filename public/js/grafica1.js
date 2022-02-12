const ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Oct25', 'Oct25', 'Oct25', 'Oct25', 'Oct25'],
        datasets: [{
            data: [7, 4, 1, 1, 5],
            label: "Visitas sin completar",
            backgroundColor: "#FF3333",
            borderColor: "#FF3333",
            fill: false
        }, {
            data: [6, 3, 2, 2, 7],
            label: "Visitas completadas",
            backgroundColor: "#33FF3C",
            borderColor: "#33FF3C",
            fill: false
        }]
    },

    options: {
        scales: {

            y: {
                beginAtZero: true
            }
        }
    }
});