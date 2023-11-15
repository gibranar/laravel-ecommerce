"use strict";

// get data from api
var url = "/dashboard";
var quantities = [];

var qlabels = [];
var mlabels = [];

var totals = [];
var margins = [];

var backgroundColor = [];
var borderColor = [];


fetch(url, {
  method: "GET",
  headers: {
    "Accept": "application/json",
  },
})
  .then((response) => response.json())
  .then((data) => {
    let m = data.margins;
    let q = data.quantities;


    for(const element in q){
      quantities.push(q[element].quantity);
      qlabels.push(q[element].name);
    }

    for(const element in m){
      margins.push(m[element].margin);
      mlabels.push(m[element].name);
    }

    var ctx = document.getElementById("doughnutChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        datasets: [{
          data: quantities,
          backgroundColor: [
            '#fc544b',
            '#63ed7a',
            '#191d21',
            '#ffa426',
            '#6777ef',
          ],
          label: 'Dataset 1'
        }],
        labels: qlabels,
      },
      options: {
        responsive: true,
        legend: {
          position: 'bottom',
        },
      }
    });

    var ctx = document.getElementById("pieChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        datasets: [{
          data: margins,
          backgroundColor: [
            '#fc544b',
            '#63ed7a',
            '#191d21',
            '#ffa426',
            '#6777ef',
          ],
          label: 'Dataset 1'
        }],
        labels: mlabels,
      },
      options: {
        responsive: true,
        legend: {
          position: 'bottom',
        },
      }
    });
  })
